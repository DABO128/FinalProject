<?php include('partials-front/menu.php');?>

<style>
    /*category title*/
.text{
    font-size: 1px;
}
/*
#container {
    display: flex;
  justify-content: center;

}

 */



</style>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            //Display all the categorie that are active
            //sql Query 
            $sql ="SELECT * FROM tbl_category WHERE active='Yes'";

            //Execute the Query
            $res = mysqli_query($conn,$sql);

            //count rows
            $count=mysqli_num_rows($res);

            //check whether categories available or not
            if($count>0)
            {
                //categories available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the values
                     $id =$row['id'];
                    $title=$row['title'];
                    $image_name =$row['image_name'];

                    ?>
                     
                     <a href="category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                    <?php
                        if($image_name=="")
                        {
                            //Image not available
                            echo "<div class ='error'>Image not found.</div>";

                        }
                        else
                        {
                            //Image available
                            ?>

                            <img src="images/category/<?php echo $image_name; ?>" alt="check again" class="img-responsive img-curve">

                            <?php
                        }
                ?>
             
                <h3 class="float-text text-white"><p class="text"><?php echo $title;?></p></h3>
             </div>
            </a>

            <?php

                }
            }
            else
            {
                //categories not available
                echo "<div class ='error'>Category not found.</div>";
            }
            
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php');?>
