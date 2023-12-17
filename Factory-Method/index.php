<?php

abstract class OrderTaxi
{
abstract function orderCar(): void;

}

class OrderEconomCar extends OrderTaxi
{
    public function orderCar(): void
    {
        $economCar = new EconomCar();
        var_dump($economCar);
    }
}

class OrderStandardCar extends OrderTaxi
{
    public function orderCar(): void
    {
        $standardCar = new StandardCar();
        var_dump($standardCar);
    }
}

class OrderLuxuryCar extends OrderTaxi
{
    public function orderCar(): void
    {
        $luxuryCar = new LuxuryCar();
        var_dump($luxuryCar);
    }
}

interface TaxiCar
{
    function getCarModel(): string;
    function getPrice(): float;
}

class EconomCar implements TaxiCar
{
    public function getCarModel(): string
    {
        return "Econom";
    }
    public function getPrice(): float
    {
        return 25.50;
    }
}

class StandardCar implements TaxiCar
{
    public function getCarModel(): string
    {
        return "Standard";
    }
    public function getPrice(): float
    {
        return 29.99;
    }
}

class LuxuryCar implements TaxiCar
{
    public function getCarModel(): string
    {
        return "Luxury";
    }
    public function getPrice(): float
    {
        return 35.99;
    }
}