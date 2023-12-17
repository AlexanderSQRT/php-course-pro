<?php

interface deliveryMethod {
    public function deliver(string $loggerFormat): void;
}

class deliveryByMail implements deliveryMethod
{
    public function deliver(string $loggerFormat): void
    {
        echo "Вывод формата ({$loggerFormat}) по имейл";
    }
}

class deliveryBySMS implements deliveryMethod
{
    public function deliver(string $loggerFormat): void
    {
        echo "Вывод формата ({$loggerFormat}) в смс";
    }
}

class deliverToConsole implements deliveryMethod
{
    public function deliver(string $loggerFormat): void
    {
        echo "Вывод формата ({$loggerFormat}) в консоль";
    }
}

class errorDelivery implements deliveryMethod
{
    public function deliver(string $loggerFormat): void
    {
        die('Error deliver');
    }
}

interface loggerFormat {
    public function format($string): string;
}

class rawFormat implements loggerFormat
{
    public function format($string): string
    {
       return $string;
    }
}

class formatWithDate implements loggerFormat
{
    public function format($string): string
    {
        return date('Y-m-d H:i:s') . $string;
    }
}

class formatWithDateAndDetails implements loggerFormat
{
    public function format($string): string
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}
class errorFormat implements loggerFormat
{
    public function format($string): string
    {
        die('Error format');
    }
}

class Logger
{

    public function __construct(public loggerFormat $format, public deliveryMethod $delivery)
    {
    }

    public function log($string)
    {
        $this->delivery->deliver($this->format->format($string));
    }

}

function loggerProcess(loggerFormat $format, deliveryMethod $method)
{
    $logger = new Logger($format, $method);
    $logger->log("Emergency error! Please fix me!");
}

if (isset($_GET["format"])) {

    $format = match ($_GET["format"]) {
        "raw" => new rawFormat(),
        "with_date" => new formatWithDate(),
        "with_date_and_details" => new formatWithDateAndDetails(),
        default => new errorFormat()
    };

    $method = new deliveryByMail();

    loggerProcess($format, $method);
}