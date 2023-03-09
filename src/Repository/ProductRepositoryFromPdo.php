<?php

namespace Shop\Repository;

use Shop\Entity\Product;
use PDO;

class ProductRepositoryFromPdo implements ProductRepository
{
    /** @see https://stitcher.io/blog/constructor-promotion-in-php-8 */
    public function __construct(private PDO $pdo)
    {}

    public function store(Product $product): void
    {
        $sql = $this->getStoreQuery($product);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':name' => $product->name(),
            ':description' => $product->description(),
            ':price' => $product->price(),
            ':image' => $product->image()
        ];

        if ($product->id()) {
            $params[':id'] = $product->id();
        }

        $stm->execute($params);
    }
    public function update(Product $product): void
    {
        $sql = $this->getStoreQuery($product);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':name' => $product->name(),
            ':description' => $product->description(),
            ':price' => $product->price(),
            ':image' => $product->image()
        ];

        if ($product->id()) {
            $params[':id'] = $product->id();
        }

        $stm->execute($params);
    }
   

    private function getStoreQuery(Product $product) {
        if ($product->id()) {
            return <<<SQL
                UPDATE products
                SET name=:name,
                    description=:description,
                    price=:price,
                    image=:image
                WHERE id=:id
            SQL;
        }
        return <<<SQL
            INSERT INTO products (name, description, price, image)
            VALUES (:name, :description, :price, :image)
        SQL;
    }

    /** @return Product[] */
    public function findAll(): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, name, description, price,image
            FROM products
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Product::class);
        $stm->execute();

        return $stm->fetchAll();
    }

    public function find(int $id): Product
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, name, description, price,image
            FROM products
            WHERE id=:id
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Product::class);
        $stm->bindParam(':id', $id);
        $stm->execute();

        return $stm->fetch();
    }
    public function delete(int $id): bool
    {
        $stm = $this->pdo->prepare(<<<SQL
            DELETE 
            FROM products
            WHERE id=:id
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Product::class);
        $stm->bindParam(':id', $id);
        $stm->execute();

        return $stm->fetch();
    }
}
