
        <?php $template_url = get_bloginfo('template_url'); ?>
<footer>
    <?php
        $term  = get_queried_object();
        
        if($term->post_name != 'contact-us'){
    ?>
    <div class="footer-top">
        <div class="container">
            <img src="<?php echo $template_url; ?>/images/footer-thumb.png" alt="footer-thumb.png" />
            <p><?php echo get_option('ftr_contact_text'); ?></p>
            <?php
            $ftr_contact_link = get_option('ftr_contact_link');
            $ftr_contact_label = get_option('ftr_contact_label');
            ?>
            <a href="<?php echo $ftr_contact_link; ?>"><?php echo $ftr_contact_label; ?></a>
        </div>
    </div>
    <?php
        }
    ?>
    <div class="footer-middle">
        <div class="container">
            <div clas="row">
                <div class="hidden-lg hidden-md col-sm-4 col-xs-12">
                    <div class="responsive-footer-menu">

                        <?php
                        if (is_active_sidebar('footer1')) {
                            dynamic_sidebar('footer1');
                        }
                        ?>

                    </div>             
                </div>
                <div class="hidden-lg hidden-md col-sm-4 col-xs-12">
                    <div class="responsive-footer-menu">

                        <?php
                        if (is_active_sidebar('footer2')) {
                            dynamic_sidebar('footer2');
                        }
                        ?>

                    </div>             
                </div>
                <div class="hidden-lg hidden-md col-sm-4 col-xs-12">
                    <div class="responsive-footer-menu">
                        <?php
                        if (is_active_sidebar('footer3')) {
                            dynamic_sidebar('footer3');
                        }
                        ?>

                    </div>             
                </div>
            </div>
        </div>
            
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                    <div class="footer-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $template_url; ?>/images/footer-logo.png" alt="footer-logo.png" /></a>
                    </div>
                    <div class="social-icon">
                        <?php $facebook_val = get_option('facebook_val'); ?>
                        <?php $twitter_val = get_option('twitter_val'); ?>
                        <?php $youtube_val = get_option('youtube_val'); ?>
                        <?php $vimeo_val = get_option('vimeo_val'); ?>
                        <?php $gplus_val = get_option('gplus_val'); ?>
                        <?php if ($facebook_val) { ?>
                            <a href="<?php echo $facebook_val; ?>" target="_blank"><i class="icon-facebook"></i></a>
                        <?php } ?>
                        <?php if ($twitter_val) { ?>
                            <a href="<?php echo $twitter_val; ?>" target="_blank"><i class="icon-twitter"></i></a>
                        <?php } ?>
                        <?php if ($youtube_val) { ?>
                            <a href="<?php echo $youtube_val; ?>" target="_blank"><i class="icon-youtube-play"></i></a>
                        <?php } ?>
                        <?php if ($vimeo_val) { ?>
                            <a href="<?php echo $vimeo_val; ?>" target="_blank"><i class="icon-vimeo"></i></a>
                        <?php } ?>
                        <?php if ($gplus_val) { ?>
                            <a href="<?php echo $gplus_val; ?>" target="_blank"><i class="icon-google-plus"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                    <div class="footer-menu">

                        <?php
                        if (is_active_sidebar('footer1')) {
                            dynamic_sidebar('footer1');
                        }
                        ?>

                    </div>                  
                </div>
                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                    <div class="footer-menu">
                        <?php
                        if (is_active_sidebar('footer2')) {
                            dynamic_sidebar('footer2');
                        }
                        ?>
                    </div>                  
                </div>
                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                    <div class="footer-menu">
                        <?php
                        if (is_active_sidebar('footer3')) {
                            dynamic_sidebar('footer3');
                        }
                        ?>
                    </div>                                
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                    <div class="contact-details">
                        <?php
                        if (is_active_sidebar('footer4')) {
                            dynamic_sidebar('footer4');
                        }
                        ?>

                    </div>
                    <div class="clearfix"></div>                    
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copy-right">
                        <?php echo get_option('footer_copyright'); ?>
                    </div>
                    <?php
                    wp_nav_menu(array('theme_location' => 'footer_menu',
                        'container' => false));
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $template_url; ?>/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo $template_url; ?>/js/jquery.mmenu.all.min.js"></script>
<script type="text/javascript" src="<?php echo $template_url; ?>/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo $template_url; ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo $template_url; ?>/js/mixitup.min.js"></script>
<script type="text/javascript" src="<?php echo $template_url; ?>/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo $template_url; ?>/js/typed.js"></script>

        <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>

        <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,600,700|Ubuntu:400,500,700" rel="stylesheet">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/jquery.mmenu.all.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/main.css" />
        
        
        <link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/css/styles.css" />        

        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<script type="text/javascript">

<?php if (!is_front_page()) { ?>
        $(document).ready(function () {
            var top = $('.upper-header').offset().top;
            $(window).scroll(function (event) {
                var y = $(this).scrollTop();
                if (y >= 100)
                    $('.upper-header').addClass('fixed');
                else
                    $('.upper-header').removeClass('fixed');
                $('.upper-header').width($('.upper-header').parent().width());
            });
        });

<?php } ?>



    $(window).load(function () {
        $('.grid').isotope({
            itemSelector: '.grid-item',
            layoutMode: 'masonry'})
    });

    $(document).ready(function () {


        $('.responsive-footer-menu h4').append('<i class="icon-chevron-down"></i>');
        $('.responsive-footer-menu h4').click(function () {
            if ($(this).hasClass('active'))
            {
                $('.responsive-footer-menu h4').removeClass('active');
                $('.responsive-footer-menu ul').slideUp();
                $(this).children('i').removeClass('icon-chevron-up').addClass('icon-chevron-down');
            } else
            {
                $('.responsive-footer-menu ul').slideUp();
                $('.responsive-footer-menu h4').children('i').removeClass('icon-chevron-up').addClass('icon-chevron-down');
                $(this).next().next('div').children().slideDown();
                $(this).addClass('active');
                $(this).children('i').removeClass('icon-chevron-down').addClass('icon-chevron-up');
            }
        });
        $("#menu").mmenu({
            extensions: ["border-none", "theme-black", "fullscreen", "effect-menu-fade", "effect-listitems-slide"],
            "navbars": [
                {
                }, {
                    "content": ['close']
                }
            ]
        });
        $('.service-box a').on('click', function () {
            $('.service-box a').removeClass('active-link');
            $(this).addClass('active-link');
            var target = $(this).attr('rel');
            $("#" + target).show().siblings("div").hide();
        });
        
<?php if (is_front_page()) { ?>
        new WOW().init();
        var containerEl = document.querySelector('.portfolio-list');
        var mixer = mixitup(containerEl);
<?php } ?>
    
        $('#quote-carousel').carousel({
            pause: true,
            interval: 4000
        });
        $(".element").typed({
            strings: ["Web Design Company", "Web Development Company", "Game Development Company", "App Development Company"],
            typeSpeed: 100,
            loop: true
        });

        $('.project_popup_slider .owl-carousel').owlCarousel({
            items: 1,
            margin: 10,
            nav: true
        });

        $(".portfolio .controls .control:nth-child(1)").click();
    });
</script>
<?php wp_footer(); ?>
</body>
</html>
