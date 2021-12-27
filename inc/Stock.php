<?php

require('../repository/StockRepository.php');

class Stock {
    public int $product;
    public int $shop;
    public int $amount;

    public function setProduct(int $product): void
    {
        $this->product = $product;
    }

    public function getProduct(): int
    {
        return $this->product;
    }

    public function setShop(int $shop): void
    {
        $this->shop = $shop;
    }

    public function getShop(): int
    {
        return $this->shop;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

}