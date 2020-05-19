<div class="col-md-3">
                    <div class="list-group">
                      <a href="index.php" class="list-group-item active dash">
                        <i class="fa fa-tachometer"></i> Dashboard
                      </a>
                      <a href="posts.php" class="list-group-item posts">
                          <i class="fa fa-file-text"></i> All Posts
                      </a>
                      <a href="media.php" class="list-group-item posts">
                          <i class="fa fa-database"></i> Media
                      </a>
                      <a href="categories_.php" class="list-group-item cats">
                          <i class="fa fa-folder-open"></i> Categories
                      </a>
                       <a href="comments.php" class="list-group-item comments">
                         <?php
                           $que="select * from comments where status='pending';";
                           $res=mysqli_query($con,$que);
                           $no=mysqli_num_rows($res);
                           
                           
                           ?>
                          <span class="badge"><?=$no?></span>
                          <i class="fa fa-comment"></i> Comments  
                      </a>
                      <a href="users.php" class="list-group-item users">
                          <i class="fa fa-users"></i> Users
                      </a>
                    </div>
                </div>