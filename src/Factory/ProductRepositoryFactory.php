<?php

namespace Shop\Factory;

use Shop\Repository\ProductRepository;
use Shop\Repository\ProductRepositoryFromPdo;

class ProductRepositoryFactory
{
    public static function make(): ProductRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new ProductRepositoryFromPdo($pdo);
    }
}
