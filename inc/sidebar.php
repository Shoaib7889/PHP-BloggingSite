<?php
require_once('db.php');

//while($row=mysqli_fetch_assoc($side_post)){
//    echo "<pre>";
//    var_dump($row);    
//}
//die;
?>
                  <div class="col-md-4">
                   <!-- <div class="widget">
                    <div class="input-group mt-3">
                      <input type="text" class="form-control" placeholder="Search for" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Button</button>
                      </div>
                    </div>
                   </div> --><!--widget-->
                   
                   <div class="widget">
                      <div class="popular">   
                          <h3 class="mt-5 mb-5 text-center font-weight-bold display-5">Popular Posts</h3>
                          
                        <?php
                          $side_que="select * from posts order by views desc;";
                        $side_post=mysqli_query($con,$side_que);
                          while($row=mysqli_fetch_assoc($side_post)){
                              $id=$row['post_id'];
                                   ?>
                                   <div class="row">
                                       <div class="col-md-4">
                                            <a href="post.php?post_id=<?php echo $id ?>"><img src="admin/images/<?=$row['image']?>"></a>
                                       </div>
                                       <div class="col-md-8 details">
                                            <a href="post.php?post_id=<?php echo $id ?>"><h4><?=$row['title']?> </h4></a>
                                            <p><?=$row['categories']?></p>
                                       </div>
                                   </div><hr>
                                   <?php
                          }
                          ?>
                          
                          
                           
                          
                      </div>
                   </div><!--widget popular posts-->
                   
                   <div class="widget">
                      <div class="popular">   
                          <h3 class="mt-5 mb-5 text-center font-weight-bold display-5">Recent posts</h3>
                          
                          <?php
                            $side_que="select * from posts order by post_id desc ;";
                        $side_post=mysqli_query($con,$side_que);
                           while($row=mysqli_fetch_assoc($side_post)){
                              $id=$row['post_id'];
                                   ?>
                                   <div class="row">
                                       <div class="col-md-4">
                                            <a href="post.php?post_id=<?php echo $id ?>"><img src="admin/images/<?=$row['image']?>"></a>
                                       </div>
                                       <div class="col-md-8 details">
                                            <a href="post.php?post_id=<?php echo $id ?>"><h4><?=$row['title']?> </h4></a>
                                            <p><?=$row['categories']?></p>
                                       </div>
                                   </div><hr>
                                   <?php
                          }
                          ?>
                      </div>
                   </div><!--widget recents post-->

                   <div class="widget">
                    <h1 class="mt-5 mb-5 text-center font-weight-bold display-5">Follow us on</h1>
                      <div class="icons">
                       <div class="row mb-3 ml-3">
                          <div class="col-md-4">
                              <i class="fa fa-facebook " style="font-size: 30px"></i>
                          </div>
                          <div class="col-md-4">
                              <i class="fa fa-twitter fa-xs" style="font-size: 30px"></i>
                          </div>
                          <div class="col-md-4">
                              <i class="fa fa-instagram fa-xs" style="font-size: 30px"></i>
                          </div>
                       </div>
                       <div class="row ml-3 pb-4">
                          <div class="col-md-4 ">
                              <i class="fa fa-youtube" style="font-size: 30px"></i>
                          </div>
                          <div class="col-md-4">
                              <i class="fa fa-pinterest" style="font-size: 30px"></i>
                          </div>
                          <div class="col-md-4">
                              <i class="fa fa-home" style="font-size: 30px"></i>
                          </div>
                       </div>
                      </div>
                   </div><!--widget catrogy-->
                </div>