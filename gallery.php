<?php include('partials-front/menu.php'); ?>



<!-- Gallery Section Starts Here -->
<section class="gallery">
    <div class="container">
        <h2 class="text-center">Our Restaurant Gallery</h2>

        <div class="gallery-grid">
            <?php
            // Fetch images from database
            $sql = "SELECT * FROM tbl_gallery WHERE active='Yes'";
            $res = mysqli_query($conn, $sql);

            if(mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    $image_name = $row['image_name'];
                    $image_path = "images/gallery/" . $image_name;

                    // Display the image
                    echo '
                    <div class="gallery-item">
                        <img src="' . SITEURL . $image_path . '" class="img-responsive img-curve">
                    </div>';
                }
            } else {
                echo "<div class='error'>No gallery images found.</div>";
            }
            ?>
        </div>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Gallery Section Ends Here -->

<?php include('partials-front/footer.php'); ?>
