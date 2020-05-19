<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');

//previlage checks
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
elseif(isset($_SESSION['email']) && $_SESSION['role']!=='admin'){
    header('location:login.php');
}
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $date=time();
    $lname=$_POST['lname'];
    $username=strtolower($_POST['username']);
    $trim_username=preg_replace('/\s/','',$username);
//    echo $trim_username;die;
    $password=$_POST['password'];
    $email=strtolower($_POST['email']);
    $role=$_POST['role'];
    $details=$_POST['details'];
    $image_name=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
//    echo "$temp_name and $image_name";die;
    
    //username unique check
    $que="select * from users where username='$username' and email='$email';";
    $res=mysqli_query($con,$que);
    
    
    if(empty($fname) && empty($lname) && empty($username) && empty($password) && empty($email) ){
        $error="Some fiels are requierd";
    }else if($username !== $trim_username){
        
        $error="user name should be space less";
    }else if(mysqli_num_rows($res)>0){
        $error="username already exist";
    }else{
        $que="INSERT INTO `users`(`date`, `fname`, `lname`, `username`, `email`, `image`, `password`,`details`, `role`) VALUES ('$date','$fname','$lname','$username','$email','$image_name','$password','$details','$role');";
        $res=mysqli_query($con,$que);
        if($res){
            $msg="data inserted";
            move_uploaded_file($temp_name,"images/$image_name");
            $check_img_que="select image from users order by user_id desc;";
            $res_img_que=mysqli_query($check_img_que);//to selelct the image name from users table
            $image=$res_img_que['image'];
            
        }else{
            $error="not inserted";
        }
    }
}
      
      
      
      
      
      
?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Users <small>Add user</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-user-plus"></i> Add-User</li>
                    </ol>
                  <div class="row">
                      <div class="col-md-8">
                        <form action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                  <label>first name</label>
                                  <?php
                                    if(isset($error)){
                                        echo "<span style='color:red' class='pull-right'>$error</span>";
                                    }else if(isset($msg)){
                                        echo "<span style='color:green' class='pull-right'>$msg</span>";
                                    }
                                 ?>
                                  <input type="text" name="fname" value="<?php if(isset($fname)){echo $fname;} ?>" placeholder="fname" class="form-control">
                             </div>
                              <div class="form-group">
                                  <label>last name</label>
                                  <input type="text" name="lname" value="<?php if(isset($lname)){echo $lname;} ?>" placeholder="lname" class="form-control">
                             </div>
                              <div class="form-group">
                                  <label>user name</label>
                                  <input type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>" placeholder="username" class="form-control">
                             </div>
                              <div class="form-group">
                                  <label>email</label>
                                  <input type="email" name="email" value="<?php if(isset($email)){echo $email;} ?>" placeholder="eamil" class="form-control">
                             </div>
                              <div class="form-group">
                                  <label>password</label>
                                  <input type="password" name="password" value="<?php if(isset($password)){echo $password;} ?>" placeholder="password" class="form-control">
                             </div>
                              <div class="form-group">
                                  <label>role</label>
                                  <select class="form-control" name="role" value="<?php if(isset($role)){echo $role;} ?>">
                                      <option value="admin">admin</option>
                                      <option value="author">author</option>
                                  </select>
                             </div>
                              <div class="form-group">
                                  <label>Description</label>
                                  <textarea class="form-control" cols="50" rows="10" name="details"></textarea>
                             </div>
                              <div class="form-group">
                                  <label>profile pic</label>
                                  <input type="file" name="image" value="">
                             </div>
                              <div class="form-group">
                                <input type="submit" name="submit" value="Add User" class="btn btn-primary ml-0  form-control">
                            </div>
                        </form>
                      </div>
                      <div class="col-md-4">
                          <?php
                          if(isset($image)){
                              echo "<img src='img/$image' width='100px'>";
                          }
                          ?>
                      </div>
                  </div>
                </div>
            </div>
        </div>

       <?php require_once('inc/footer.php') ?>