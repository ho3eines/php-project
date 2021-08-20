<?php

class Post
{
    public $PostId;
    public $Posts=array();
    public $PostTitle;
    Public $PostText;
    Public $PostCreateDate;
    public $PostGroup;
    public function InsertPost()
    {
        require_once 'Token.php';
        $token=new Token();
        if ($token->IsTokenValidat()) {
            require_once 'MySqlConnection.php';
            $con=new MySqlConnection();
            $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
            if ($conn->connect_error)
                die("Connection failed: " . $conn->connect_error);
            $PostTitle=mysqli_real_escape_string($conn,$this->PostTitle);
            $PostText=mysqli_real_escape_string($conn,$this->PostText);
            $this->PostCreateDate = date("Y-m-d H:i:s");
            $PostGroup=mysqli_real_escape_string($conn,$this->PostGroup);
            $sql="INSERT INTO `post` (`PostId`, `PostTitle`, `PostText`, `PostCreateDate`,`PostGroup`) VALUES (NULL, '$PostTitle', '$PostText', '$this->PostCreateDate','$PostGroup'); ";
            $conn->query($sql);
        }
        else
            return 'Token Not Valid!!!';
    }
    public function LoadAllPost()
    {
        require_once 'MySqlConnection.php';
        $con=new MySqlConnection();
        $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        $sql="select PostId from `post` order by PostId DESC ";
        return $conn->query($sql);
    }
    public function LoadPostByPostGroup($PostGroup)
    {
        require_once 'MySqlConnection.php';
        $con=new MySqlConnection();
        $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        $PostGroup=mysqli_real_escape_string($conn,$PostGroup);
        $sql="select PostId from `post` where `PostGroup`='$PostGroup' order by PostId DESC ";
        return $conn->query($sql);
    }
    public function LoadPostById($id)
    {
        $isFound=false;
        require_once 'MySqlConnection.php';
        $con=new MySqlConnection();
        $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        $id=mysqli_real_escape_string($conn,$id);
        $sql="select `PostId`, `PostTitle`, `PostText`, `PostCreateDate`,`PostGroup` from `post` where PostId=$id";
        $Result=$conn->query($sql);
        while ($row = $Result->fetch_row())
        {
            $this->PostId=$row[0];
            $this->PostTitle=$row[1];
            $this->PostText=$row[2];
            $this->PostCreateDate=$row[3];
            $this->PostGroup=$row[4];
            $isFound=true;
        }
        return $isFound;
    }
    public function UpdatePost()
    {
        require_once 'Token.php';
        $token=new Token();
        if ($token->IsTokenValidat())
        {
            require_once 'MySqlConnection.php';
            $con=new MySqlConnection();
            $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
            if ($conn->connect_error)
                die("Connection failed: " . $conn->connect_error);
            $PostId=mysqli_real_escape_string($conn,$this->PostId);
            $PostTitle=mysqli_real_escape_string($conn,$this->PostTitle);
            $PostText=mysqli_real_escape_string($conn,$this->PostText);
            $PostCreateDate=mysqli_real_escape_string($conn,$this->PostCreateDate);
            $PostGroup=mysqli_real_escape_string($conn,$this->PostGroup);
            $sql="UPDATE `post` SET `PostTitle`='$PostTitle',`PostText`='$PostText',`PostCreateDate`='$PostCreateDate',`PostGroup`='$PostGroup' WHERE `PostId`=$PostId";
            $conn->query($sql);
            echo '/n Post updated '.$PostId;
        }
        else
        {
            echo 'invalid token\n';
        }
    }
    public function DeletePost()
    {
        require_once 'Token.php';
        $token=new Token();
        if ($token->IsTokenValidat())
        {
            require_once 'MySqlConnection.php';
            $con=new MySqlConnection();
            $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
            if ($conn->connect_error)
                die("Connection failed: " . $conn->connect_error);
            $PostId=mysqli_real_escape_string($conn,$this->PostId);
            $sql="DELETE FROM `post`  WHERE `PostId`=$PostId";
            $conn->query($sql);
        }
    }
    public function ShowPostGroup()
    {
        require_once 'MySqlConnection.php';
        $con=new MySqlConnection();
        $conn = new mysqli($con->MySqlHost, $con->MySqlUserName, $con->MySqlPassword, $con->MySqldatabase);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        $sql="SELECT `PostGroup`,COUNT(*) FROM `post` GROUP BY `PostGroup` ";
        return $conn->query($sql);
    }

}