<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Booking</h1>
        <br><br>
        <?php
            //check whether id is set or not
            if(isset($_GET['id']))
            {
                //Get the booking details
                $id=$_GET['id']; 

                //Get all other details based on this id
                //SQl query to get the ordr details
                $sql ="SELECT * FROM tbl_bookings WHERE id =$id";

                //Execute query
                $res=mysqli_query($conn, $sql);
                //count rows
                $count = mysqli_num_rows($res);

            
                if($count==1)
                {
                    //details available
                $row =mysqli_fetch_assoc($res);
                $number_of_guests =$row['number_of_guests'];
                $number_of_table =$row['number_of_table'];
                $first_name =$row['first_name'];
                $last_name =$row['last_name'];
                $email =$row['email'];
                $time =$row['time'];
                $date =$row['date'];
                $status=$row['status'];
                }
                else
                {   //details not available
                    //Redirect to manage booking page
                    header('location:'.SITEURL.'admin/manage-booking.php');
                }
            }
            else
            {
                //Redirect to manage booking page
                header('location:'.SITEURL.'admin/manage-booking.php');
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
             
                <tr>
                    <td>N°_of_guests</td>
                    <td>
                    <input type="number" name="number_of_guests" value="<?php echo $number_of_guests ;?>">
                    </td>
                </tr>

                <tr>
                    <td>N°_of_table</td>
                    <td>
                        <input type="number" name="number_of_table" value="<?php echo $number_of_table ;?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Waiting"){echo "selected";}?> value="Waiting"> Waiting</option>
                            <option <?php if($status=="Available"){echo "selected";}?> value="Available"> Available</option>
                            <option <?php if($status=="Finish"){echo "selected";}?> value="Finish"> Finish</option>
                            <option  <?php if($status=="cancelled"){echo "selected";}?>value="Cancelled"> Cancelled</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="first_name" value ="<?php echo $first_name;?>">
                    </td>
                </tr>

                 <tr>
                    <td>Last Name</td>
                    <td>
                        <input type="text" name="last_name" value ="<?php echo $last_name;?>">
                    </td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" value ="<?php echo $email;?>">
                    </td>
                </tr>

                <tr>
                    <td>Time:</td>
                    <td>
                        <input type="text" name="time" value ="<?php echo $time;?>">
                    </td>
                </tr>

                <tr>
                    <td>Date:</td>
                    <td>
                        <input type="text" name="date" value ="<?php echo $date;?>">
                    </td>
                </tr>

                <td clospan="">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="number_of_table" value="<?php echo $number_of_table; ?>">
                    <input type="submit" name="submit" value="Update booking" class ="btn-secondary">
                </td>
            </table>
        </form>

        <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\XAmpp\htdocs\food_order_table\admin\phpmailer\src\PHPMailer.php';
        require 'C:\XAmpp\htdocs\food_order_table\admin\phpmailer\src\Exception.php';
                    
                    require 'C:\XAmpp\htdocs\food_order_table\admin\phpmailer\src\SMTP.php';
            //check whether button is clicked or not
            if(isset($_POST['submit']))
            {
                //echo "aa";
                //get all the value from form
                $guestsPerTable = 4;
                $id =$_POST['id'];
                $number_of_guests = $_POST['number_of_guests'];
                $number_of_table =ceil($number_of_guests / $guestsPerTable);
                $status = $_POST['status'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $phone_number = $_POST['email'];
                $time = $_POST['time'];
                $date = $_POST['date'];
        
           
if (isset($_POST['submit'])) {
    

    // Update the values
    $sql2 = "UPDATE tbl_bookings SET 
        number_of_guests = '$number_of_guests',
        status = '$status',
        number_of_table = $number_of_table,
        first_name = '$first_name',
        last_name = '$last_name',
        phone_number = '$email',
        time = '$time',
        date = '$date'
        WHERE id = $id";

    // Execute the query
    $res2 = mysqli_query($conn, $sql2);

    // Check whether the update was successful
    if ($res==true) {
        // Check if the status is "cancel" or "finish" and the number of tables is equal
        if (($status == "Cancelled" || $status == "Finish") && $numAvailable == $numWaiting) {
            // Update the first waiting booking to available
            $sql3 = "UPDATE tbl_bookings SET status = 'Available' WHERE status = 'Waiting' LIMIT 1";
            $res3 = mysqli_query($conn, $sql3);



            if ($res3==true) {
        
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Replace with your email server host
                $mail->Port = 587; // Replace with the appropriate port number
                $mail->SMTPAuth = true;
                $mail->Username = 'oumaroud195@gmail.com'; // Replace with your email username
                $mail->Password = 'xzwyjtjvhosgzdto'; // Replace with your email password
                $mail->setFrom('oumaroud195@gmail.com'); // Replace with the "From" email and name
                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true); // Replace with the recipient email and name
                $mail->Subject = 'Booking status update';
                $mail->Body = 'This message was sent to you automatically, just to inform you that your table reservation is now available.Thanks';
                
                if ($mail->send()) {
                    echo "Mail sent";
                } else {
                    echo "Mail failed: " . $mail->ErrorInfo;
                }
                
            }
        }

        // Redirect to manage booking with success message
        $_SESSION['update'] = "<div class='success'>Booking updated successfully.</div>";
        header('location:'.SITEURL.'admin/manage-booking.php');
    } else {
        // Failed to update
        $_SESSION['update'] = "<div class='error'>Failed to update booking.</div>";
        header('location:'.SITEURL.'admin/manage-booking.php');
    }
}
            }

        ?>

    </div>
</div>

<?php include('partials/footer.php');?> 