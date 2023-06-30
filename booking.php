<?php include('partials-front/menu.php');?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation form</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Link librairies for icon -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="reserve">
    <div class="container">
        <form class="form-group" action="" method="POST">
            <div id="form">
                <h1 text-white text-center>Make your Reservation</h1><br>
                <h2 text-white text-center>We are always ready to serve you</h2>
                <div id="first-group">

                    <div id="content">
                        <i class="fa fa-user"></i>
                        <input type="text" name="first_name" id="input-group" placeholder="First name" required>
                    </div>

                    <div id="content">
                        <i class="fa fa-user"></i>
                        <input type="text" name="last_name" id="input-group" placeholder="Last name" required>
                    </div>

                    <div id="content">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="email" id="input-group" placeholder="Email" required>
                    </div>

                    <div id="content">
                        <i class="fa fa-phone"></i>
                        <input type="tel" name="phone_number" id="input-group" placeholder="Phone number" required>
                    </div>

                </div>
                <div id="second-group">
                    <div id="content">
                        <i class="fa fa-calendar"></i>
                        <input type="date" name="dateofbooking" id="input-group" placeholder="Date" required>
                    </div>

                    <div id="content">
                        <i class="fa fa-clock"></i>
                        <input type="time" name="time" id="input-group" placeholder="Time" required>
                    </div>

                    <div id="content">
                        <i class="fa fa-users"></i>
                        <input type="number" name="number_of_guests" id="input-group" placeholder="Number of guests" required>
                    </div>

                    <div id="content">
                        <i class="fa fa-commenting"></i>
                        <textarea type="text" name="comment" class="input" placeholder="Write a comment" v-model="newItem" @keyup.enter="addItem()" rows=></textarea>
                    </div>

                </div>
                <button type="submit" name="submit" id="submit-btn">Book Now </button>
            </div>

        </form>

        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        require 'C:\XAmpp\htdocs\food_order_table\admin\phpmailer\src\PHPMailer.php';
        require 'C:\XAmpp\htdocs\food_order_table\admin\phpmailer\src\Exception.php';
                    
                    require 'C:\XAmpp\htdocs\food_order_table\admin\phpmailer\src\SMTP.php';
        if (isset($_POST['submit'])) {
            $guestsPerTable = 4;
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $time = $_POST['time'];
            //$date = date("Y-m-d H:i:s");
            $date= date('Y-m-d',strtotime($_POST['dateofbooking']));
            $number_of_guests = $_POST['number_of_guests'];
            $number_of_table = ceil($number_of_guests / $guestsPerTable);
            $comment = $_POST['comment'];
            $status = "Waiting"; // Waiting, Finished, Cancelled

            // Check if the requested time and date are available
            $select_query = "Select * from `tbl_bookings` where time='$time' AND date='$date'";
            $result = mysqli_query($conn, $select_query);
            $row = mysqli_num_rows($result);


            if ($row > 0) {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; //  email server host
                $mail->Port = 587; // the appropriate port number
                $mail->SMTPAuth = true;
                $mail->Username = 'oumaroud195@gmail.com'; //  the email username
                $mail->Password = 'xzwyjtjvhosgzdto'; // the email password
                $mail->setFrom('oumaroud195@gmail.com'); //the "From" email and name
                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true); //  the recipient email and name
                $mail->Subject = 'Booking status update';
                $mail->Body = 'Booking saved successfully,You are in the waiting list.';
               
           
                if ($mail->send()) {
                    echo "<script>alert('Mail sent')</script>";
                } else {
                    echo "Mail failed: " . $mail->ErrorInfo;
                }
                
                $insert_query = "INSERT INTO `tbl_bookings` (first_name, last_name, email, phone_number, time, date, number_of_guests, comment, number_of_table, status) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$time', '$date', '$number_of_guests', '$comment', '$number_of_table', '$status')";
                $sql_execute = mysqli_query($conn, $insert_query);
                // The requested time or date is not available
                echo "<script>alert('This time And date is not available. You are in the waiting list.')</script>";
            } else {
                // Check if the total number of tables for the requested date is less than 10
                $select_query = "SELECT SUM(number_of_table) AS Total FROM `tbl_bookings` WHERE status='Available' AND date='$date'";
                $result = mysqli_query($conn, $select_query);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['Total'];

                if ($sum + $number_of_table >= 10) {
                    $insert_query = "INSERT INTO `tbl_bookings` (first_name, last_name, email, phone_number, time, date, number_of_guests, comment, number_of_table, status) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$time', '$date', '$number_of_guests', '$comment', '$number_of_table', '$status')";
                    $sql_execute = mysqli_query($conn, $insert_query);

                    // The maximum number of tables for the requested date is reached
                    echo "<script>alert('The maximum number of tables for this date is reached. You are in the waiting list.')</script>";
                } else {

                    // The time, date, and number of tables are available, so insert the booking
                    $status = "Available";
                    $insert_query = "INSERT INTO `tbl_bookings` (first_name, last_name, email, phone_number, time, date, number_of_guests, comment, number_of_table, status) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$time', '$date', '$number_of_guests', '$comment', '$number_of_table', '$status')";
                    $sql_execute = mysqli_query($conn, $insert_query);
                    echo "<script>alert('Booking saved successfully.')</script>";
                  
                }
                
            }
        }
        ?>

    </div>
</body>

</html>
<?php include('partials-front/footer.php'); ?>