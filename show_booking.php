<?php include('partials-front/menu.php');?>

<div class="main-content">
<div class="wrapper">
<h1> Booking detail</h1>

<br/> <br/><br/>
           <?php
              if(isset($_SESSION['delete']))
              {
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
              }
           ?>
        <br><br>

    <table class="tbl-full">
        <tr>
        <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone N°</th>
            <th>Time</th>
            <th>Date</th>
            <th>N°_of_guests</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_bookings where id = '$id'";
            //Execute query
            $res = mysqli_query($conn,$sql);
            //count the rows
        $count =mysqli_num_rows($res);

            
            if($count>0)
            {
                
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $first_name=$row['first_name'];
                    $last_name=$row['last_name'];
                    $email=$row['email'];
                    $phone_number=$row['phone_number'];
                    $time=$row['time'];
                    $date=$row['date'];
                    $number_of_guests=$row['number_of_guests'];
                    $status=$row['status'];
        
                ?>
                    <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $first_name;?></td>
                    <td><?php echo $last_name;?></td>
                    <td><?php echo $email;?></td>
                    <td><?php echo $phone_number;?></td>
                    <td><?php echo $time;?></td>
                    <td><?php echo $date;?></td>
                    <td><?php echo $number_of_guests;?></td>
                    <td><?php echo $status;?></td>
                    <td>
                        
                
                    <a href="<?php echo SITEURL; ?>admin/delete-booking.php?id=<?php echo $id; ?>" class = "btn-danger">Delete</a>
                    <a href="<?php echo SITEURL; ?>index.php?id=<?php echo $id;?>" class = "btn-secondary">Home </a>
                    </td>
                </tr>
                <?php
                }
           
            }
        }
            
        ?>
       

    </table>

</div>

</div>
<?php include('partials-front/footer.php');?>