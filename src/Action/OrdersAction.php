<?php

namespace Shop\Action;


use Shop\Entity\Cart;
use Shop\Factory\CartRepositoryFactory;
use Shop\Entity\Order;
use Shop\Entity\Order_detail;
use Shop\Factory\CheckoutRepositoryFactory;

class OrdersAction
{
    public function handle(): void
    {
        $repository = CartRepositoryFactory::make();
      $carts= $repository->findAll();
      require_once __DIR__ . '/../../views/checkout.php';
    }
    public function handletoCompletedOrders(): void
    {
        $repository =CheckoutRepositoryFactory::make();
        $orders= $repository->findAllCompletedOrders();
        $orders_items= $repository->findAllCompletedOrdersItems();
     foreach($orders as $key=>$order){
        $data[$key]=[
            'id'=>$order['id'],
            'total'=>$order['total_amount'],
            'date'=>$order['date']
    ];
        foreach($orders_items as $item){
        
            if($item['order_id']==$order['id']){
                $data[$key]['products'][]=[
                       'name' => $item['name'],
                       'quantity' => $item['quantity']
                ];
            
            }
         }
     }
      
      require_once __DIR__ . '/../../views/completed-order.php';
    }
    public function handletoComplete($total): void
    {
            $repository = CartRepositoryFactory::make();
            $carts= $repository->findAll();
            $order = new Order(
                $total
            );

            $repositoryCheckout = CheckoutRepositoryFactory::make();
            $orderModel =   $repositoryCheckout->store($order);
        
        foreach($carts as $cart){
            $order_detail = new Order_detail(
                $orderModel,
                $cart['id'],
                $cart['quantity']
            );
            $repositoryCheckout->storeOrderDetails($order_detail);
            $repository->delete($cart['id']);
        }
        header('location:completed-orders');
    }
   
  
}
