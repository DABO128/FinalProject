<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>
        <?php
            //check whether id is set or not
            if(isset($_GET['id']))
            {
                //Get the order details
                $id=$_GET['id']; 

                //Get all other details based on this id
                //SQl query to get the ordr details
                $sql ="SELECT * FROM tbl_order WHERE id =$id";

                //Execute query
                $res=mysqli_query($conn, $sql);
                //count rows
                $count = mysqli_num_rows($res);

            
                if($count==1)
                {
                    //details available
                    $row =mysqli_fetch_assoc($res);

                    $food= $row['food'];
                    $price= $row['price'];
                    $qty= $row['qty'];
                    $status= $row['status'];
                    $customer_name= $row['customer_name'];
                    $customer_contact= $row['customer_contact'];
                    $customer_email= $row['customer_email'];
                        
                }
                else
                {   //details not available
                    //Redirect to manage order page
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //Redirect to manage order page
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td><b><?php echo $food;?></b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><b><?php echo $price ?></b></td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty ;?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="ordered"){echo "selected";}?> value="Ordered"> Ordered</option>
                            <option <?php if($status=="Cooking"){echo "selected";}?> value="Cooking"> Cooking</option>
                            <option <?php if($status=="Served"){echo "selected";}?> value="Served"> Served</option>
                            <option  <?php if($status=="cancelled"){echo "selected";}?>value="Cancelled"> Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name:</td>
                    <td>
                        <input type="text" name="customer_name" value ="<?php echo $customer_name;?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact</td>
                    <td>
                        <input type="text" name="customer_contact" value ="<?php echo $customer_contact;?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email:</td>
                    <td>
                        <input type="text" name="customer_email" value ="<?php echo $customer_email;?>">
                    </td>
                </tr>

                <td clospan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <input type="submit" name="submit" value="Update Order" class ="btn-secondary">
                </td>
            </table>
        </form>

        <?php
            //check whether button is clicked or not
            if(isset($_POST['submit']))
            {
                //echo "aa";
                //get all the value from form
                $id =$_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];

                //Update the values 
                $sql2 = "UPDATE tbl_order SET 
                        qty =$qty,
                        total =$total,
                        status ='$status',
                        customer_contact ='$customer_contact',
                        customer_email ='$customer_email',
                        customer_name ='$customer_name'
                        WHERE id=$id
                         ";

                         //Execute the query
                         $res2 = mysqli_query($conn, $sql2);
                //Check whether update or not
                //And redirect to manage order with message
                if($res==true)
                {
                    //update 
                    $_SESSION['update']="<div class ='success'> Order updated successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else
                {   //Failed to update
                    $_SESSION['update']=" <div class ='error'> Failed to update Order.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php');?> 