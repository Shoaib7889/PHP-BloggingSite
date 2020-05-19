<?php
//require_once('db.php');
$que="select * from categories order by cat_id;";
$res=mysqli_query($con,$que);
$arr=array();

//          echo "<pre>";
//          var_dump($arr);die('die');


?>
     


     <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="30px">&nbsp;<span class="text-light">Shoaib403</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-light" href="index.php"><i class="fa fa-home"></i>Home <span class="sr-only">(current)</span></a>
          </li>
          
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categoris
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="navbarDropdown">
            <?php 
              if(mysqli_num_rows($res)>0){
                while($row=mysqli_fetch_assoc($res)){//res is an array having rows
                    $arr=$row;
                    // echo $row;
                    //echo '<a class="dropdown-item" href="#">'.$arr['cat_name'].'</a>';
                    
                    
                    //index.php k path k lie pi6e jane k zarorat nai he q k 
                    //index pr header include he and it behaves like a single page
                    //echo "<a class='dropdown-item' href='index.php?cat_id=".$cat_id."'>$cat_name</a>";
                    ?>
                    <a class="dropdown-item" href="index.php?cat_id=<?= $arr['cat_id'] ?>" ><?=$arr['cat_name'] ?></a>
                    <?php
                }
            }
              
              ?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php" tabindex="-1" aria-disabled="true">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php" tabindex="-1" aria-disabled="true">About Us</a>
          </li>
        </ul>

      </div>
    </nav>