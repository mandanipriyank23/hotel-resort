<?php include('partials-front/menu.php'); ?>




<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php
           $search = $_POST['search'];
         ?>
        <h2>Foods on Your Search <a href="foods.php" class="text-white">"<?php echo $search; ?>"</a></h2>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php  
            $search = htmlspecialchars($_POST['search'], ENT_QUOTES, 'UTF-8');

            // Prepared statement to prevent SQL injection
            $stmt = $conn->prepare("SELECT * FROM tbl_food WHERE title LIKE ? OR description LIKE ?");
            $searchTerm = "%$search%";
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
            $stmt->execute();
            $res = $stmt->get_result();

            $count = mysqli_num_rows($res);

            if ($count > 0)
             {
                while ($row = mysqli_fetch_assoc($res)) 
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                if ($image_name == "") 
                                {
                                    echo "<div class='error'>Image not available.</div>";
                                } 
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">R.s= <?php echo $price; ?></p>
                                <p class="food-detail"><?php echo $description; ?></p>
                                <br>
                                <?php if (isset($_SESSION['username'])): ?>
                           <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                           <?php else: ?>
                           <a href="<?php echo SITEURL; ?>login.php?redirect=order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                           <?php endif; ?>
                            </div>
                        </div>
                    <?php
                }
            } 
            else 
            {
                echo "<div class='error'>Food not found.</div>";
            }
        ?>
    </div>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>
