<?php

class Singleton
{
    public static $instance = null;

    private function __construct()
    {
    }

    private function __wakeup()
    {
        throw new \Exception('Can not unserialize object');
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

$instance1 = Singleton::getInstance();
$instance2 = Singleton::getInstance();

var_dump($instance1);
var_dump($instance2);