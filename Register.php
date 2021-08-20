<?php
    session_start();
    require_once 'function.php';
    $title='register';

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
    <input name="operation" value="signup" type="hidden"/>
    <input name="locate" value="location: login.php" type="hidden"/>
    <input name="<?php echo $RequestTokenId;?>" value="<?php echo $RequestTokenValue;?>" type="hidden"/>
    <img class="mb-4" src="src\register.png" alt="" width="128" height="128">
    <h1 class="h3 mb-3 font-weight-normal">Please fill in all  fields. </h1>
    <label for="inputUserName" class="sr-only">UserName</label>
    <input type="text" Name="inputUserName" id="inputUserName" class="form-control m-1" placeholder="UserName" required autofocus>
    <label for="inputPassword"  class="sr-only">Password</label>
    <input type="password" Name="inputPassword" id="inputPassword" class="form-control m-1" placeholder="Password" required>
    <label for="inputRePassword"  class="sr-only">RePassword</label>
    <input type="password" Name="inputRePassword" id="inputRePassword" class="form-control m-1" placeholder="RePassword" required>
    <label for="inputFirstName"  class="sr-only">FirstName</label>
    <input type="text" Name="inputFirstName" id="inputFirstName" class="form-control m-1" placeholder="FirstName" required>
    <label for="inputLastName"  class="sr-only">LastName</label>
    <input type="text" Name="inputLastName" id="inputLastName" class="form-control m-1" placeholder="LastName" required>
    <input class="btn btn-lg btn-warning btn-block m-1" type="submit" value="Sign up" />


</form>


</body>
</html>
