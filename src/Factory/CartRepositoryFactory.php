<?php

namespace Shop\Factory;

use Shop\Repository\CartRepository;
use Shop\Repository\CartRepositoryFromPdo;

class CartRepositoryFactory
{
    public static function make(): CartRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new CartRepositoryFromPdo($pdo);
    }
}
