<?php

namespace Shop\Action;

use Shop\Factory\ProductRepositoryFactory;

class HomeAction
{
    public function handle(): void
    {
        $repository = ProductRepositoryFactory::make();
        // $products = $repository->findAll();

        require_once __DIR__ . '/../../views/manage-products.php';
    }
    public function handleToAddNewProduct(): void
    {
        $repository = ProductRepositoryFactory::make();
        // $products = $repository->findAll();

        require_once __DIR__ . '/../../views/create-products.php';
    }
    public function handleManageProducts(): void
    {
        $repository = ProductRepositoryFactory::make();
        $products = $repository->findAll();

        require_once __DIR__ . '/../../views/manage-products.php';
    }
    public function handleToEditProducts($id): void
    {
        $repository = ProductRepositoryFactory::make();

        $product = $repository->find($id);

        require_once __DIR__ . '/../../views/edit-products.php';
    }
    public function handleToDeleteProducts($id): void
    {
        $repository = ProductRepositoryFactory::make();

        $product = $repository->delete($id);

        header('Location: /manage-products');
    }
    public function handleToProductCatalogue(): void
    {
        $repository = ProductRepositoryFactory::make();

        $products = $repository->findAll();

        require_once __DIR__ . '/../../views/products-catalogue.php';
    }
   
}
