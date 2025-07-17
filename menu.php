<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<div class="container" style="text-align: center;">
    <h2><a href="<?php echo SITEURL; ?>index.php">R-veera</a></h2>
    <h3><a href="<?php echo SITEURL; ?>gallery.php">Banquet & Garden-Restaurant</a></h3>
    
</div>
<hr>
<hr>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo2">
                    <img src="images/logo4.jpeg" alt="Restaurant Logo4" class="img-responsive">
                </a>
            </div>

            <div class="menu text-left">
                
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>Category.php">category</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>Foods.php">foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>gallery.php">Gallery</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>logout.php">logout</a>
                    </li>
                    
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->


    