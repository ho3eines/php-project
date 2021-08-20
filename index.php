<?php
    session_start();
    $title='Home';
    $PostGroup=null;
    if (!isset($_GET["PostGroup"]))
        $PostGroup="";
    else
        $PostGroup=$_GET["PostGroup"];
    require_once 'function.php';
    load_model('Token');
    load_model('BaseUsers');
    load_model('Post');
    $user=new BaseUsers();
    $token=new Token();
    $post=new Post();
    $token->GenerateRequestToken();
    $RequestTokenId=$token->RequestTokenId;
    $RequestTokenValue=$token->RequestTokenValue;
    require_once  'Header.php';
?>
<main class="container">
    <div class="bg-light p-5 rounded">


    </div>

    <?php
        $token=new Token();
        if ($token->IsTokenValidat())
        {
            echo '<div class="card m-2">
            <div class="card-header"><h3>Add Post</h3></div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <form method="post" action="Request.php" class="form-group" id="addpostform">
                        <input name="operation" value="add-post" type="hidden"/>
                        <input name="locate" value="location: index.php" type="hidden"/>
                        <input name="'.$RequestTokenId.'" value="'.$RequestTokenValue.'" type="hidden"/>
                        <input name="PostTitle" value="" type="text" class="form-control" placeholder="Post Title" style="margin-bottom: 5px"/>
                        <input name="PostGroup" type="text" text='.$PostGroup.' className="form-control" list="select-list-id" style="margin-bottom: 5px"/>
                          <datalist id="select-list-id">';
                                $result=$post->ShowPostGroup();
                                while ($row=$result->fetch_row())
                                {
                                    echo '<option value="'.$row[0].'"></option>';
                                }
                   echo '</datalist>
                        <textarea class="ckeditor" cols="80" id="PostText" name="PostText" rows="10"></textarea>
                        <input name="PostCreateDate" value="" type="hidden"/>
                        <input type="submit" value="Update Post" class="btn btn-primary" style="margin-top: 5px" >
                    </form>
                    
                </blockquote>
            </div>
        </div>';
        }

        $p=new Post();
        $result=null;
        if (!isset($_GET["PostGroup"])) {
            $result = $post->LoadAllPost();
        }
        else {
            $result = $post->LoadPostByPostGroup($PostGroup);
        }
        while ($row = $result->fetch_row())
        {
            $p->LoadPostById($row[0]);
            if ($token->IsTokenValidat())
            {
                echo '<div class="card m-2">
                        <div class="card-header">
                        Update Post                            
                            <form class="float-md-right mt-2 mt-md-0" method="post" action="Request.php" id="deletepostform'.$p->PostId.'">
                                <input name="operation" value="delete-post" type="hidden"/>
                                <input name="locate" value="location: index.php" type="hidden"/>
                                <input name="'.$RequestTokenId.'" value="'.$RequestTokenValue.'" type="hidden"/>
                                <input name="PostId" value="'.$p->PostId.'" type="hidden"/>
                                <input type="submit" value="Delete Post" class="btn btn-danger" style="margin-top: 5px" >
                            </form>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <form method="post" action="Request.php" class="form-group" id="updatepostform'.$p->PostId.'">
                                    <input name="operation" value="update-post" type="hidden"/>
                                    <input name="locate" value="location: index.php" type="hidden"/>
                                    <input name="'.$RequestTokenId.'" value="'.$RequestTokenValue.'" type="hidden"/>
                                    <input name="PostId" value="'.$p->PostId.'" type="hidden"/>
                                    <input name="PostTitle" value="' . $p->PostTitle . '" type="" class="form-control" placeholder="Post Title" style="margin-bottom: 5px"/>
                                    <input name="PostGroup" type="text" value="'.$p->PostGroup.'" className="form-control" list="select-list-id" style="margin-bottom: 5px"/>
                                      <datalist id="select-list-id">';
                                    $res=$post->ShowPostGroup();
                                    while ($r=$res->fetch_row())
                                    {
                                        echo '<option value="'.$r[0].'"></option>';
                                    }
                                    echo '</datalist>
                                    <textarea class="ckeditor" cols="80" id="PostText" name="PostText" rows="10">' . $p->PostText . '</textarea>
                                    <input name="PostCreateDate" value="-" type="hidden"/>
                                    <input type="submit" value="Update Post" class="btn btn-primary" style="margin-top: 5px" >
                                </form>
                                
                            </blockquote>
                        </div>
                    </div>';
            }
            else {
                echo '<div class="card m-2">
                        <div class="card-header"><h3>' . $p->PostTitle . '</h3>('.$p->PostGroup.')</div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">' . $p->PostText . '</blockquote>
                        </div>
                        </div>';
            }
        }
    ?>

</main>

<?php require_once  'Header.php';
    ?>
