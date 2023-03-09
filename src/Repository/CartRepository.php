<?php

namespace Shop\Repository;


use Shop\Entity\Cart;

interface CartRepository
{
    public function store(Cart $cart): void;
    public function update(Cart $cart): void;
    public function delete(int $id): bool;
    public function findAll(): array;
    public function find(int $id);
}
