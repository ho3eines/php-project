<?php

class DataBase
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
    function MySqlQueryExec($Sql)
    {
        $conn = new mysqli($this->MySqlHost, $this->MySqlUserName, $this->MySqlPassword, $this->MySqldatabase);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        $Result = $conn->query($Sql);
        $conn->close();
        return $Result;
    }
}