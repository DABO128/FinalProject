<?php
//Include constants File
include('../config/constants.php');
//echo "Delete Page";
    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and delete
       // echo "Get value and Delete";
       $id = $_GET['id'];
       $image_name =$_GET['image_name'];

       //Remove the physical image file is available
       if($image_name != "")
       {
        //image is available .so remove it
        $path ="../images/category/".$image_name;

        //Redmove the image
        $remove = unlink($path);

        //if failed to remove image add an error message and stop the process
        if($remove==false)
        {
            //Set the section message
            $_SESSION['remove'] ="<div class ='error'>failed to remove Category Image.</div>";
            //redirect  to manage category page 
            header('location:'.SITEURL.'admin/manage-category.php');
            //stop the process
            die();
        } 
       }

       //Image data from Database
       //SQl Query to delete Data from database
       $sql= "DELETE FROM tbl_category WHERE id =$id";

       //excecute the Query
       $res = mysqli_query($conn, $sql);

    
       //check whether the data is delete from database or not
       if($res==true)
       {
        //set success message to rediredt
        $_SESSION['delete'] ="<div class = 'success'> Category Delete successfully.</div>";
        //Redirect to manage category
        header ('location:'.SITEURL.'admin/manage-category.php');
       }
       else
       {
        //Set fail message and Redirect
        $_SESSION['delete'] ="<div class ='error'> Failed to Delete Category.</div>";
        //Redirect to manage category
        header('location:'.SITEURL.'admin/manage-category.php');
       }
    }
    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    
    }

    
?>