<?php
//include constants page
include ('../config/constants.php');

//echo "Delete food Page";
if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //Process to delete 
    //echo "Process to delete";

    //1.get ıD image name
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    //2.Remove the image if available
    if($image_name!="")
    {
        //it has image and need to remove from folder
        //get the image path
        $path ="../images/food/".$image_name;
        
        //remove image file from folder
        $remove=unlink($path);

        //check whether the image is removed or not
        if($remove==false)
        {
            //Failed to remove image
            $_SESSION['upload'] = "<div class='error'> Failed to Remove Image Files.</div>";
            //Redirect to manage food
            header('location:'.SITEURL.'admin/manage-food.php');
            //stop the processof deleting food
            die();
        }
    }

        //3.Delete food from database
        $sql ="DELETE FROM tbl_food where id=$id";
        //Execute the query
        $res =mysqli_query($conn,$sql);

        //check whether the query executed or not and set the session message respectively
        if($res==true)
        {
            //food delete
            $_SESSION['delete']= "<div class ='success'> Food Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');

        }
        else
        {
            //failed to delete food 
            $_SESSION['delete']= "<div class ='error'> Failed to delete food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    //4.Redirect to manage food with session message

}
else
{
    //Redirect to manage food page
    //echo "redirect";
    $_SESSION['unauthorize'] = "<div class='error' Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>