<?php
//Include constants.php for SITEURL
include('../config/constants.php');
//1. Destory the session 
session_destroy();

//2.Redirect to login page
header('location:'.SITEURL.'admin/login.php');
?>