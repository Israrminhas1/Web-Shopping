<?php

namespace Shop\Action;


use Shop\Entity\Cart;
use Shop\Factory\CartRepositoryFactory;

class AddCartAction
{
    public function handle($id): void
    {
        $repository = CartRepositoryFactory::make();
      $cart= $repository->find($id);
      if($cart){
        $quantity=$cart->quantity();
        $quantity++;
       $cart->update($quantity);
       $repository->update($cart);

      } else {
        $quantity=1;
        $newcart = new cart(
            $id,
            $quantity
        );

        $repository->store($newcart);
      }
     
      $message='Product Added to Cart';
      header('Location:product-catalogue?message=' . urlencode($message));
    }
    public function handleToIncrease($id): void
    {
        $repository = CartRepositoryFactory::make();
      $cart= $repository->find($id);
        $quantity=$cart->quantity();
        $quantity++;
       $cart->update($quantity);
       $repository->update($cart);

     
     
       $carts= $repository->findAll();
       require_once __DIR__ . '/../../views/cart.php';
    }
    public function handleToDecrease($id): void
    {
        $repository = CartRepositoryFactory::make();
      $cart= $repository->find($id);
        $quantity=$cart->quantity();
        $quantity--;
        if($quantity<1){
            $carts= $repository->findAll();
             require_once __DIR__ . '/../../views/cart.php';
             exit;
        }
       $cart->update($quantity);
       $repository->update($cart);

     
     
       $carts= $repository->findAll();
       require_once __DIR__ . '/../../views/cart.php';
    }
    public function handleToRemove($id): void
    {
        $repository = CartRepositoryFactory::make();
      $cart= $repository->delete($id);

       $carts= $repository->findAll();
       require_once __DIR__ . '/../../views/cart.php';
    }
  
}
