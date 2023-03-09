<?php

namespace Shop\Repository;

use Shop\Entity\Order;
use Shop\Entity\Order_detail;
use PDO;

class CheckoutRepositoryFromPdo implements CheckoutRepository
{
    /** @see https://stitcher.io/blog/constructor-promotion-in-php-8 */
    public function __construct(private PDO $pdo)
    {}

    public function store(Order $order)
    {
        $sql = $this->getStoreQuery();
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':total_amount' => $order->total_amount(),
            ':date' => $order->date(),
        ];

        $stm->execute($params);
        $id = $this->pdo->lastInsertId();

        return $id;
    }
    public function storeOrderDetails(Order_detail $order_detail)
    {
        $sql = $this->getStoreOrderDetailQuery();
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':order_id' => $order_detail->order_id(),
            ':product_id' => $order_detail->product_id(),
            ':quantity' => $order_detail->quantity(),
        ];

        $stm->execute($params);
    }
   
    private function getStoreOrderDetailQuery() {
      
        return <<<SQL
            INSERT INTO order_details (order_id, product_id, quantity)
            VALUES (:order_id, :product_id, :quantity)
        SQL;
    }
    private function getStoreQuery() {
      
        return <<<SQL
            INSERT INTO orders (total_amount, date)
            VALUES (:total_amount, :date)
        SQL;
    }
    public function findAllCompletedOrders()
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, date, total_amount
            FROM orders 
        SQL);

        $stm->execute();

    return $stm->fetchAll();
    }
    public function findAllCompletedOrdersItems()
    {
        $stm = $this->pdo->prepare(<<<SQL
           SELECT od.id, od.order_id, p.name, p.price, od.quantity
           FROM order_details od
           JOIN products p ON od.product_id = p.id
        SQL);

        $stm->execute();

    return $stm->fetchAll();
    }
}
