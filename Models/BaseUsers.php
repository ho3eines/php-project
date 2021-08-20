<?php

class BaseUsers
{
    public $UserName;
    Public $Password;
    Public $FirstName;
    Public $LastName;
    public $IsLogin=false;

    public function Login()
    {
        $this->IsLogin=false;
        require_once 'MySqlConnection.php';
        $con=new MySqlConnection();
        $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        $user=mysqli_real_escape_string($conn,$this->UserName);
        $pass=mysqli_real_escape_string($conn,$this->Password);
        $sql="SELECT username,password,firstName,lastName FROM `baseusers` WHERE username='$user' and password='$pass'";
        $Result = $conn->query($sql);
        while ($row = $Result -> fetch_row())
        {
             $this->UserName=$row[0];
             $this->Password=$row[1];
             $this->FirstName=$row[2];
             $this->LastName=$row[3];
             if ($user=$this->UserName)
                $this->IsLogin=true;
        }
        if ($this->IsLogin)
        {
            require_once 'Token.php';
            $token=new Token();
            $_SESSION["UserName"]=$this->UserName;
            setcookie("FullName", $this->FirstName.' '.$this->LastName, time() + (86400 * 30), "/");
            $_COOKIE["FullName"]=$this->FirstName.' '.$this->LastName;

            $conn->query("INSERT INTO `userlogin` (`UserName`, `TokenId`, `ClientId`) VALUES ('$this->UserName', '$token->TokenId', '$token->ClientId')");

        }
        $conn->close();
        return $this->IsLogin;
    }
    public function GetUserFullName()
    {
        if (isset($_COOKIE["FullName"]))
            return $_COOKIE["FullName"];
        else
            return '-';
    }
    public function isUserLogin()
    {
        if (isset($_SESSION["UserName"]))
            return $_SESSION["UserName"];
        else
            return false;

    }
    public  function logout()
    {
        require_once 'MySqlConnection.php';
        $con=new MySqlConnection();
        $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        $user=mysqli_real_escape_string($conn,$this->UserName);
        $sql="delete `userlogin` where username='$user'";
        $conn->query($sql);
        $conn->close();
        $_SESSION["UserName"]=null;
        setcookie("FullName", null, time()-3600, "/");
    }
    public function Signup()
    {
        require_once 'MySqlConnection.php';
        $con=new MySqlConnection();
        $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        $user=mysqli_real_escape_string($conn,$this->UserName);
        $pass=mysqli_real_escape_string($conn,$this->Password);
        $lastname=mysqli_real_escape_string($conn,$this->LastName);
        $firstname=mysqli_real_escape_string($conn,$this->FirstName);
        $sql="INSERT INTO `baseusers`(`username`, `password`, `firstname`, `lastname`) VALUES ('$user','$pass','$firstname','$lastname')";
        $conn->query($sql);
        $conn->close();
    }
}