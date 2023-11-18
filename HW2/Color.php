<?php

namespace HW2;

class Color
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct($red, $green, $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    public function getRed(): void
    {
        var_dump($this->red);
    }

    public function setRed($red):void {
        if ($this->checkValidity($red)) {
            $this->red = $red;
        }
    }

    public function getBlue(): void
    {
        var_dump($this->blue);
    }

    public function setBlue($blue): void
    {
        if ($this->checkValidity($blue)) {
            $this->blue = $blue;
        }
    }

    public function getGreen(): void
    {
        var_dump($this->green);
    }

    public function setGreen($green): void
    {
        if ($this->checkValidity($green)) {
            $this->green = $green;
        }
    }

    private function checkValidity(int $value) : bool
    {
        if ($value < 0 || $value > 255) {
            throw new \Error("Invalid input!");
        }
        return true;
    }

    static function equals(Color $obj1, Color $obj2): bool
    {
        if ($obj1->red === $obj2->red && $obj1->blue === $obj2->blue && $obj1->green === $obj2->green) {
            var_dump("Equals!");
            return true;
        }
        var_dump("Differs!");
        return false;
    }

    static function random(): object
    {
        $randomNumber = function () {return rand(0, 255);};
        return new Color($randomNumber(), $randomNumber(), $randomNumber());
    }

    public function mix(Color $obj): Color
    {
        $newRed = ($this->red + $obj->red) / 2;
        $newBlue = ($this->blue + $obj->blue) / 2;
        $newGreen = ($this->green + $obj->green) / 2;

        return new Color($newRed, $newGreen, $newBlue);
    }

}