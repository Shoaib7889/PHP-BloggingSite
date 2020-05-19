<?php
require_once('inc/db.php');
ob_start();
session_start();
if(isset($_SESSION['email'])){
    header('location:index.php');
}
if(isset($_POST['submit']))
{
    //for sql injection     ('1 or 1=1')injection
//    $email=mysqli_real_escape_string($con,$_POST['email']);//it will remove all escape charaters Ex. echo "\n shoaib"; 
//    $password=mysqli_real_escape_string($con,$_POST['password']);
//    $email=htmlentities($email);
//    $password=htmlentities($password);
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $check_query="select * from users where email='$email';";
    $check_run=mysqli_query($con,$check_query);
    
    if(mysqli_num_rows($check_run)>0){
        $row=mysqli_fetch_array($check_run);//this will receive one other param which will decide arry will be either 
        //$row=mysqli_fetch_array($check_run,MYSQLI_NUM);//this will receive one other param which will decide arry will be either 
        //numeric / assoc / or both    --defalut or with out argument it show both
//        echo "<pre>";
//        var_dump($row);
        //you can use either numeric index or assoc index
        //echo $row[0];//echo $row['user_id'];
//        die;
        
        $db_email=$row['email'];
        $db_password=$row['password'];
        $db_role=$row['role'];
        $author_img=$row['image'];
        $db_name=$row['username'];
//        echo "$db_name";


        
//        $new_pass=crypt($password,$db_password);
//        echo $new_pass;die;
        if($password==$db_password && $email==$db_email){
//            session_start();
            if($db_role==='author'){
                $_SESSION['role']=$db_role;
            }else if($db_role==='admin'){
                $_SESSION['role']=$db_role;
            }
            $_SESSION['author_name']=$db_name;
            $_SESSION['email']=$email;
            $_SESSION['author_image']=$author_img;
//            echo $_SESSION['author_name'];die;
            // if(isset($_SESSION['email'])){
                header('location:index.php');
            // }
        }else{
            $error="Email or Password incorrect";
        }
    
        
        
       // $row=mysqli_fetch_assoc($check_run);
       // echo "<pre>";
       // var_dump($row);die('die');
    }
    else{
        echo "bad from num_rows";
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Login | Blog Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin animated shak" action="" method="post">
        <h2 class="form-signin-heading">Blog Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        
        <input type="submit" name="submit" value="log in" class="btn btn-primary">
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>