<?php

// Include constants.php file here
include( '../config/constants.php');
//1.get the 10 of Booking to be delete
 $id =$_GET['id'];

//2.create SQL to delete 
 $sql = "DELETE FROM tbl_bookings WHERE id=$id";


 //Execvute the Query
 $res = mysqli_query($conn,$sql);

 //check whether the query executed successfully or not 
 if ($res==true)
 {
    //Query Executed Successufuly and Booking deleted
    //echo "Booking Delete";
    //create session variable to display message
    $_SESSION['delete'] = "<div class='success'> booking Deleted successfully.</div>";
   
  
    //Redirect to manage Booking page
    header('location: '.SITEURL.'show_booking.php');
 }
 else
 {
//failed to delete Booking 
//echo "Failed to delete Booking";
$_SESSION['delete'] = "<div class ='error'>Failed to Delete booking.Try Again Later.</div>";
header ('location:'.SITEURL.'booking.php'); 
 }
//3.redirect to manage Booking page with message (success/error)

?>