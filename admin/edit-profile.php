<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');

//previlage checks
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
else if(isset($_SESSION['email']) && $_SESSION['role']!=='admin'){
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
    $image_name=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $edit_id=$_GET['edit_profile'];
//    echo "$temp_name and $image_name";die;
    
    //username unique check
    $que="select * from users where username='$username' and email='$email';";
    $res=mysqli_query($con,$que);
    
    
    if(empty($fname) && empty($lname)  && empty($password)){
        $error="Some fiels are requierd";
    }else if($username !== $trim_username){
        $error="user name should be space less";
    }else if(mysqli_num_rows($res)>0){
        $error="username already exist";
    }else{
        $que="UPDATE `users` SET `fname`='$fname',`lname`='$lname',`image`='$image_name',`password`='$password',`role`='$role' WHERE user_id='$edit_id';";
//        echo "<pre>";
//        var_dump($que);die;
        $res=mysqli_query($con,$que);
        if($res){
            $msg="data Updated";
            move_uploaded_file($temp_name,"img/$image_name");
            $check_img_que="select image from users order by user_id desc;";
            $res_img_que=mysqli_query($check_img_que);
            $image=$res_img_que['image'];
//            header("refresh:0; url=edit-user.php?edit_user=$edit_id");
            
        }else{
            $error="not updated";
        }
    }
}else if(isset($_GET['edit_profile'])){
    $edit_id=$_GET['edit_profile'];
    $que="select * from users where user_id='$edit_id';";
    $res=mysqli_query($con,$que);
    $res=mysqli_fetch_assoc($res);
    $fname=$res['fname'];
    $lname=$res['lname'];
    $password=$res['password'];
    $role=$res['role'];
    $image=$res['image'];
    
}
      
      
      
      
      
      
?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-user"></i> Profile <small>Edit profile</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-user"></i> Edit-profile</li>
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
                                  <input type="text" name="fname" value="<?= $fname; ?>" placeholder="fname" class="form-control">
                             </div>
                              <div class="form-group">
                                  <label>last name</label>
                                  <input type="text" name="lname" value="<?= $lname; ?>" placeholder="lname" class="form-control">
                             </div>
                              <div class="form-group">
                                  <label>password</label>
                                  <input type="password" name="password" value="<?= $password; ?>" placeholder="password" class="form-control">
                             </div>
                              <div class="form-group">
                                  <label>role</label>
                                  <select class="form-control" name="role" value="<?php if($role=='admin'){echo "admin";}elseif($role=='author'){echo "author";} ?>">
                                      <option value="admin">admin</option>
                                      <option value="author">author</option>
                                  </select>
                             </div>
                              <div class="form-group">
                                  <label>profile pic</label>
                                  <input type="file" name="image">
                             </div>
                           
                              <div class="form-group">
                                <input type="submit" name="submit" value="Update profile" class="btn btn-primary ml-0  form-control">
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