<?php

namespace Shop\Entity;


class Product
{
    private ?int $id;
    private string $name;
    private ?string $description;
    private float $price;
    private string $image;
   

    public function __construct(
        string $name = '',
        ?string $description = null,
        float $price = 0,
        string $image ='',
       
    ) {
        $this->id = null;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
  
    }

    public function id(): ?int
    {
        return $this->id;
    }
    public function update(string $name,string $description,float $price,string $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function image(): string
    {
        return $this->image;
    }

 
}
