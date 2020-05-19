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

if(isset($_GET['edit_post'])){
    $edit_id=$_GET['edit_post'];
    $que="select * from posts where post_id='$edit_id';";
    $res=mysqli_query($con,$que);
    $resp=mysqli_fetch_assoc($res);
//    echo "<pre>";
//    var_dump($resp);die;
    
}


      
      
      
      
      
?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-file"></i> Edit-Post <small>Edit Post</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-file"></i> Edit-Post</li>
                    </ol>
                    
                     <?php
    
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $author=$_SESSION['author_name'];
        $author_img=$_SESSION['author_image'];
        $details=$_POST['details'];
        $img_name=$_FILES['image']['name'];
        $temp_name=$_FILES['image']['tmp_name'];
        $cat=$_POST['cat'];
        $tags=$_POST['tags'];
        $status=$_POST['status'];
        
        $que="UPDATE `posts` SET `image`='$img_name',`categories`='$cat',`tags`='$cat',`post_data`='$details',`status`='$status' WHERE post_id=$edit_id;";
        
        $res=mysqli_query($con,$que);
        if($res){
            $msg="updated";
            $path="images/$img_name";
            move_uploaded_file($temp_name,"images/$img_name");
        
//            copy($path,"../$path");
        }else{
            $msg="not updated";
            
        }
        
        
    }
                $res=mysqli_query($con,$que);
//                    echo "$que";die;
                                
                                ?>
                    
                  <div class="row">
                      <div class="col-md-9">
                        <form action="" method="post" enctype="multipart/form-data">
                            <label>details</label>
                            <div class="form-group">
                                <textarea cols="50" rows="10" name="details"   class="form-control"><?=$resp['post_data']?></textarea>
                            </div>
                            <div  class="row">
                                <div class="col-md-6">
                                    <label>Post Image</label>
                                    <input type="file"  name="image">
                                </div>
                                <?php
    $que="select * from categories order by cat_id desc;";
                $res=mysqli_query($con,$que);
//                    echo "$que";die;
                                
                                ?>
                                
                                <div class="col-md-6">
                                   <label>categories</label>
                                    <select class="form-control" name="cat">
                                       
                                        <?php
                                        while($row=mysqli_fetch_assoc($res)){
//                                            print_r($row);die;
                                            echo "<option value='".$row['cat_name']."'>".$row['cat_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div  class="row">
                                <div class="col-md-6">
                                    <label>Tags</label>
                                    <input type="text" name="tags" value="<?=$resp['tags']?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                   <label>status</label>
                                    <select class="form-control" name="status">
                                        <option value="publish">publish</option>
                                        <option value="draft">draft</option>
                                    </select>
                                </div>
                            </div><br>
                             <div  class="row">
                                <div class="col-md-6">
                                    <input type="submit" name="submit" value="Post" class="form-control btn btn-primary">
                                </div>
                                 <div class="col-md-6">
                                    <span class="pull-right" style="color:green"><?= $msg ?></span>
                                </div>
                              
                            </div>
                            
                        </form>
                      </div>
                     
                  </div>
                </div>
            </div>
        </div>

       <?php require_once('inc/footer.php') ?>