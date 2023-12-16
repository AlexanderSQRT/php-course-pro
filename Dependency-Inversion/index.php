<?php

interface Database
{
    public function getData(): string;
}
class Mysql implements Database
{
    public function getData(): string
    {
        return 'some data from database';
    }
}

class Controller
{
    private $adapter;

    public function __construct(Database $database)
    {
        $this->adapter = $database;
    }

    function getData()
    {
        $this->adapter->getData();
    }
}