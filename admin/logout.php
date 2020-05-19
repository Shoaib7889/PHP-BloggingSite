<?php
require_once('inc/top.php');
ob_start();
session_destroy();
header('location:login.php');








