<!DOCTYPE html>

<html>

    <head> 

        <!-- @ Meta Tags Starts -->

        <meta charset="UTF-8" />

        <meta http-equiv="Content-Type" content="text/html" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />

        <meta name="apple-mobile-web-app-capable" content="yes" />

        <meta name="handheldfriendly" content="true" />

        <meta name="MobileOptimized" content="width" />

        <meta name="format-detection" content="telephone=no" />

        <meta http-equiv="Cache-control" content="no-cache" />

        <meta http-equiv="X-FRAME-OPTIONS" content="DENY" />

        <title>

            <?php

            global $page, $paged;



            wp_title('-', true, 'right');



            bloginfo('name');



            $site_description = get_bloginfo('description', 'display');

            if ($site_description && ( is_home() || is_front_page() ))

                echo " | $site_description";



            if ($paged >= 2 || $page >= 2)

                echo ' | ' . sprintf(__('Page %s', 'ace_theme'), max($paged, $page));

            ?>

        </title>

        <link rel="icon" type="image/png" href="<?php echo get_option('my_favicon_icon'); ?>"/>

        <link rel="profile" href="http://gmpg.org/xfn/11" />

        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 

        <?php

        // wp_enqueue_script('jquery');

        wp_head();

        ?>

    </head>

    <body <?php body_class(); ?>>

        <div id="page">

            <?php if ( !is_front_page() ) { ?>            

            <div class="bk-watermark">

                <img src="<?php echo $template_url; ?>/images/watermark.png" alt="watermark.png" />

            </div>

            <header>

                <div class="upper-header">

                    <div class="container">

                        <div class="row">

                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-7">

                                <div class="logodiv">

                                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo bloginfo('name'); ?>">

                                        <img src="<?php echo get_option('logo_image'); ?>" alt="<?php echo bloginfo('name'); ?>" />    

                                    </a>

                                </div>

                            </div>

                            <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-8 col-sm-3 col-sm-offset-6 col-xs-5">

                                <div class="cms-header">

                                    <a href="#menu"><div><img src="<?php echo $template_url; ?>/images/menu.png" /><span>Menu</span></div></a>

                                </div>

                                <nav id="menu">

                                    <?php

                                    wp_nav_menu(array('theme_location' => 'header_menu',

                                        'container' => false));

                                    ?>

                                </nav>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="lower-header">

                    <div class="container">

                        <div class="row">

                            <?php 
                                $term  = get_queried_object();
                                
                                if($term->taxonomy == 'service-type' || $term->taxonomy == 'post_tag')
                                {
                            ?>
                            <h1 style="text-transform: capitalize;"><?php echo $term->name; ?></h1>
                            <?php } else {?>
                            <h1><?php the_title(); ?></h1>
                            <?php } ?>

                            <div class="breadcrumbs">

                                <ul>

                                    <li>

                                        <a title="" href="<?php echo esc_url(home_url('/')); ?>">Home</a>

                                    </li>

                                    <?php 
                                        $term  = get_queried_object();

                                        if($term->taxonomy == 'service-type')
                                        {
                                    ?>
                                    <li> <a title="" href="<?php echo get_permalink('72');?>">Service</a></li>
                                    <li> <?php echo $term->name; ?></li>

                                    <?php } else if($term->taxonomy == 'post_tag'){ ?>
                                    <li> <?php echo $term->name; ?></li>
                                    <?php
                                        }else{
                                    ?>

                                    <li><?php echo the_title();?></li>

                                    <?php }?>


                                </ul>

                            </div>

                            <div class="clearfix"></div>

                        </div>

                    </div>

                </div>

            </header>

            <?php } ?>