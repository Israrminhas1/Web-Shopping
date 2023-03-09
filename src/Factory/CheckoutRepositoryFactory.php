<?php

namespace Shop\Factory;

use Shop\Repository\CheckoutRepository;
use Shop\Repository\CheckoutRepositoryFromPdo;

class CheckoutRepositoryFactory
{
    public static function make(): CheckoutRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new CheckoutRepositoryFromPdo($pdo);
    }
}
