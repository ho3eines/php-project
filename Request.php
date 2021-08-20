<?php
    session_start();
    require_once 'function.php';
    load_model('Token');
    load_model('BaseUsers');
    $user=new BaseUsers();
    $Token=new Token();
    $tokenrequestid=$_SESSION["RequestTokenId"];
    $tokenrequestvalue=$_POST[$tokenrequestid];
    if ($Token->ValidateRequestToken($tokenrequestid,$tokenrequestvalue))
    {
        load_model('Post');
        $post = new Post();
        echo 'Form operation:' . $_POST["operation"];
        if (isset($_POST["operation"])) {
            $operation = $_POST["operation"];
            $locate = $_POST["locate"];
            switch ($operation) {
                case 'login':
                    $user->UserName = $_POST["inputUserName"];
                    $user->Password = $_POST["inputPassword"];
                    if ($user->Login())
                        header("location: index.php");
                    else
                        header("location: login.php");
                    break;
                case 'logout':
                    $user->logout();
                    header("location: index.php");
                    break;
                case 'signup':
                    $user->UserName = $_POST["inputUserName"];
                    $user->Password = $_POST["inputPassword"];
                    $user->LastName = $_POST["inputLastName"];
                    $user->FirstName = $_POST["inputFirstName"];
                    if ($user->Password==$_POST["inputRePassword"])
                    {
                        $user->Signup();
                        header("location: login.php");
                    }
                    else
                    {
                        echo 'Password no match!';
                        header("location: Register.php");
                    }
                break;
                case 'add-post':
                    $post->PostTitle = $_POST["PostTitle"];
                    $post->PostText = $_POST["PostText"];
                    $post->PostCreateDate = $_POST["PostCreateDate"];
                    $post->PostGroup = $_POST["PostGroup"];
                    $post->InsertPost();
                    header($locate);
                    break;
                case 'update-post':
                    $post->PostId = $_POST["PostId"];
                    $post->PostTitle = $_POST["PostTitle"];
                    $post->PostText = $_POST["PostText"];
                    $post->PostGroup = $_POST["PostGroup"];
                    //$post->PostCreateDate=$_POST["PostCreateDate"];
                    $post->UpdatePost();
                    header($locate);
                    break;
                case 'delete-post':
                    $post->PostId = $_POST["PostId"];
                    $post->DeletePost();
                    echo 'Delete Post :' . $post->PostId;
                    header($locate);
                    break;
                default:
                    header("location: index.php");
            }
        }
    }
    header("location: index.php");
?>