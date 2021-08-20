<?php

class MySqlConnection
{
    public $MySqlHost  ;
    public $MySqlUserName ;
    public $MySqlPassword ;
    public $MySqldatabase ;
    function __construct()
    {
        $this->MySqlHost = 'localhost';
        $this->MySqlUserName = 'root';
        $this->MySqlPassword = '123';
        $this->MySqldatabase = 'test';
    }
}