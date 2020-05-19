<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
if($_SESSION['role']=='author'){
    header('location:index.php');
}

      
if(isset($_GET['del_post'])){
    $del_id=$_GET['del_post'];
    $que="delete from posts where post_id=$del_id;";
    if(isset($_SESSION['email']) && $_SESSION['role']=='admin'){
          $res=mysqli_query($con,$que);
        if($res){
            $msg="post deleted";
        }else{
            $error="post not deleted";
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
                $que="delete from posts where post_id='$val[0]';";
                $res=mysqli_query($con,$que);
            }else if($value_of_bulksub=='publish'){
                $que="update posts set status='$value_of_bulksub' where post_id='$val[0]';";
                $res=mysqli_query($con,$que);
            }else if($value_of_bulksub=='draft'){
                 $que="update posts set status='$value_of_bulksub' where post_id='$val[0]';";
                $res=mysqli_query($con,$que);
            }
        }
    }else{
//        echo "not googd";
    }
    
    
}
      
      
      
?>
   

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-file"></i> Posts <small>View All Posts</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-file"></i> Posts</li>
                    </ol>
                   
                    <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                            
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <select name="bulk_opt" id="" class="form-control">
                                                <option value="delete">Delete</option>
                                                <option value="publish">publish</option>
                                                <option value="draft">draft</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="submit" class="btn btn-success" name="bulk_submit"  value="Apply"><!--sirf form me input hi submit hoti he or ku6 nai-->
                                        <a href="add-post.php" class="btn btn-primary">Add New</a>
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
                                <th>Sr #</th>
                                
                                <th>Date</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Categories</th>
                                <th>views</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Del</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                    $que="select * from posts ;";
                    $res=mysqli_query($con,$que);

    
    
    
    
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                                     $date= $post['date'];
                                    $date=strtotime($date);
                                    $datee=getdate($date);
                                    $day=$datee['mday'];
                                    $month=substr($datee['month'],0,3);
                                    $year=$datee['year'];
                                    $status=$row['status'];

                                    
                                    
                                    ?>
                                     <tr>
                                       <td><input name="checkboxes[]" value="<?=$row['post_id']?>" type="checkbox"></td>
                                        <td><?=$row['post_id']?></td>
                                        <td><?="$day $month $year";?></td>
                                        <td><?=$row['title']?></td>
                                        <td><?=$row['author']?></td>
                                        
                                        <td><img src="images/<?=$row['image']?>" width="30px"></td>
                                        <td><?=$row['categories']?></td>
                                        <td><?=$row['views']?></td>
                                         <?php if($row['status']=='publish'){
                                        echo "<td style='color:green'>$status</td>";
                                    }elseif($status=='draft'){
                                        echo "<td style='color:red'>$status</td>";
                                    }
                                        
                                            ?>
                                        
                                        <td><a href="edit-post.php?edit_post=<?php echo $row['post_id']?> "><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="posts.php?del_post=<?php echo $row['post_id']?>"><i class="fa fa-times"></i></a></td>
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