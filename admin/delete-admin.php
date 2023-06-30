<?php

// Include constants.php file here
include( '../config/constants.php');
//1.get the 10 of admin to be delete
 $id =$_GET['id'];

//2.create SQL to delete 
 $sql = "DELETE FROM tbl_admin WHERE id=$id";


 //Execvute the Query
 $res = mysqli_query($conn,$sql);

 //check whether the query executed successfully or not 
 if ($res==true)
 {
    //Query Executed Successufuly and Admin deleted
    //echo "Admin Delete";
    //create session variable to display message
    $_SESSION['delete'] = "<div class='success'> Admin Deleted successfully.</div>";
    //Redirect to manage Admin page
    header('location: '.SITEURL.'admin/manage-admin.php');
 }
 else
 {
//failed to delete Admin 
//echo "Failed to delete Admin";
$_SESSION['delete'] = "<div class ='error'>Failed to Delete Admin.Try Again Later.</div>";
header ('location:'.SITEURL.'admin/manage-admin.php'); 
 }
//3.redirect to manage Admin page with message (success/error)

?>