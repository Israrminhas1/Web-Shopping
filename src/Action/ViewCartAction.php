<?php

namespace Shop\Action;


use Shop\Entity\Cart;
use Shop\Factory\CartRepositoryFactory;

class ViewCartAction
{
    public function handle(): void
    {
        $repository = CartRepositoryFactory::make();
        $carts= $repository->findAll();
        require_once __DIR__ . '/../../views/cart.php';
    }
  
  
}
