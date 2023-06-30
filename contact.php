
<?php
//
// use PHPMailer\PHPMailer\PHPMailer;
//se PHPMailer\PHPMailer\Exception;
//require 'C:\XAmpp\htdocs\food_order_table\admin\phpmailer\src\PHPMailer.php';
//require 'C:\XAmpp\htdocs\food_order_table\admin\phpmailer\src\Exception.php';
                    
//require 'C:\XAmpp\htdocs\food_order_table\admin\phpmailer\src\SMTP.php';
//f(isset ($_POST["send"])){
// $mail=new PHPMailer(true);
//
// $mail->isSMTP();
// $mail->Host = 'smtp.gmail.com';
// $mail->SMTPAuth = true;
// $mail->Username = 'oumaroud195@gmail.com';
// $mail->Password ='xzwyjtjvhosgzdto';
// $mail->SMTPSecure ='ssl';
// $mail->Port=465;
//
// $mail->setFrom('oumaroud195@gmail.com');
//
// $mail->addAddress($_POST['email']);
//
// $mail->isHTML(true);
//
// $mail->Subject =$_POST["subject"];
// $mail->Body =$_POST["message"];
//
// $mail->send();
//
// echo 
// "<script>
//lert ('Mail Sent Successfully');
//ocument.location.href ='contact-u.php';
// </script>
// 
// "; 
//
//
//
//
?>



    






<?php


$name =$_POST['name'];
$visitor_email =$_POST['email'];
$message =$_POST['message'];

$email_from = 'oumaroud195@gmail.com';
$email_subject ="New Form Submission";
$email_body = "User Name: $name.\n".
                "User Email:$visitor_email.\n".
                    "User Message: $message.\n";


$to ="daboomar268@gmail.com";
$headers = "From: $email_from\r\n";
$headers = "Reply-To: $visitor_email\r\n";
mail($to,$email_subject,$email_body,$headers);

if(@mail($emailRecipient, $subject, $message, $headers))
{
  echo "Mail Sent Successfully";
}else{
  echo "Mail Not Sent";
}

header("Location:contact-u.php");

 
?>
