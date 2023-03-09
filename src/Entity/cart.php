<?php

namespace Shop\Entity;


class Cart
{
    private ?int $id;
    private int $product_id;
    private int $quantity;

    public function __construct(
        int $product_id = 0,
        int $quantity = 0,
    ) {
        $this->id = null;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function update($quantity)
    {
        $this->quantity = $quantity;
    }
    public function id(): ?int
    {
        return $this->id;
    }
    public function product_id(): int
    {
        return $this->product_id;
    }
    public function quantity(): int
    {
        return $this->quantity;
    }

  
}
