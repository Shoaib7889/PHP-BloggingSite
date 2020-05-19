<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
if($_SESSION['role']=='author'){
    header('location:index.php');
}

      
if(isset($_GET['del_user'])){
    $del_id=$_GET['del_user'];
    $que="delete from users where user_id=$del_id;";
    if(isset($_SESSION['email']) && $_SESSION['role']=='admin'){
          $res=mysqli_query($con,$que);
        if($res){
            $msg="User delected";
        }else{
            $error="User not deleted";
        }
    }else{
        header('location:index.php');
    }
  
    
    
}else if(isset($_POST['bulk_submit'])){
    $value_of_bulksub=$_POST['bulk_opt'];
//    echo "$value_of_bulksub";
    
    if(isset($_POST['checkboxes'])){
        $checkbox=$_POST['checkboxes'];//giving refrence ot checkbos
        foreach($checkbox as $val){
            if($value_of_bulksub=='delete'){
                $que="delete from users where user_id='$val[0]';";
                $res=mysqli_query($con,$que);
            }else if($value_of_bulksub=='author'){
                $que="update users set role='$value_of_bulksub' where user_id='$val[0]';";
                $res=mysqli_query($con,$que);
            }else if($value_of_bulksub=='admin'){
                 $que="update users set role='$value_of_bulksub' where user_id='$val[0]';";
                $res=mysqli_query($con,$que);
            }
        }
    }else{
        echo "not googd";
    }
    
    
}
      
      
      
?>
   

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-users"></i> Users <small>View All Users</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-users"></i> Users</li>
                    </ol>
                    <?php
                    $que="select * from users ;";
                    $res=mysqli_query($con,$que);
//                    $resp=mysqli_fetch_assoc($res);
//                    echo "<pre>";
//                    var_dump($resp);die;
    
    
    
    ?>
                    <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                            
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <select name="bulk_opt" id="" class="form-control">
                                                <option value="delete">Delete</option>
                                                <option value="author">Change to Author</option>
                                                <option value="admin">Change to Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="submit" class="btn btn-success" name="bulk_submit"  value="Apply"><!--sirf form me input hi submit hoti he or ku6 nai-->
                                        <a href="add-user.php" class="btn btn-primary">Add New</a>
                                        <?php
                                        if(isset($error)){
                                            echo "<span style='color:red' class=''>$error</span>";
                                        }else{
                                            echo "<span style='color:green' class=''>$msg</span>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                               
                                <th>Sr #</th>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Password</th>
                                <th>Role</th>
<!--                                <th>Posts</th>-->
                                <th>Edit</th>
                                <th>Del</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $date=getdate($row['date']);
                                    $day=$date['mday'];
                                    $month=$date['month'];
                                    $year=$date['year'];
                                    ?>
                                     <tr>
                                       <td><input name="checkboxes[]" value="<?=$row['user_id']?>" type="checkbox"></td>
                                        <td><?=$row['user_id']?></td>
                                        <td><?=$day; $month; $year;?></td>
                                        <td><?=$row['lname']?></td>
                                        <td><?=$row['username']?></td>
                                        <td><?=$row['email']?></td>
                                        <td><img src="img/<?=$row['image']?>" width="30px"></td>
                                        <td>***********</td>
                                        <td><?=$row['role']?></td>
                                        
                                        <td><a href="edit-user.php?edit_user=<?php echo $row['user_id']?> "><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="users.php?del_user=<?php echo $row['user_id']?>"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    
                                    <?php
                                }
                            }
                            
                            
                            ?>
                           
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>

       <?php require_once('inc/footer.php') ?>