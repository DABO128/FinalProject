


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation form</title>

    <!-- Link our CSS file -->
        <link rel="stylesheet" href="../css/admin.css" >
 
    </head>
    
    <body class="reserve"> 
        <div class="container">
            <form class="form-group">
                <div id="form">
                    <h1 text-white text-center>Make your Reservation</h1><br>
                    <h2 text-white text-center>We are always ready to serve you</h2>
                    <div id="first-group">

                    <div id="content">
                        <input type="text" id="input-group" placeholder="First name">
                    </div>

                    <div id="content">
                        <input type="text" id="input-group" placeholder="Last name">
                    </div>

                    <div id="content">
                        <input type="email" id="input-group" placeholder="Email">
                    </div>

                    <div id="content">
                        <input type="phone" id="input-group" placeholder="Phone number">
                    </div>

                    <div id="content">
                        <input type="date" id="input-group" placeholder="Date">
                    </div>
                    
                    <div id="content">
                        <input type="time" id="input-group" placeholder="Time">
                    </div>

                    <div id="content">
                    <select id="input-group" style="background-color: black;">
                        <option value="">No.of guests</option>
                        <option value="">1-2</option>
                        <option value="">1-4</option>
                        <option value="">1-6</option>
                        <option value="">1-8</option>
                        <option value="">1-10</option>
                    </select>

                        
                    
                    <div id="content">
                    <textarea name="message" class="form-control"  placeholder="Message"  row="7" required ></textarea>
                    </div>
                    
                    </div>
                    <button type="submit" value="submit" id="submit-btn">Book Now </button>
                </div>
            </form>
            
        </div>
</body>



















































        <!---<div class="container">
                <body class="reserve"> 

        <form  id ="contact-form" method="POST" action="contact.php">
        <div class="reserve-form">
            <h1 class=" text-center">Make your Reservation </h1> <br>
            <h2 class="text-center">We are always ready to serve you</h2> <br>
                    Full Name <br>
                    <input name ="name" type="text" class="form-control1" placeholder="Your Name " required> <br>
                    Contact <br>
                    <input name ="contact" type="contact" class="form-control2" placeholder="Your Contact " required> <br>
                    Email <br>
                    <input name ="email" type="email" class="form-control1" placeholder="Your Email " required> <br>
                    Adress <br>
                    <textarea name="adress" class="form-control2" placeholder="Adress"  row="4" required ></textarea> <br>
                    <label for="table-select">Choose a table</label>

<select name="table" id="table-select">
    <option value="">--Please choose an option--</option>
    <option value="table1">table1</option>
    <option value="table2">table2</option>
    <option value="table3">table3</option>
    <option value="table4">table4</option>
    <option value="table5">table5</option>
    <option value="table6">table6</option>
</select>

<label for="start">Schedule</label>

<input type="date" id="start" name="trip-start"
       value="2023-07-20"
       min="2023-01-01" max="2023-12-31">

<br>

                    <input type="submit" class="form-control submit" value="SUBMIT Reservation">
                </div>
                </form>
        </div>
    </body>
    
</html>
