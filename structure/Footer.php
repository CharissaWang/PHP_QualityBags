<?php
/**
 * Created by PhpStorm.
 * User: Chong Wang
 * Date: 12/06/17
 * Time: 22:33
 * Purpose: The consistent footer for every page
 */

define('HTTP_DIR', 'http://dochyper.unitec.ac.nz/wangc95/php_assignment/');
?>

<!-- footer start -->
<footer class="footer">
    <div class="container">
        <div class="footer-left">
            <img src="<?php echo HTTP_DIR.'images/orange_BG.png';?>" width="180" alt="Quality Bags" />
            <p class="footer-links">
                <a href="http://dochyper.unitec.ac.nz/wangc95/php_assignment/index.php">Home</a>
                ·
                <a href="http://dochyper.unitec.ac.nz/wangc95/php_assignment/product/Product.php">Product</a>
                ·
                <a href="http://dochyper.unitec.ac.nz/wangc95/php_assignment/about/About.php">About</a>
                ·
                <a href="http://dochyper.unitec.ac.nz/wangc95/php_assignment/contact/Contact.php">Contact</a>
            </p>
            <p class="footer-copyright">&copy; 2017 - Quality Bags</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Building 183, 139 Carrington Road </span>Mt Albert, Auckland, New Zealand</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>090000000</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@qualitybags.co.nz">support@qualitybags.co.nz</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-designer">
                <span>Designer</span>
                Chong Wang <br /> SID: 1470225
            </p>
            <br>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-tumblr"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>

</footer>  <!-- footer end-->
