<?php include("partials/menu.php");?>

<div class="main-content">
<div class="wrapper">
<h1> Manage Bookings </h1>

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
            <th>Table N°</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            
            <th>N°_of_guests</th>
            <th>N°_of_table</th>
            <th>Time</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
            //Get all the order from Database
            $sql = "SELECT * FROM tbl_bookings ORDER BY id DESC";
            //Execute query
            $res = mysqli_query($conn,$sql);
            //count the rows
            $count =mysqli_num_rows($res);

            $sn =1; 
       //create a serial number and set its initialvalue as 1
            if($count>0)
            {
                //order available
                while($row=mysqli_fetch_assoc($res))
                {
                $id =$row['id'];
                $first_name =$row['first_name'];
                $last_name =$row['last_name'];
                $email =$row['email'];
               
                $number_of_guests =$row['number_of_guests'];
                $number_of_table =$row['number_of_table'];
                $time =$row['time'];
                $date =$row['date'];
                $status =$row['status'];
        
                ?>
                    <tr>
                    <td>Table<?php echo $sn++;?></td>
                    <td><?php echo $first_name;?></td>
                    <td><?php echo $last_name;?></td>
                    <td><?php echo $email;?></td>
                    
                    <td><?php echo $number_of_guests;?></td>
                    <td><?php echo $number_of_table;?></td>
                    <td><?php echo $time;?></td>
                    <td><?php echo $date;?></td>
                  
                    <td>
                        <?php 
                            //
                            if($status=="Waiting")
                            {
                                echo "<label>$status</label>";
                            }
                            elseif($status=="Available")
                            {
                                echo "<label style='color:Orange;'>$status</label>";
                            }
                            elseif($status=="Finish")
                            {
                                echo "<label style='color:Green;'>$status</label>";
                            }
                            elseif($status=="Cancelled")
                            {
                                echo "<label style='color:Red;'>$status</label>";
                            }
                            

                         ?>
                    </td>
                    <td>
                  
                    <a href="<?php echo SITEURL; ?>admin/update-booking.php?id=<?php echo $id; ?>" class = "btn-secondary"> Update Booking</a>
                    </td>
                </tr>
                <?php
                }
            }
            else
            {
                //order not available
                echo "<tr><td colspan ='12' class= 'error'> booking not available</td></tr>";
            }
        ?>
       

    </table>

</div>

</div>
<?php include("partials/footer.php");?>