<?php

class Token
{
    public $TokenId;
    Public $ClientId;
    public $RequestTokenId;
    public $RequestTokenValue;
    function __construct()
    {
        $this->ClientId=$_SERVER['REMOTE_ADDR'];
        if (isset($_SESSION["TokenId"]))
        {
            $this->TokenId = $_SESSION["TokenId"];
        }
        else
        {
            $this->TokenId = bin2hex(openssl_random_pseudo_bytes(32));
            $_SESSION["TokenId"]=$this->TokenId;
        }
    }
    public function IsTokenValidat()
    {
        require_once 'MySqlConnection.php';
        $con = new MySqlConnection();
        if (isset($_SESSION["TokenId"]) and isset($_SESSION["UserName"]))
        {
            $count=0;
            $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
            if ($conn->connect_error)
                die("Connection failed: " . $conn->connect_error);
            $user=$_SESSION["UserName"];
            $sql = "SELECT count(*) FROM `userlogin` WHERE username='$user' and TokenId='$this->TokenId' and ClientId='$this->ClientId'";
            $Result = $conn->query($sql);
            $conn->close();
            while ($row = $Result->fetch_row())
            {
                $count=$row[0];
            }
            if ($count==1)
            {
                return true;
            }
            else
            {
                session_unset();
                return false;
            }
        }
        else
        {
            session_unset();
            return false;
        }
    }
    public function GenerateRequestToken()
    {
        $this->RequestTokenId = bin2hex(openssl_random_pseudo_bytes(10));
        $this->RequestTokenValue=bin2hex(openssl_random_pseudo_bytes(32));
        $_SESSION["RequestTokenId"]=$this->RequestTokenId;
        $_SESSION["RequestTokenValue"]=$this->RequestTokenValue;
    }
    public function ValidateRequestToken($RequestTokenId,$RequestTokenValue)
    {
        if ($_SESSION["RequestTokenId"]==$RequestTokenId and $_SESSION["RequestTokenValue"]==$RequestTokenValue)
        {
            $_SESSION["RequestTokenId"]=null;
            $_SESSION["RequestTokenValue"]=null;
            echo 'Request Token Succesfull.';
            return true;
        }
        else
        {
            $_SESSION["RequestTokenId"]=null;
            $_SESSION["RequestTokenValue"]=null;
            echo 'Request Token UnSuccesfull.';
            return true;
        }
    }
}