<?php

namespace Shop\Entity;


class Order_detail
{
    private ?int $id;
    private int $order_id;
    private int $product_id;
    private int $quantity;

    public function __construct(
        int $order_id = 0,
        int $product_id = 0,
        int $quantity = 0,
    ) {
        $this->id = null;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function id(): ?int
    {
        return $this->id;
    }
    public function order_id(): int
    {
        return $this->order_id;
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
