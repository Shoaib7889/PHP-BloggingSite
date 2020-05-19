<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');
//session started in top.php
if(!isset($_SESSION['email'])){
    header('location:login.php');
}else{
    
      ?>
        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-tachometer"></i> Dashboard <small>Statistics Overview</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Dashboard</li>
                    </ol>

                    <div class="row tag-boxes">
                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                           <?php
                           $que="select * from comments where status='pending';";
                           $res=mysqli_query($con,$que);
                           $no=mysqli_num_rows($res);
                           
                           
                           ?>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">0<?=$no?></div>
                                            <div class="text-right">New Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="comments.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All Comments</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                         <?php
                           $que="select * from posts;";
                           $res=mysqli_query($con,$que);
                           $no=mysqli_num_rows($res);
                           
                           
                           ?>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">0<?=$no?></div>
                                            <div class="text-right">All Posts</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="posts.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All Posts</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                         <?php
                           $que="select * from users ;";
                           $res=mysqli_query($con,$que);
                           $no=mysqli_num_rows($res);
                           
                           
                           ?>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">0<?=$no?></div>
                                            <div class="text-right">All Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All Users</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>                            
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-folder-open fa-5x"></i>
                                        </div>
                                         <?php
                           $que="select * from categories ;";
                           $res=mysqli_query($con,$que);
                           $no=mysqli_num_rows($res);
                           
                           
                           ?>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">0<?=$no?></div>
                                            <div class="text-right">All Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="categories_.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All Categories</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><hr>
 <?php
                    $que="select * from users order by user_id desc limit 3;";
                    $res=mysqli_query($con,$que);
//                    $resp=mysqli_fetch_assoc($res);
//                    echo "<pre>";
//                    var_dump($resp);die;
    
    
    
    ?>
                   
                    <h3>New Users</h3>
                    <table class="table table table-striped table-hover">
                        <thead>
                            <tr>
                               
                                
                                <th>ID</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Role</th>
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
                                       
                                        <td><?=$row['user_id']?></td>
                                        <td><?=$day; $month; $year;?></td>
                                        <td><?=$row['lname']?></td>
                                        <td><?=$row['username']?></td>
                                        <td><?=$row['role']?></td>
                                       
                                    </tr>
                                    
                                    <?php
                                }
                            }
                            
                            
                            ?>
                           
                        </tbody>
                    </table>
                    <a href="users.php" class="btn btn-primary">View All Users</a><hr>
                    <?php
                    $que="select * from posts order by post_id desc limit 3;";
                    $res=mysqli_query($con,$que);
//                    $resp=mysqli_fetch_assoc($res);
//                    echo "<pre>";
//                    var_dump($resp);die;
    
    
    
    ?>
                    
                    <h3>New Posts</h3>
                     <table class="table table table-striped table-hover">
                        <thead>
                            <tr>
                               
                                
                                <th>ID</th>
                                <th>Date</th>
                                <th>Post title</th>
                                <th>Category</th>
                                <th>Views</th>
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
                                       
                                        <td><?=$row['post_id']?></td>
                                        <td><?=$day; $month; $year;?></td>
                                        <td><?=$row['title']?></td>
                                        <td><?=$row['categories']?></td>
                                        <td><i class="fa fa-eye"></i><?=$row['views']?></td>
                                       
                                    </tr>
                                    
                                    <?php
                                }
                            }
                            
                            
                            ?>
                           
                        </tbody>
                    </table>
                    <a href="posts.php" class="btn btn-primary">View All Posts</a>
                </div>
            </div>
        </div>
<?php
}          
?>
       <?php 
          
          require_once('inc/footer.php'); ?>