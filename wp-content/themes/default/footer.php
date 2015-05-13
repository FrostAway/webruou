


<footer id="footer">
    <div class="footer-title">
        <!--                <div class="box-title">
                            <h2>RƯỢU DÂN TỘC</h2>
                            <span class="desc">TINH HOA TỪ NGHÀN XƯA</span>
                        </div>-->
        <a href="<?php echo home_url(); ?>"><img src="<?= get_template_directory_uri() ?>/images/footer-ttitle.png" class="img-responsive" /></a>
    </div>

    <div class="footer-col">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 ft-col ft-logo">
                    <h3 class="col-title">Rượu Dân Tộc</h3>
                    <div class="separator">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                    </div>
                    <div class="logo-text">
                        <a href="<?php echo home_url(); ?>">
                            <h2>RƯỢU DÂN TỘC</h2>
                            <i class="desc">Tinh túy từ thiên nhiên</i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2 ft-col">
                    <h3 class="col-title">Website</h3>
                    <div class="separator">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                    </div>
                    <?php wp_nav_menu(array(
                        'menu' => 'footer-1',
                        'theme_location' => 'footer-1',
                        'depth' => 1,
                        'container' => ''));
                    ?>
                </div>
                <div class="col-sm-6 col-md-3 ft-col">
                    <h3 class="col-title">Tin tức</h3>
                    <div class="separator">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                    </div>
                    <?php wp_nav_menu(array(
                        'menu' => 'footer-2',
                        'theme_location' => 'footer-2',
                        'depth' => 1,
                        'container' => ''));
                    ?>
                </div>
                <div class="col-sm-6 col-md-3 ft-col">
                    <h3 class="col-title">Liên hệ</h3>
                    <div class="separator">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                    </div>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="fa fa-home"> </span> Phạm Tuấn Tài - Cầu Giấy - Hà Nội</a></li>
                        <li><a href="#"><span class="fa fa-phone"> </span> +84 0912345678</a></li>
                        <li><a href="#"><span class="fa fa-mail-forward"> </span> contact@ruoudantoc.com</a></li>
                        <li><a href="#"><span class="fa fa-wechat"> </span> http://ruoidantoc.com</a></li>
                        <li><a href="#"><span class="fa fa-facebook"> </span> Facebook.com/ruoudantoc</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <span class="c-left pull-left">Copyright &copy; <span style="color: #fff">ruoudantoc.com</span>. All Right Reserved</span>
            <span class="c-right pull-right">Design by <a href="iziweb.vn" style="color: #fff">Iziweb.vn</a></span>
            <div class="clearfix"></div>
        </div>
    </div>

</footer>

<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/my_bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/jquery.bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/fl_script.js"></script>

<?php wp_footer(); ?>

</body>
</html>
