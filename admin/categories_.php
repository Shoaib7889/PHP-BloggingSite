<?php require_once('inc/top.php');

//previlage checks
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
if(isset($_SESSION['email']) && $_SESSION['role']!=='admin'){
    header('location:index.php');
}



?>
  <body>
    <div id="wrapper">
       <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-folder-open"></i> Categories <small>Different Categories</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-folder-open"></i> Categories</li>
                    </ol>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <form action="inc/process.php" method="post">
                                <div class="form-group">
                                    <label for="category">Category Name:*</label>
                                    <?php 
                                        if(isset($_GET['error'])) 
                                            echo "<span  style='color:red;left:20px;'>".$_GET['error']."<span>";
                                        else if(isset($_GET['success'])) 
                                            echo "<span  style='color:green;left:20px;'>".$_GET['success']."<span>";
                                        else{
                                            echo "All * fiels are required";
                                        }
                                    ?>
                                    <input type="text" placeholder="Category Name" name="cat-name" class="form-control">
                                </div>
                                <input type="submit" value="Add Category" name="add-category" class="btn btn-primary">
                            </form><!--add cat-->
                            
                            <?php
                            if(isset($_GET['edit'])){
                                ?>
                                <form action="inc/process.php" method="post">
                                    <div class="form-group">
                                        <label for="category">Category Name:*</label>
                                        <?php 
                                            if(isset($_GET['error'])) 
                                                echo "<span  style='color:red;left:20px;'>".$_GET['error']."<span>";
                                            else if(isset($_GET['success'])) 
                                                echo "<span  style='color:green;left:20px;'>".$_GET['success']."<span>";
                                            else{
                                                echo "All * fiels are required";
                                            }
                                            $edit_id=$_GET['edit'];
                                            $que="select cat_name from categories where cat_id='$edit_id';";
                                
                                            $res=mysqli_query($con,$que);
                                            $res=mysqli_fetch_assoc($res);
                                            
//                                            echo "<pre>";
//                                            var_dump($res);die('die');
                                
                                        ?>
                                        <input type="text" placeholder="Category Name" name="cat_name" value="<?=$res['cat_name']?>" class="form-control">
                                    </div>
                                    <input type="hidden" value="<?=$edit_id ?>" name="edit-category" >
                                    <input type="submit" value="Edit category"  class="btn btn-primary">
                                </form><!--edit cat-->
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-6"><br>
                          <h2>Categoris Goes Here</h2>
                           <?php
                            if(isset($_GET['del']) && isset($_SESSION['email']))
                            {
                                $cat_id=$_GET['del'];
//                                echo $cat_id;die('die');
                                $que="delete from categories where cat_id='$cat_id';";
                                //ager unexpected error ho to semicoln dekho
                                $res=mysqli_query($con,$que);
                                if($res){
                                    echo "<h4  style='color:red;'>Deleted</h4>";
                                }else{
                                    echo "<h4  style='color:green;'>Not Deleted</h4>";
                                }
                                
                               
                            }
                            
                            ?>
                            
                            <?php
                           
                            ?>
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                    $query="select * from categories order by cat_id";
                                    $result=mysqli_query($con,$query);
                                    $resp=array();
                                   
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_assoc($result)){
                                        
                                        //fetch assoc har dafa ak record ko db se uthata he 
//                                        or row ko de deta he or row resp ko ko de deti he
                                        
                                        $resp=$row;
                                    ?>
                                     <tr>
                                        <td><?= $resp['cat_id'] ?></td>
                                        <td><?= ucwords($resp['cat_name']) ?></td>
                                        <td><a href="categories_.php?edit=<?= $resp['cat_id'] ?>"><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="categories_.php?del=<?= $resp['cat_id'] ?>"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <?php 
                                    }
                                }
                                else{
                                    ?>
                                    <tr>
                                        <?=  "nothign to show";?>
                                    </tr>
                                    <?php
                                    
                                }
                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php require_once('inc/footer.php') ?>