<?php include("partials/menu.php");?>

<div class="main-content">
    <div class ="wrapper">
        <h1> Add Admin</h1>

<br><br>

<?php 
if(isset($_SESSION['add'])) //checking whether the session is set of not
{
    echo $_SESSION['add'];// display the seeion message if set 
    unset($_SESSION['add']); //remove session message
}
?>


        <form action ="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td> Full Name: </td>
                    <td>
                        <input type="text" name ="full_name" placeholder="Enter your name">
                    </td>
                </tr>

                <tr>
                    <td> Username: </td>
                    <td>
                        <input type="text" name ="Username" placeholder="your username">
                    </td>
                </tr>
                <tr>
                    <td> password: </td>
                    <td>
                        <input type="password" name ="password" placeholder="your password">
                    </td>
                </tr>

            

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>

            </table>
</form>
    </div>
</div> 
<?php include("partials/footer.php");?>

<?php
//process the value from and save it in Database
//Check wheter the button is clicked or not

if(isset($_POST["submit"]))
{
    //Button Clicked
    //echo "Button Not Clicked";

    //1.Get the Data from form
    $full_name = $_POST["full_name"]; 
    $Username = $_POST["Username"]; 
    $password = md5($_POST["password"]); //Password encrryption with MD5

    //2.SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
    full_name = '$full_name',
    Username= '$Username',
    password='$password'
    ";

//3.Excecuting Query and saving into Database
$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));

//4.Check whether the (Query is Excecuted ) data is inserted or not and display appropriate message
if($res==TRUE)
{
    //Data Inserted
   // echo "Data Inserted";
   //Create a session variable to display message
   $_SESSION ['add'] = "<div class='success'>Admin added Successfully. </div>";
   //Redirect Page
   header("Location:".SITEURL.'admin/manage-admin.php');
}
else
{

//Failled to Insert  Data
//echo "Faile to Insert Data";
 //Create a session variable to display message
 $_SESSION ['add'] = "Failed to add admin";
 //Redirect Page
 header("Location:".SITEURL.'admin/add-admin.php');
}
}
?>