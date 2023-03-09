<?php

namespace Shop\Repository;

use Shop\Entity\Cart;
use PDO;

class CartRepositoryFromPdo implements CartRepository
{
    /** @see https://stitcher.io/blog/constructor-promotion-in-php-8 */
    public function __construct(private PDO $pdo)
    {}

    public function store(Cart $cart): void
    {
        $sql = $this->getStoreQuery($cart);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':product_id' => $cart->product_id(),
            ':quantity' => $cart->quantity(),
        ];

        $stm->execute($params);
    }
    public function update(Cart $cart): void
    {
        $sql = $this->getStoreQuery($cart);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':quantity' => $cart->quantity()
        ];

        if ($cart->id()) {
            $params[':id'] = $cart->id();
        }

        $stm->execute($params);
    }
    private function getStoreQuery(Cart $cart) {
        if ($cart->id()) {
            return <<<SQL
                UPDATE cart
                SET quantity=:quantity
                WHERE id=:id
            SQL;
        }
        return <<<SQL
            INSERT INTO cart (product_id, quantity)
            VALUES (:product_id, :quantity)
        SQL;
    }
      public function findAll(): array
      {
          $stm = $this->pdo->prepare(<<<SQL
            SELECT products.name, products.price, cart.quantity, products.id
            FROM products
            JOIN cart ON products.id = cart.product_id
          SQL);
  
 
          $stm->execute();
  
          return $stm->fetchAll();
      }
    public function find(int $id)
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, product_id,quantity
            FROM cart
            WHERE product_id=:id
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Cart::class);
        $stm->bindParam(':id', $id);
        $stm->execute();

        return $stm->fetch();
    }
    public function delete(int $id): bool
    {
        $stm = $this->pdo->prepare(<<<SQL
            DELETE 
            FROM cart
            WHERE product_id=:id
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Cart::class);
        $stm->bindParam(':id', $id);
        $stm->execute();

        return $stm->fetch();
    }
}
