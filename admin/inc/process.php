<?php
require_once('db.php');
session_start();

////////////////cats///////////////
    
if(isset($_POST['cat-name'])){//5hiw iw always set

    $cat_name=$_POST['cat-name'];

    
    if(empty($cat_name)){
        header('location:../categories_.php?error=category_name_require');
    }else if($_SESSION['role']=='admin'){
       
        $set="`cat_name`='$cat_name'";//set query
        $query="insert into categories set $set;";
        $result=mysqli_query($con,$query);
        if($result){
            header('location:../categories_.php?success=category_has_been_added');
        }else{
            header('location:../categories_.php?error=category_already_exist');
        }
       
    }//insert cat
}else if(isset($_POST['edit-category'])){
    
    $cat_id=$_POST['edit-category'];
    $cat_name=$_POST['cat_name'];
    $query="UPDATE `categories` SET `cat_name`='$cat_name' WHERE cat_id='$cat_id';";
//    echo $query;die('die');
     $result=mysqli_query($con,$query);
    if($result){
        header('location:../categories_.php?success=category_has_been_added');
    }else{
        header('location:../categories_.php?error=category_already_exist');
    }//edit cat
}


//$file=fopen('file.txt',"r+");
//fwrite($file,'i am shoaib');
//fclose($file);


