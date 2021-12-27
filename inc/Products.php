<?php
require('../repository/ProductRepository.php');

class Products {
    public int $id;
    public string $name;
    public string $shortName;
    public string $description;
    public float $price;
    public string $family;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setShortName(string $shortName): void
    {
        $this->shortName = $shortName;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setFamily(string $family): void
    {
        $this->family = $family;
    }

    public function getFamily(): string
    {
        return $this->family;
    }

}