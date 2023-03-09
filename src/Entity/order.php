<?php

namespace Shop\Entity;

use DateTimeImmutable;

class Order
{
    private ?int $id;
    private mixed $date;
    private float $total_amount;
 
    public function __construct(
      
        float $total_amount= 0,
    
    ) {
        $this->id = null; 
        $this->total_amount = $total_amount;
        $this->date = null;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function date()
    {
        $this->date = new DateTimeImmutable('now');
        return $this->date->format('Y-m-d H:i:s');
    }

 
    public function total_amount(): float
    {
        return $this->total_amount;
    }

}
