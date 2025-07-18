<?php include('partials-front/menu.php'); ?>



<?php 
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        $category_title = $row['title'];
    }
    else
    {
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
     
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            
            <?php
                $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";

                $res2=mysqli_query($conn,$sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                   while($row2=mysqli_fetch_assoc($res2))
                   {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>
                         <div class="food-menu-box">
                           <div class="food-menu-img">
                            <?php
                              if($image_name=="")
                              {
                                 echo "<div class='error'>images not avilable.</div>";
                              }
                              else
                              {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                                <?php

                              }
                              ?>
                             
                           </div>

                         <div class="food-menu-desc"> 
                             <p class="food-title"> <?php echo $title; ?></p>
                             <p class="food-price">R.s = <?php echo $price; ?> </p>
                             <p class="food-detail"><?php echo $description; ?></p>
                            </p>
                            <br>

                            <?php if (isset($_SESSION['username'])): ?>
                           <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                           <?php else: ?>
                           <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                           <?php endif; ?>
                          </div>
                        </div>


                     <?php
                   }
            
                }
                else
                {
                    echo "<div class='error'>food not available.</div>";
                }


             ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>