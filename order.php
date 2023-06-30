    <?php include('partials-front/menu.php');?>

            <?php
                //check whether food is set or not 
                if(isset($_GET['food_id']))
                {
                    //Get the food id and details of the selected food
                    $food_id =$_GET['food_id'];

                    //Get the details of selected food
                    $sql ="SELECT * FROM tbl_food WHERE id=$food_id";
                    //Execute Query
                    $res =mysqli_query($conn, $sql);

                    //count the rows
                    $count =mysqli_num_rows($res);
                    //check whether the data is available or not
                    if($count==1)
                    {
                        //we have data
                        //Get the data from database
                        $row = mysqli_fetch_assoc($res);
                        
                        $title=$row['title'];
                        $price=$row['price'];
                        $image_name=$row['image_name'];

                    }
                    else
                    {
                        //food not available
                        //redirect to home page
                        header('location:'.SITEURL);
                    }

                }
                else
                {
                    //redirect to home page
                    header('location:'.SITEURL);
                }
            ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method ="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>
                    <div class ="food-menu-img">
                    <?php
                        //check whether the image is available or not
                        if($image_name=="")
                        {
                            //Image not available
                            echo "<div class ='error'>Image not available.</div>";
                        }
                        else
                        {
                            //Image is available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="check again" class="img-responsive img-curve" >
                            <?php
                        }
                    ?>
                    </div>
                    
                    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset> 
                    <legend>Customer Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. FilsEnOr226 DABO" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 054156669.." class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. oumaroud195@gmail.com" class="input-responsive" >

                    
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
                //check whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    //Get all the details from form

                    $food=$_POST['food'];
                    $price =$_POST['price'];
                    $qty =$_POST['qty'];

                    $total = $price * $qty;

                    $order_date = date("Y-m.d h:i:sa");

                    $status ="ordered"; //ordered ,cooking, delivered,cancelled

                    $customer_name =$_POST['full-name'];
                    $customer_contact =$_POST['contact'];
                   $customer_email=$_POST['email'];


                    //save the order in database
                    //Creste sql to save the data

                    $sql2 = "INSERT INTO tbl_order SET
                    food = '$food',
                    price = $price,
                    qty = $qty, 
                    total = $total,
                    order_date ='$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact ='$customer_contact',
                    customer_email ='$customer_email'

                    ";

                    //echo $sql2; die();

                    //Execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //check whether query executed successsfully or not
                    if($res2==true)
                    {
                        //Query executed and order saved
                        $_SESSION['order'] = "<div class='success text-center'> Food ordered successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //Failed to save order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to order Food.</div>";
                        header('location:'.SITEURL);

                    }
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php');?>
