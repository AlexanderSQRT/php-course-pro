<?php

interface Bird
{
    public function eat();
}

interface FlyingBird
{
    public function fly();
}

class Swallow implements Bird, FlyingBird
{
    public function eat() {}
    public function fly() {}
}

class Ostrich implements Bird
{
    public function eat() {}
}