<?php

namespace App\Dtos\Cart;

class CartDto
{
    private array $items = [];
    private float $totalSum = 0;
    private int $totalQuantity = 0;

    /**
     * @return array
     */ 
    public function getItems():array
    {
        return $this->items;
    }

    /**
     * Set the value of items
     *
     * @param array $items
     */ 
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * Get the value of totalSum
     */ 
    public function getTotalSum()
    {
        return $this->totalSum;
    }

    /**
     * Set the value of totalSum
     *
     * @return  self
     */ 
    public function setTotalSum($totalSum)
    {
        $this->totalSum = $totalSum;

        return $this;
    }

    /**
     * Get the value of totalQuantity
     */ 
    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    /**
     * Set the value of totalQuantity
     *
     * @return  self
     */ 
    public function setTotalQuantity($totalQuantity)
    {
        $this->totalQuantity = $totalQuantity;

        return $this;
    }


    public function incrementTotalQuantity(): void
    {
        $this->totalQuantity += 1;
    }

    public function incrementTotalSum(float $price): void
    {
        $this->totalSum += $price;
    }

}