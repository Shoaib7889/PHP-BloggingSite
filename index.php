<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');


//pagination
if(isset($_GET['page_id'])){
    $page_id=$_GET['page_id'];
}else{
    $page_id=1;
}

//echo "$cat_id";die; was coming from header
if(isset($_GET['cat_id'])){
    $cat_id=$_GET['cat_id'];
    $que="select * from categories  where cat_id='$cat_id';";
//    echo $que;die;
    $que_res=mysqli_query($con,$que);
    $resp=mysqli_fetch_assoc($que_res);
   // print_r($resp);die;
    $cat_name=$resp['cat_name'];
    
    
}


//pagination
$no_of_posts=3;
$post_que="select * from posts ";

if(isset($cat_name)){
    $post_que.="where categories='$cat_name';";
}

$post_res=mysqli_query($con,$post_que);
$posts_no=mysqli_num_rows($post_res);
$pages=ceil($posts_no/$no_of_posts);
$post_start_from=($page_id-1) * $no_of_posts;
//echo $posts_no;
//echo $pages;
//echo $post_start_from;die;






?>   
    
    

    
    <div class="jumbotron">
        
            <div class="details animated fadeInLeft">
                <h1 class="text-light">Shoaib403 <span class="text-primary">Blog</span></h1>
                <p class="text-light">this is the thing i wnat you do</p>
            </div>
        
        <img src="images/service10.jpg">
    </div>
    
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="ml-0 col-md-8 ">
                   <div class="slider mt-4">   
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                       
                       
                         <?php
                          
                          $slide_que="select * from posts order by post_id  desc limit 4;";
                            $slide_post=mysqli_query($con,$slide_que);
                          $i=0;
                          while($row=mysqli_fetch_assoc($slide_post)){
                              $img_name=$row['image'];
                              
                              if($i=0){
                                  
                                   echo "<div class='carousel-item active'>
                                      <img class='d-block w-100' src='images/.$img_name.' alt='First slide'>
                                       <div class='carousel-caption d-none d-md-block'>
                                        <h5>".$row['title']."</h5>
                                        <p>".$row['categories']."</p>
                                      </div>
                                  </div>";
                                  
                                  
                              }else{
                              
                              echo "<div class='carousel-item '>
                                      <img class='d-block w-100' src='images/.$img_name.' alt='First slide'>
                                       <div class='carousel-caption d-none d-md-block'>
                                        <h5>".$row['title']."</h5>
                                        <p>".$row['categories']."</p>
                                      </div>
                                  </div>";
                              
                              }
                              $i++;
                              
                          }
                          ?>
                       
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                      </a><!--button to slide data-->
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                      </a><!--button to slide data-->
                    </div>
                   </div><!--slider-->
                   
                   <div class="mt-5 mb-3 post">
                       <?php
                       $que="select * from posts where status='publish' ";
                       if(isset($cat_name)){
                           $que.="and categories='$cat_name' ";
                       }
                       $que.="  limit $post_start_from,$no_of_posts;";
//                       echo $que;die;
                        $post=mysqli_query($con,$que);
//                       print_r($post);die;
                       if(mysqli_num_rows($post)){
                           while($row=mysqli_fetch_assoc($post)){
                               $date= $row['date'];
//                               echo $date;
                               $date=strtotime($date);
//                               echo "date is strtotime $date";
//                               $day=$date['day'];
//                               echo "day is $day";
                               $datee=getdate($date);
                               $day=$datee['mday'];
                               $month=$datee['month'];
                               $year=$datee['year'];
                               
                               ?>
                               <div class="row">
                                    <div class="col-md-2 post-data">
                                        <div class="font-weight-bold f-4 text-primary date"><?=$day?></div>
                                        <div class=" ml-2 text-dark month"><?=$month?></div>
                                        <div class="text-dark year"><?=$year?></div>
                                    </div>
                                    <div class="text-primary col-md-8 post-title">
                                        <a href="post.php?post_id=<?=$row['post_id']?>"><h1><?=$row['title']?></h1></a>
                                    </div>
                                    <div class="col-md-2 profile-picutre">
                                        <img src="admin/images/<?=$row['author_image']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="post.php?post_id=<?=$row['post_id']?>"><img src="admin/images/<?=$row['image']?>" width="100%" height="450px"></a>
                                        <div class="desc mt-2 p-3">
                                           <?=substr($row['post_data'],0,300) ?>.....
                                        </div>
                                         <a href="post.php?post_id=<?=$row['post_id']?>" class="btn btn-primary">Read more</a>
                                        <div class="mt-3">
                                            <a href="javascript//:" class="ml-0"><i class="fa fa-comment">&nbsp;comment</i></a>
                                            <a href="javascript//:" class="ml-3"><i class="fa fa-folder">&nbsp;<?=$row['categories']?></i></a>
                                        </div><br><br>
                                    </div>
                                  </div>
                                 
                               <?php
                               
                           }
                       }else{
                           echo "<h1>no posts available</h1>";
                       }
                       
                       
                       ?>
                        
                        
                    </div><!--post area-->
                   
                   
                    
                    <div class="pagin">
                        <nav aria-label="Page navigation example">
                          <ul class="pagination pagi">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <?php
//                              echo "$cat_id";die;
                              for($i=1;$i<=$pages;$i++){
//                                  echo $i;
//                                  die;
                                  if($page_id==$i){
//                                      echo "inside";
                                      $active='';
                                      $active.='active';
                                      if(isset($_GET['cat_id'])){
                                          echo "<li class='page-item active'><a class='page-link' href='index.php?page_id=".$i."&cat_id=".$cat_id."'>$i</a></li>";
                                      }
                                      echo "<li class='page-item active'><a class='page-link' href='index.php?page_id=".$i."'>$i</a></li>";
                                  }else{
                                       if(isset($_GET['cat_id'])){
                                          echo "<li class='page-item'><a class='page-link' href='index.php?page_id=".$i."&cat_id=".$cat_id."'>$i</a></li>";
                                      }
                                      echo "<li class='page-item'><a class='page-link' href='index.php?page_id=".$i."'>$i</a></li>";
                                  }
                                  
                                  
                                  
                              }
                              ?>
                            
                           
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                    
                </div><!--slider and post-->
                
                
                
      <?php require_once('inc/sidebar.php') ?>
            </div>
        </div>
    </section>
    
   
      
<?php require_once('inc/footer.php') ?>