<?php

namespace Shop\Repository;

use Shop\Entity\Product;

interface ProductRepository
{
    public function store(Product $product): void;
    public function update(Product $product): void;
    public function delete(int $id): bool;
   
    /** @return Product[] */
    public function findAll(): array;
    public function find(int $id): Product;
   
}
