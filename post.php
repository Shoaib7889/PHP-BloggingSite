<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');


//updadting veiws
$post_id=$_GET['post_id'];
$select_que="select views from posts where post_id='$post_id';";
$rez=mysqli_query($con,$select_que);
$v=mysqli_fetch_assoc($rez);
//print_r($v);    
$v=$v['views'];
//$update_que_view="UPDATE `posts` SET views=views+1 WHERE post_id='$post_id';";//it will also works
$update_que_view="UPDATE `posts` SET views=$v+1 WHERE post_id='$post_id';";
//echo $update_que_view;
mysqli_query($con,$update_que_view);



$que="select * from posts where post_id='$post_id' and status='publish';";
$resp=mysqli_query($con,$que);
//if data exits
if(mysqli_num_rows($resp)>0){
    $post=mysqli_fetch_assoc($resp);
}else{
    header('location:index.php');
}
$date= $post['date'];
$date=strtotime($date);
$datee=getdate($date);
$day=$datee['mday'];
$month=$datee['month'];
$year=$datee['year'];

//echo "<pre>";
//var_dump($post);die;
if(isset($_POST['comment'])){
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $website=$_POST['website'];
    $msg=$_POST['msg'];
    $name=$_POST['name'];
    $status='pending';
    $comment_que="INSERT INTO `comments`(`username`, `post_id`, `email`, `website`, `comment`, `status`) VALUES ('$name','$post_id','$email','$website','$msg','$status');";
    $comment_resp=mysqli_query($con,$comment_que);
    if($comment_resp){
        $comt_msg="you comment submited for approval";
    }else{
        $comt_msg="not commented";
    }
    
}
?>
  
    
    
    <div class="jumbotron">
        
            <div class="details animated fadeInLeft">
                <h1 class="text-light">Post <span class="text-primary">s</span></h1>
                <p class="text-light">this is the thing i wnat you do</p>
            </div>
        
        <img src="images/service10.jpg" >
    </div>
    
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ">
                   <div class="mt-5 mb-3 post">
                        <div class="row">
                            <div class="col-md-2 post-data">
                                <div class="font-weight-bold f-4 text-primary date"><?=$day?></div>
                                <div class=" text-dark month"><?=$month?></div>
                                <div class="text-dark year"><?=$year?></div>
                            </div>
                            <div class="text-primary col-md-8 post-title">
                                <h1><?=$post['title']?></h1>
                            </div>
                            <div class="col-md-2 profile-picutre">
                                <img src="images/service7.jpg">
                            </div>
                        </div>
<!--                        <img src="admin/images/" style="margin-left:100px;border-radius:3px" width="70%" height="450px">-->
                        <img src="admin/images/<?=$post['image']?>"  width="100%" height="450px">
                        <div class="desc mt-2 p-3">
                            <?=$post['post_data']?><br><?=$post['post_data']?>
                        </div>
                        <div class="mt-3">
                            <a href="javascript//:" class="ml-0"><i class="fa fa-comment">&nbsp;comment</i></a>
                            <a href="javascript//:" class="ml-3"><i class="fa fa-folder">&nbsp;<?=$post['categories']?></i></a>
                        </div><br><br>
                    </div><!--post area-->
                    
                    
                    <div class="related-post">
                       <h2 class="text-primary">Related Post:</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#">
                                    <img src="images/service1.jpg">
                                    <h4>this is the link i want to follow for my info</h4>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#">
                                    <img src="images/service1.jpg">
                                    <h4>this is the link i want to follow for my info</h4>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#">
                                    <img src="images/service1.jpg">
                                    <h4>this is the link i want to follow for my info</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <?php
    $author=$post['author'];
//                                    echo "<pre>";
//                                    var_dump($post);echo "\n\n";
                                    $que="select details from users where username='$author';";
//                                    echo $que;
                                    $resp=mysqli_query($con,$que);
                                    $details=mysqli_fetch_assoc($resp);
//                                    echo $details['details'];
                                
    
    ?>
                    
                    <div class="author-area">
                        <div class="row mt-5 ml-2">
                            <div class="col-md-3">
                                <a href="#"><img src="admin/images/<?= $post['author_image'] ?>"></a>
                            </div>
                            <div class="col-md-9 mt-3">
                               <h1 class="text-primary"><?= $post['author'] ?></h1>
                                <p><?=$details['details']?></p>
                            </div>
                           
                        </div>
                    </div><!--author-area-->
                    
                    <div class="comment-area">
                       <div class="row mt-5 ml-4">
                            <div class="col-md-3">
                                <h2 class="mt-4 text-primary">Comments:</h2>
                            </div>
                            
                        </div>
                        <?php
    
    $com_que="select * from comments ;";
                                                 $com_res=mysqli_query($con,$com_que);
                                                 while($row=mysqli_fetch_assoc($com_res)){
                                                     
                                                 
                                                 
                        ?>
                       
                        <div class="row mt-1 ml-4">
                            <div class="col-md-3">
                                <img id='comment-img' src="admin/images/<?=$row['image']?>" style="border-radius:50%" width="20px" height="30px"/>
                            </div>
                            <div class="col-md-9 mt-3 " id='comment-text'>
                               <h3 class="text-primary"><?=$row['name']?></h3>
                                <p><?=$row['comment']?></p>
                            </div>
                        </div>
                      
                        <?php
                        
                        }
                        ?>
                        
                    </div><!--commnet-area-->
                    
                    <h2 class="mt-5">Comment-Form:</h2>
                   <div class="containe">
                       <div class="row mt-3 mr-4">
                           <div class="col-md-8">
                               <form action="" method="post">
                                   <div class="form-group">
                                       <label>Full name:</label>
                                       <input type="text" name="name" class="form-control" placeholder="Enter your name">
                                   </div>
                                   <div class="form-group">
                                       <label>email</label>
                                       <input type="email" name="email" class="form-control" placeholder="Enter your mail">
                                   </div>
                                   <div class="form-group">
                                       <label>website:</label>
                                       <input type="text" name="website" class="form-control" placeholder="Enter your website">
                                   </div>
                                   <div class="form-group">
                                       <label>Enter you msg:</label>
                                       <textarea id="msg" name="msg" cols="30" rows="6" class="form-control"></textarea>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-3">
                                           <div class="form-group">
                                       <input type="submit" name="comment" class="btn btn-primary form-control" value="Submit">
                                   </div>
                                       </div>
                                   </div>
                               </form><span class="pull-right text-success"><?php if(isset($comt_msg)){ echo $comt_msg;}?></span>
                           </div>
                       </div>
                   </div><!--form-->
                    
                </div><!--post-->
                
                
                
                <?php require_once('inc/sidebar.php') ?>  
            </div>
        </div>
        
    </section>
   
   
       <?php require_once('inc/footer.php') ?>  