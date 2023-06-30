
    <?php include('partials-front/menu.php');?>

<html>
    <head>
        <title>
            Contact form Design
        </title>
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body class="new">
        <div class="contact-title">
            <h1>Say Hello </h1> <br>
            <h2>We are always ready to serve you</h2> <br>
            <div class="contac-form">
                <form  id ="contact-form" method="POST" action="contact.php">
                <input name ="name" type="text"  value ="" class="form-control" placeholder="Your name" required> <br>
                    <input name ="email" type="email"  value ="" class="form-control" placeholder="Your Email" required> <br>
                    <input name ="subject" type="text" value ="" class="form-control" placeholder="Subject" required> <br>
                    <textarea name="message" type="text" value ="" class="form-control" placeholder="Message"  row="4" required ></textarea> <br>
                    <input type="submit" class="form-control submit" name="send">

                </form>
            </div>
        </div>
    </body>
    
</html>
<?php include('partials-front/footer.php');?>









    

