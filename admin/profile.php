<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');
//session started in top.php
if(!isset($_SESSION['email'])){
    header('location:login.php');
}

$email=$_SESSION['email'];
//echo $email;die;
$que="select * from users where email='$email';";
$res=mysqli_query($con,$que);
$res=mysqli_fetch_assoc($res);
// echo "<pre>";
// var_dump($res);die('die');

$id=$res['user_id'];
$date=$res['date'];
//$date=date[$date];
//echo $date;die;
$fname=$res['fname'];
$lname=$res['lname'];
$username=$res['username'];
$role=$res['role'];
$image=$res['image'];
$email=$res['email'];
$details=$res['details'];




    
?>
        <div class="conainer-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-user"></i> Profile </h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-user"></i> profile</li>
                    </ol>
                    <center><img src="img/<?php echo $image ?>" width="200px" height="200px" style="border-radius:50%;"></center>
                    <a href="edit-profile.php?edit_profile=<?php echo $id?>" class="btn btn-primary pull-right">Edit profile</a>
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th width="20%">id</th>
                            <td width="30%"><?=$id ?></td>
                            <th width="20%">Sign up date</th>
                            <td width="30%"><?=$date ?></td>
                        </tr>
                         <tr>
                            <th width="20%">First name</th>
                            <td width="30%"><?=$fname ?></td>
                            <th width="20%">Laste name</th>
                            <td width="30%"><?=$lname ?></td>
                        </tr>
                         <tr>
                            <th width="20%">user name</th>
                            <td width="30%"><?=$username ?></td>
                            <th width="20%">Email</th>
                            <td width="30%"><?=$email ?></td>
                        </tr>
                         <tr>
                            <th width="20%">Role</th>
                            <td width="30%"><?=$role ?></td>
                            <th width="20%"></th>
                            <td width="30%"></td>
                        </tr>
                        <div class="row">
                            <div class="col-md-8">
                                <h2>details</h2>
                                <p><?=$details ?></p>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>

       <?php 
          
          require_once('inc/footer.php'); ?>