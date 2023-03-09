<?php

namespace Shop\Repository;

use Shop\Entity\Order;
use Shop\Entity\Order_detail;

interface CheckoutRepository
{
    public function store(Order $order);
    public function storeOrderDetails(Order_detail $order_detail);
    public function findAllCompletedOrders();
    public function findAllCompletedOrdersItems();
   
}
