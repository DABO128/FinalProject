<?php include("partials/menu.php");?>

<div class="main-content">
<div class="wrapper">
<h1> Manage Order </h1>

<br/> <br/><br/>
            <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                }
            ?>
            <br><br>

    <table class="tbl-full">
        <tr>
            <th>S.N</th>
            <th> Food</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Actions</th>

        </tr>

        <?php
            //Get all the order from Database
            $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
            //Execute query
            $res = mysqli_query($conn,$sql);
            //count the rows
            $count =mysqli_num_rows($res);

            $sn =1; //create a serial number and set its initialvalue as 1
            if($count>0)
            {
                //order available
                while($row=mysqli_fetch_assoc($res))
                {
                $id =$row['id'];
                $food =$row['food'];
                $price =$row['price'];
                $qty =$row['qty'];
                $total =$row['total'];
                $order_date =$row['order_date'];
                $status =$row['status'];
                $customer_name =$row['customer_name'];
                $customer_contact =$row['customer_contact'];
                $custmer_email =$row['customer_email'];

                ?>
                    <tr>
                    <td><?php echo $sn++;?></td>
                    <td><?php echo $food;?></td>
                    <td><?php echo $price;?></td>
                    <td><?php echo $qty;?></td>
                    <td><?php echo $total;?></td>
                    <td><?php echo $order_date;?></td>

                    <td>
                        <?php 
                            //
                            if($status=="Ordered")
                            {
                                echo "<label>$status</label>";
                            }
                            elseif($status=="Cooking")
                            {
                                echo "<label style='color:Orange;'>$status</label>";
                            }
                            elseif($status=="Served")
                            {
                                echo "<label style='color:Green;'>$status</label>";
                            }
                            elseif($status=="Cancelled")
                            {
                                echo "<label style='color:Red;'>$status</label>";
                            }
                            

                         ?>
                    </td>


                    <td><?php echo $customer_name;?></td>
                    <td><?php echo $customer_contact;?></td>
                    <td><?php echo $custmer_email;?></td>
                    <td>
                    <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class = "btn-secondary"> Update Order</a>
                    </td>
                </tr>
                <?php
                }
            }
            else
            {
                //order not available
                echo "<tr><td colspan ='12' class= 'error'> Order not available</td></tr>";
            }
        ?>
       

    </table>

</div>

</div>
<?php include("partials/footer.php");?>