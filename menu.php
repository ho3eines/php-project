<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
        </li>
        <?php

            $result=$post->ShowPostGroup();
            while ($row=$result->fetch_row())
            {
                echo '<li class="nav-item">
                        <a class="nav-link" href="index.php?PostGroup='.$row[0].'">'.$row[0].' <span class="sr-only">('.$row[1].')</span></a>
                      </li>';
            }
        ?>
        ?>
    </ul>
    <div class="float-right m-2">
        <?php
            //require_once 'function.php';
            //load_model('BaseUsers');
            $user=new BaseUsers();
            if ($user->isUserLogin()!==false)
            {
                echo '<form  method="post" action="Request.php" id="logoutpage">
                        <input name="operation" value="logout" type="hidden"/>
                        <input name="locate" value="location: index.php" type="hidden"/>
                        <input name="'.$RequestTokenId.'" value="'.$RequestTokenValue.'" type="hidden"/>
                        <label class="text-white float-left m-2">Welcome '.$user->GetUserFullName().'</label>
                        <input type="submit" class="btn btn-light float-right" value="Logout" >
                       </form>';
            }
            else
            {
                echo '<a type="button" class="btn btn-light" href="login.php"> Log in </a>';
            }
        ?>
    </div>
</div>