<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB','blog_complete_cms');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB);

//if($con->connect_errno()){//ager error ae           
//actually $con-> tab use hota he jab class wgera use kr rhe ho

if(mysqli_connect_errno()){//ager error ae
    echo "eror";
}
























