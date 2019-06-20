<?php

class User
{
    public $fullName;

    public function getName()
    {
        echo $this->fullName;
    }
}

class CustomerUser
{
    public $firstName;
    public $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}

class AdapterUser extends User
{
    private $__adapter;

    public function __construct(CustomerUser $customerUser)
    {
        $this->__adapter = $customerUser;
    }

    public function getName()
    {
        echo $this->__adapter->getFirstName() . $this->__adapter->getLastName();
    }
}

$adapter = new AdapterUser(new CustomerUser('jacky','vu'));
$adapter->getName();