<?php
    session_start();
    require_once 'function.php';
    $title='Login Page';

    load_model('Token');
    $token=new Token();
    $token->GenerateRequestToken();
    $RequestTokenId=$token->RequestTokenId;
    $RequestTokenValue=$token->RequestTokenValue;
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title;?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<form class="form-signin" action="Request.php" method="post" id="login">
    <input name="operation" value="login" type="hidden"/>
    <input name="locate" value="location: index.php" type="hidden"/>
    <input name="<?php echo $RequestTokenId;?>" value="<?php echo $RequestTokenValue;?>" type="hidden"/>
    <img class="mb-4" src="src\login.png" alt="" width="128" height="128">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in </h1>
    <label for="inputUserName" class="sr-only">UserName</label>
    <input type="text" Name="inputUserName" id="inputUserName" class="form-control" placeholder="UserName" required autofocus>
    <label for="inputPassword"  class="sr-only">Password</label>
    <input type="password" Name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <input class="btn btn-lg btn-success btn-block" type="submit" value="Sign in" />
    <p class="mt-2 mb-3 text-muted " ><div class="float-left m-2">Create Account</div>  <a class="nav-link" href="Register.php"/>Sign up</p>
</form>
</body>
</html>
