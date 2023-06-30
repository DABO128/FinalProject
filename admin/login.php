<?php include('../config/constants.php');?>

<html>
    <head>
        <title>Login - Food Order System </title>
        <link rel="stylesheet" href="../css/admin.css" >
    </head>

    <body>
        <div class = "login">
            
            <h1 class="text-center">Login</h1>
            <br> 

            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            ?>
            <br><br>

            <!--Login From starts here--->
            <form action="" method="POST" class ="text-center">
                Username: <br>
                <input type="text" name= "Username" placeholder="Enter you Username"><br><br>
               
                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
            </form>
            <!--Login form ends here-->

            <p class="text-center"> Create by <a href = "www.filsenor.com"> FilsEnOr226</a> </p>

        </div>
    </body>
</html>
<?php
//check whether the submit is clicked or not
if(isset($_POST['submit']))
{
    //Process for Login
    //1. Get the Data from Login form
    $Username = $_POST['Username'];
    $password = md5($_POST['password']);

    $Username = mysqli_real_escape_string($conn,$_POST['Username']);
     $raw_password = md5($_POST['password']);
     $password =mysqli_real_escape_string ($conn,$raw_password);


    //2.SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE Username = '$Username' AND password ='$password'";

    //3.Execute the Query
    $res = mysqli_query($conn, $sql);
    //4.count rows to check whether the user exists or not 
    $count =mysqli_num_rows($res);

    if($count==1)
    {
        //User available and login Success
        $_SESSION['login']= "<div class='success'> Login successful.</div>";
        $_SESSION['user']= $Username; //to check whether the user is logged in or not and logout will unset it
        //redirect to the home page /dashboord
        header('location:'.SITEURL.'admin/');
    }
   
    else
    {
        //User not available and login Fail
        $_SESSION['login']= "<div class='error text-center'> Username or password did not match.</div>";
        //redirect to the home page /dashboord
        header('location:'.SITEURL.'admin/login.php');
    }

}
?>