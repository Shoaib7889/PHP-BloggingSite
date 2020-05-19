<?php require_once('inc/top.php') ?>
  <body>
<?php require_once('inc/header.php');
//session started in top.php

if(isset($_POST['submit'])){
    if(count($_FILES['image']['name'])>0){
//        echo "<pre>";
//        var_dump($_FILES['image']);
//        var_dump($_FILES['image']['name']);die;
        for($i=0;$i<count($_FILES['image']['name']);$i++){
            
            $image=$_FILES['image']['name'][$i];
            $temp_name=$_FILES['image']['tmp_name'][$i];
            $que="insert into media  (`name`) value('$image');";
            $res=mysqli_query($con,$que);
            if($res){
                move_uploaded_file($temp_name,"media/$image");
            }else{
                echo "not moved";
            }
            
            
        }
    }
}
    
      ?>
        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-database"></i> Media <small>Add Media</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class=""><i class="fa fa-database"></i> Media</li>
                    </ol>
                    
                   <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="image[]" class="" required multiple>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" name="submit" class="form-control btn btn-primary" value="upload">
                            </div>
                        </div><br>
                   </form>
                   
                   <?php
//    if(isset($_POST['submit'])){
//        if(count($_FILES['image']['name'])>0){
//    //        echo "<pre>";
//    //        var_dump($_FILES['image']);
//    //        var_dump($_FILES['image']['name']);die;
//            for($i=0;$i<count($_FILES['image']['name']);$i++){
//
//                $image=$_FILES['image']['name'][$i];
//                $temp_name=$_FILES['image']['tmp_name'][$i];
//                $que="insert into media  (`name`) value('$image');";
//                $res=mysqli_query($con,$que);
//                if($res){
//                    move_uploaded_file($temp_name,"media/$image");
//                    ?>
<!--//                    <img src="media/" width="300px" height="300px">-->
                    <?php
//                }else{
//                    echo "not moved";
//                }
//
//
//            }
//        }
//}
    
    ?>
                   
                   
                <?php
    $que="select name from media ;";
                $res=mysqli_query($con,$que);
                while($row=mysqli_fetch_assoc($res)){
                    

                
                    ?>
                   
                    <img src="media/<?php echo $row['name'] ?>" width="200px" height="200px" style="border:1px solid red;margin-bottom:4px;border-radius:8px">
                           
                  
                    
                    <?php
                        }
                        ?>
                    
                    
                </div>
            </div>
        </div>

<?php require_once('inc/footer.php'); ?>