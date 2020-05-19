<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
if($_SESSION['role']=='author'){
    header('location:index.php');
}

      
if(isset($_GET['del_comment'])){
    $del_id=$_GET['del_comment'];
    $chek_que="select * from comments where comment_id=$del_id;";
//    echo "$chek_que";die;
    $chek_res=mysqli_query($con,$chek_que);
    if(mysqli_num_rows($chek_res)>0){
        $que="delete from comments where comment_id=$del_id;";
         if(isset($_SESSION['email']) && $_SESSION['role']=='admin'){
              $res=mysqli_query($con,$que);
            if($res){
                $msg="comment deleted";
            }else{
                $error="User not deleted";
            }
        }else{
            header('location:index.php');
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
                $que="delete from comments where comment_id='$val[0]';";
                $res=mysqli_query($con,$que);
            }else if($value_of_bulksub=='approve'){
                $que="update comments set status='$value_of_bulksub' where comment_id='$val[0]';";
                $res=mysqli_query($con,$que);
            }else if($value_of_bulksub=='pending'){
                 $que="update comments set status='$value_of_bulksub' where comment_id='$val[0]';";
                $res=mysqli_query($con,$que);
            }
        }
    }else{
//        echo "not good";
    }
    
    
}
      
      
      
?>
   

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-comments"></i> Comments <small>View All Comments</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-comments"></i> Comments</li>
                    </ol>
                    
                    <?php
    if(isset($_GET['reply_id'])){
        $reply_id=$_GET['reply_id'];
        $email_id=$_SESSION['email'];
        $que="select * from users where email='$email_id';";
        $res=mysqli_query($con,$que);
        if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            
            $name=$row['name'];
            $username=$row['username'];
            $post_id=$reply_id;
            $email=$row['email'];
            $image=$row['image'];
            if(isset($_POST['reply'])){
                $comment=$_POST['comment'];
                $que="INSERT INTO `comments`(`name`, `username`, `post_id`, `email`,`image`, `comment`, `status`) VALUES ('$name','$username','$post_id','$email','$image','$comment','approve');";
                $res_reply=mysqli_query($con,$que);
                if($res_reply){
                    $replied="msg replied";
                    header('location:comments.php');
                }else{
                    $replied="msg not replied";
                    
                }
            }
            
        }
        
    
    
    ?>
                   
                     <div class="row">
                            <div class="col-md-6">
                                <form action="" method="post">
                                   <div class="form-group">
                                    <label>comment</label>
                                    <textarea rows="10" cols="50" name="comment" class="form-control" ></textarea>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-4">
                                           <input type="submit" class="form-control btn btn-primary" value="Reply" name="reply" >
                                       </div>
                                   </div>
                                </form>
                            </div>
                       </div><!--form of reply-->
<?php
} 
                
?>
                   <span class="" style="color:green"><?=$replied?></span>
                    <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                         
                               <br><br>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <select name="bulk_opt" id="" class="form-control">
                                                <option value="delete">Delete</option>
                                                <option value="approve">Approve</option>
                                                <option value="pending">Unapprove</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="submit" class="btn btn-success" name="bulk_submit"  value="Apply"><!--sirf form me input hi submit hoti he or ku6 nai-->
                                        
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
                     <?php
                    $que="select * from comments;";
                    $res=mysqli_query($con,$que);
//                    $resp=mysqli_fetch_assoc($res);
//                    echo "<pre>";
//                    var_dump($resp);die;
    
    
    
    ?>
                    
                    
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                               
                                <th>Sr#</th>
                                <th>Sr#</th>
                                <th>Date</th>
                                <th>Username</th>
                                <th>comment</th>
                                <th>status</th>
                                <th>Reply</th>
                                <th>Del</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    
                                    
                                    $date= $post['date'];
                                    $date=strtotime($date);
                                    $datee=getdate($date);
                                    $day=$datee['mday'];
                                    $month=$datee['month'];
                                    $year=$datee['year'];
                                    $status=$row['status'];

                                    
                                    ?>
                                     <tr>
                                       <td><input name="checkboxes[]" value="<?=$row['comment_id']?>" type="checkbox"></td>
                                        
                                        <td><?=$row['comment_id']?></td>
                                        <td><?="$day $month $year";?></td>
                                        
                                        <td><?=$row['username']?></td>
                                        <td><?=$row['comment']?></td>
                                        <?php if($row['status']=='approve'){
                                        echo "<td style='color:green'>$status</td>";
                                    }elseif($status=='pending'){
                                        echo "<td style='color:red'>$status</td>";
                                    }
                                        
                                            ?>
                                        
                                        
                                        
                                        
                                        <td><a href="comments.php?reply_id=<?php echo $row['post_id']?> "><i class="fa fa-reply"></i></a></td>
                                        <td><a href="comments.php?del_comment=<?php echo $row['comment_id']?>"><i class="fa fa-times"></i></a></td>
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