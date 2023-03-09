<?php

namespace Shop;

use Shop\Action\CreateProductAction;
use Shop\Action\UpdateProductAction;
use Shop\Action\AddCartAction;
use Shop\Action\ViewCartAction;
use Shop\Action\OrdersAction;
use Shop\Action\HomeAction;

class Application
{
    public function run(): void
    {
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'id');
        $total = filter_input(INPUT_GET, 'total');
        if($action){
            match ($action) {
                'create-product' => (new CreateProductAction())->handle(),
                'update-product' => (new UpdateProductAction())->handle(),
                'edit-product' => (new HomeAction())->handleToEditProducts($id),
                'delete-product' => (new HomeAction())->handleToDeleteProducts($id),
                'add-to-cart' => (new AddCartAction())->handle($id),
                'increase-quantity' => (new AddCartAction())->handleToIncrease($id),
                'decrease-quantity' => (new AddCartAction())->handleToDecrease($id),
                'remove-from-cart' => (new AddCartAction())->handleToRemove($id),
                'complete' => (new OrdersAction())->handleToComplete($total),
                default => (new HomeAction())->handle(),
            };
        }else {
            $path= $_SERVER['REQUEST_URI'];
            $url = parse_url($path, PHP_URL_PATH);
          
            if($url=='/manage-products'){
                (new HomeAction())->handleManageProducts();
            }
            else if($url=='/add-new-product'){
                (new HomeAction())->handleToAddNewProduct();
            }
            else if($url=='/product-catalogue'){
                (new HomeAction())->handleToProductCatalogue();
            }
            else if($url=='/view-cart'){
                (new ViewCartAction())->handle();
            }
            else if($url=='/checkout'){
                (new OrdersAction())->handle();
            }
            else if($url=='/completed-orders'){
                (new OrdersAction())->handletoCompletedOrders();
            }
           
            else{
                (new HomeAction())->handleManageProducts();
            }
        }
       
       
    }
}
