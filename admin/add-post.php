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

      
      
      
      
      
?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-file"></i> Post <small>Add Post</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-file"></i> Add-Post</li>
                    </ol>
                    
                     <?php
    
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $author=$_SESSION['author_name'];
        $author_img=$_SESSION['author_image'];
//        echo "$author \n";die;
//        echo "author img is $author_img";die;
        $details=$_POST['details'];
        $img_name=$_FILES['image']['name'];
        $temp_name=$_FILES['image']['tmp_name'];
        $cat=$_POST['cat'];
        $tags=$_POST['tags'];
        $status=$_POST['status'];
        
        $que="INSERT INTO `posts`(`title`, `author`, `author_image`, `image`, `categories`, `tags`, `post_data`,`views`, `status`) VALUES ('$title','$author','$author_img','$img_name','$cat','$tags','$details',0,'$status');";
//        echo $que;die;
        
        $res=mysqli_query($con,$que);
        if($res){
             $msg="posted";
            $path="images/$img_name";
            move_uploaded_file($temp_name,"images/$img_name");
//            copy($path,"../$path");
            
        }else{
            
             $msg="not posted";
           
        }
        
        
    }
                $res=mysqli_query($con,$que);
//                    echo "$que";die;
                                
                                ?>
                    
                  <div class="row">
                      <div class="col-md-9">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title*</label>
                                <input type="text" name="title" value="<?=$title?>" class="form-control">
                            </div>
                             <div class="form-group">
                                <a href="media.php" class="btn btn-primary">Add media</a>                                
                            </div>
                            
                            <div class="form-group">
                                <textarea cols="50" rows="10" name="details"  value="<?=$details?>" class="form-control"></textarea>
                            </div>
                            <div  class="row">
                                <div class="col-md-6">
                                    <label>Post Image</label>
                                    <input type="file" value="<?=$image_name?>" name="image">
                                </div>
                                <?php
    $que="select * from categories order by cat_id desc;";
                $res=mysqli_query($con,$que);
//                    echo "$que";die;
                                
                                ?>
                                
                                <div class="col-md-6">
                                   <label>categories</label>
                                    <select class="form-control" name="cat">
                                       <option value="">select opt</option>
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
                                    <input type="text" name="tags" value="<?=$tags?>" class="form-control">
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