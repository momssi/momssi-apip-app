<?php

namespace App\Domains\Member\dto;

class MemberStoreDto
{
    private string $name;
    private string $email;
    private string $password;

    public function getName():string
    {
        return $this->name;
    }

    public function setName(string $name):void
    {
        $this->name = trim($name);
    }

    public function getEmail():string
    {
        return $this->email;
    }

    public function setEmail(string $email):void
    {
        $this->email = trim($email);
    }

    public function getPassword():string
    {
        return $this->password;
    }

    public function setPassword(string $password):void
    {
        $this->password = $password;
    }
}
