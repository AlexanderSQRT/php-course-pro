<?php

namespace Overloading;

class User
{
    private string $name;
    private int $age;
    private string $email;

    public function __call(string $name, array $arguments)
    {
        if (!method_exists($this, $name)) {
            throw new \Exception("no such method as " . $name);
        }
        call_user_func_array([$this, $name], $arguments);
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    private function setAge($age)
    {
        $this->age = $age;
    }

    private function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAll(): array
    {
        return [
                "name"=>$this->name,
                "age"=> $this->age,
                "email"=>$this->email
                ];
    }
}
try {
    $obj = new User();
    $obj->setName("name");
    $obj->setAge(21);
    $obj->setEmail("email@test.com");
    var_dump($obj->getAll());
} catch (\Exception $e) {
    var_dump($e->getMessage());
}