<?php

interface SqlSubject
{
    public function attach(SqlObserver $observer);

    public function detach(SqlObserver $observer);

    public function notify();
}

class Subject implements SqlSubject
{
    public $state;

    private $observers;

    public function __construct()
    {
        $this->observers = new SqlOb
    }
}