<?php
/*
  Template Name: Home
 */
?>
<?php get_header(); ?>

<?php $template_url = get_bloginfo('template_url'); ?>

<nav id="menu">
    <?php
    wp_nav_menu(array('theme_location' => 'header_menu',
        'container' => false));
    ?>
</nav>

<div class="content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            $home_meta = get_post_meta(get_the_ID());
            ?>
            <section class="banner">
                <div class="banner-bg" style="background:url(<?php echo get_field("hom_banner_img"); ?>);">
                    <div class="banner-content">
                        <div class="header">
                            <a href="#menu"><div><img src="<?php echo $template_url; ?>/images/menu.png" /><span>Menu</span></div></a>			
                        </div> 
                        <div class="header-soical wow fadeInRight">
                            <div class="social-title"><h4><?php echo $home_meta["hom_bnr_flw_label"][0]; ?></h4></div>
                            <div class="line"></div>
                            <?php $facebook_val = get_option('facebook_val'); ?>
                            <?php $twitter_val = get_option('twitter_val'); ?>
                            <?php $insta_val = get_option('insta_val'); ?>
                            <?php $pinterest_val = get_option('pinterest_val'); ?>
                            <?php if ($facebook_val) { ?>
                                <a href="<?php echo $facebook_val; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                            <?php } ?>
                            <?php if ($twitter_val) { ?>
                                <a href="<?php echo $twitter_val; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                            <?php } ?>
                            <?php if ($insta_val) { ?>
                                <a href="<?php echo $insta_val; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                            <?php } ?>
                            <?php if ($pinterest_val) { ?>
                                <a href="<?php echo $pinterest_val; ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                            <?php } ?>
                        </div>
                        <div class="content-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="middle-content">
                                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                                            <img class="wow fadeInDown" src="<?php echo get_option('hom_logo_image'); ?>" alt="<?php echo bloginfo('name'); ?>" />
                                        </a>
                                        <h3 class="wow pulse"><?php echo $home_meta["hom_banner_lable"][0]; ?> <span class="element"></span></h3>
                                        <span class="wow fadeInUp"><?php echo $home_meta["hom_sub_desc"][0]; ?></span>
                                        <div class="partner-logo">
                                            <?php echo $home_meta["hom_bnr_content"][0]; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </section>
            <!-- About Section Start -->
            <section class="about">
                <div class="container">
                    <div class="row">    
                        <div class="page-title wow pulse">
                            <h2 class="wow slideInLeft"><?php echo $home_meta["hom_abt_side_txt"][0]; ?></h2>
                        </div>
                        <div class="about_sec_row">    

                            <div class="col-md-10 col-md-offset-1 wow slideInRight">
                                <?php echo $home_meta["about_content"][0]; ?>
                            </div>        
                        </div>        
                    </div>
                </div>
            </section>
            <!-- About Section End -->
            <!-- Service Section Start -->
            <section class="service dark-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="wow pulse"><?php echo $home_meta["services_title"][0]; ?></h2>
                            <div class="service-list">
                                <div class="row"> 
                                    <div class="nav nav-tabs">
                                        <?php
                                        $hom_service = get_field("hom_service_rep");
                                        $data_delay = 0.5;
                                        for ($i = 0; $i < count($hom_service); $i++) {
                                            $service_name = explode(' ', $hom_service[$i]["hom_serv_title_row"]);
                                            ?>
                                            <div class="col-md-2 col-sm-2 <?php if ($i == 0) { ?> col-md-offset-1 col-sm-offset-1 col-xs-offset-0 <?php } ?>">
                                                <div class="service-box wow fadeInUp" data-wow-delay="<?php echo $data_delay; ?>s">
                                                    <a rel="home_service_<?php echo $i; ?>" class="<?php if ($i == 0) { ?> active-link<?php } ?>">
                                                        <div class="service-img-fix">
                                                            <img src="<?php echo $hom_service[$i]["hom_serv_icon_row"]; ?>" alt=" <?php echo $service_name; ?> " />
                                                        </div>                                                    
                                                        <h4>
                                                            <?php
                                                            for ($m = 0; $m < count($service_name); $m++) {
                                                                if ($m == 0) {
                                                                    echo $service_name[$m];
                                                                } else {
                                                                    echo "<span>" . $service_name[$m] . "</span>";
                                                                }
                                                            }
                                                            ?>
                                                        </h4>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                            $data_delay = $data_delay + 0.5;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <?php
                                for ($i = 0; $i < count($hom_service); $i++) {
                                    ?>
                                    <div  id="home_service_<?php echo $i; ?>" class="<?php if ($i == 0) { ?>active<?php } ?>">
                                        <h3><?php echo $hom_service[$i]["hom_serv_title_row"]; ?></h3>
                                        <?php echo $hom_service[$i]["hom_serv_content_row"]; ?>
                                    </div>
                                <?php } ?>
                            </div>                  
                        </div>
                    </div>
                </div>
            </section> 
            <!-- Service Section End -->
            <!-- Process Section Start -->
            <section class="process light-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="wow pulse" data-wow-delay="0.5s"><?php echo $home_meta["process_title"][0]; ?></h2>
                            <span class="sub-title wow fadeInUp"><?php echo $home_meta["home_process_label"][0]; ?></span>

                            <div class="our-process desk-process">
                                <div class="company-logo wow pulse">
                                    <img src="<?php echo get_option('hom_logo_image'); ?>"/>
                                </div>
                                <?php
                                $hom_process = get_field("hom_process_rep");
                                $data_delay = 0.5;
                                for ($i = 0; $i < count($hom_process); $i++) {
                                    ?>
                                    <div class="porcess<?php echo $i + 1; ?> wow fadeInDown" data-wow-delay="<?php echo $data_delay; ?>s">
                                        <img src="<?php echo $hom_process[$i]["hom_process_bg_img"]; ?>"/>                       
                                        <div class="process-content">
                                            <?php if (($i == 0) || ($i == 1) || ($i == 5)) { ?>
                                                <i><img src="<?php echo $hom_process[$i]["hom_process_icon"]; ?>"/></i>
                                            <?php } ?>
                                            <div class="inner-process">
                                                <h4><?php echo $hom_process[$i]["hom_process_title"]; ?></h4>
                                                <?php echo $hom_process[$i]["hom_process_content"]; ?>
                                            </div>
                                            <?php if (($i == 2) || ($i == 3) || ($i == 4)) { ?>
                                                <i><img src="<?php echo $hom_process[$i]["hom_process_icon"]; ?>"/></i>
                                            <?php } ?>
                                        </div>
                                    </div>  
                                    <?php
                                    $data_delay = $data_delay + 0.5;
                                }
                                ?>
                            </div>

                            <div class="our-process-mb mobile-process">
                                <?php
                                $data_delay = 0.5;
                                for ($i = 0; $i < count($hom_process); $i++) {
                                    ?>                                
                                    <div class="process-box p<?php echo $i + 1; ?> wow fadeInUp">
                                        <div class="process_img">
                                            <img src="<?php echo $hom_process[$i]["hom_process_icon"]; ?>">
                                        </div>
                                        <div class="process_content">
                                            <h4><?php echo $hom_process[$i]["hom_process_title"]; ?></h4>
                                            <p><?php echo $hom_process[$i]["hom_process_content"]; ?></p>
                                        </div>
                                    </div>  
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Process Section Start -->
            <!-- Portfolio Section Start -->
            <section class="portfolio light-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="wow pulse"><?php echo $home_meta["hom_port_title"][0]; ?></h2>
                            <span class="sub-title wow fadeInUp"><?php echo $home_meta["hom_port_label"][0]; ?></span>
                            <div class="controls">                       
                                <?php
                                $project_type = get_terms(
                                        'project-type', array(
                                    'orderby' => 'Name',
                                    'hide_empty' => 0
                                ));
                                for ($k = 0; $k < count($project_type); $k++) {
                                    ?>
                                    <button type="button" class="control" data-filter=".pro_type_<?php echo $project_type[$k]->slug; ?>"><?php echo $project_type[$k]->name; ?></button>
                                <?php } ?>
                            </div>
                            <div class="portfolio-list wow fadeInUp">
                                <div class="row">
                                    <?php
                                    $btn_label = get_option('recent_project_btn_val');
                                    $args = array(
                                        'posts_per_page' => get_option('posts_per_page'),
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'post_type' => 'project',
                                        'post_status' => 'publish',
                                        'suppress_filters' => true,
                                        'paged' => $paged
                                    );
                                    $projects_array = get_posts($args);
                                    for ($i = 0; $i < count($projects_array); $i++) {
                                        $project_type = wp_get_post_terms($projects_array[$i]->ID, "project-type");
                                        $img_url = get_the_post_thumbnail_url($projects_array[$i], 'medium');
                                        ?>

                                        <?php
                                        $proj_type = "";
                                        for ($l = 0; $l < count($project_type); $l++) {
                                            $proj_type = $proj_type . "pro_type_" . $project_type[$l]->slug . " ";
                                        }
                                        ?>

                                        <div class="mix <?php echo $proj_type; ?> col-md-4 col-xs-12">
                                            <div class="portfolio-wrapper">
                                                <img src="<?php echo $img_url; ?>"/>
                                                <span class="holder"></span>
                                                <div class="portfolio-caption">
                                                    <div class="inner-wapper">
                                                        <div class="portfolio-content">
                                                            <h3><?php echo $projects_array[$i]->post_title; ?></h3>
                                                            <?php
                                                            $project_type = wp_get_post_terms($projects_array[$i]->ID, "project-type");
                                                            for ($j = 0; $j <= count($project_type); $j++) {
                                                                if ($project_type[$j]->name != "All") {
                                                                    ?>
                                                                    <span><?php echo $project_type[$j]->name; ?></span>
                                                                    <?php
                                                                    break;
                                                                }
                                                            }
                                                            ?>
                                                            <a data-toggle="modal" data-target="#project_popup_<?php echo $i; ?>"><?php echo $btn_label; ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Modal -->
                                        <div class="modal fade" id="project_popup_<?php echo $i; ?>" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><?php echo $projects_array[$i]->post_title; ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        $project_images = get_field("project_images", $projects_array[$i]->ID);

                                                        if (!empty($project_images)) {
                                                            ?>
                                                            <div class="project_popup_slider">
                                                                <div class="owl-carousel owl-theme">
                                                                    <?php for ($k = 0; $k < count($project_images); $k++) { ?>
                                                                        <div class="item"><img src="<?php echo $project_images[$k]['url']; ?>"/> </div>
                <?php } ?>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="alert alert-info">No image are available</div>
            <?php } ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Portfolio Section End -->
            <!-- Blog Section Start -->
            <section class="blog light-bg">
                <div class="container">
                    <div class="row">
                        <h2 class="wow pulse"><?php echo $home_meta["hom_blog_title"][0]; ?></h2>
                        <span class="sub-title wow fadeInUp"><?php echo $home_meta["hom_blog_subtitle"][0]; ?></span>                        
                        <div class="blog-list">

                            <?php
                            $args_blog = array(
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'post_status' => 'publish',
                                'suppress_filters' => true,
                                'paged' => $paged
                            );

                            $blogs_array = get_posts($args_blog);


                            for ($i = 0; $i < count($blogs_array); $i++) {
                                $blog_image = wp_get_attachment_image_url(get_post_thumbnail_id($blogs_array[$i]->ID), 'medium');
                                ?>

                                <div class="col-md-4 wow fadeInUp col-sm-12 <?php if ($i % 2 == 1) { ?> even <?php } ?>">
                                    <?php if ($i % 2 == 0) { ?>
                                        <div class="blog-img">
                                            <img src="<?php echo $blog_image; ?>" alt="<?php echo $blogs_array[$i]->post_title; ?>" />
                                        </div>
                                    <?php } ?>
                                    <div class="blog-content">
                                        <span class="box_date"><?php echo get_the_date($format, $blogs_array[$i]->ID); ?></span>
                                        <div class="blog_title">
                                            <a href="<?php echo get_permalink($blogs_array[$i]->ID); ?>"><?php echo $blogs_array[$i]->post_title; ?></a>
                                        </div>
                                        <div class="share-blog">
                                            <a href="#" class="box_view_cnt"><i class="icon icon-eye"></i> <?php echo intval(get_post_meta($blogs_array[$i]->ID, 'views', true)); ?> Views</a>
                                            <a class="box_share_cnt" href="<?php echo get_permalink($blogs_array[$i]->ID); ?>" class="pull-right"><i class="fa fa-comment" style="color:#00c4ab;"></i> <?php echo $blogs_array[$i]->comment_count . " Comments"; ?></a>
                                        </div>
                                    </div>       
                                    <?php if ($i % 2 == 1) { ?>
                                        <div class="blog-img">
                                            <img src="<?php echo $blog_image; ?>" alt="<?php echo $blogs_array[$i]->post_title; ?>" />
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="blog-link">
                            <img src="<?php echo $template_url; ?>/images/blog.png" alt="Arrow" />
                            <a href="<?php echo get_permalink($home_meta["hom_blog_link"][0]) ?>"><?php echo $home_meta["hom_blog_btn_label"][0]; ?></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Blog Section End -->
            <!-- Testimonials Section Start -->
            <section class="testimonials wow flipInX">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo $home_meta["hom_testimonial_title"][0]; ?></h2>
                            <span class="sub-title"><?php echo $home_meta["hom_testimonial_subtitle"][0]; ?></span>
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                <!-- Carousel Slides / Quotes -->
                                <div class="carousel-inner">
                                    <?php
                                    $testi_arr = get_field("hom_testimonials");
                                    for ($i = 0; $i < count($testi_arr); $i++) {
                                        $testi_meta = get_post_meta($testi_arr[$i]);
                                        $testi_url = wp_get_attachment_image_src($testi_meta["testi_profile_pic"][0], 'full');
                                        ?>
                                        <div class="item <?php if ($i == 0) { ?> active<?php } ?>">
                                            <blockquote>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img  src="<?php echo $template_url; ?>/images/q1.png" alt="left-quote" />
                                                        <img class="img-circle client-image" src="<?php echo $testi_url[0]; ?>" alt="client-1">
                                                        <img src="<?php echo $template_url; ?>/images/q2.png" alt="right-quote" />
                                                        <p><?php echo $testi_meta["testi_content"][0]; ?></p>
                                                        <span>- <?php echo $testi_meta["testi_name"][0] . ", " . $testi_meta["testi_position"][0] . ", " . $testi_meta["testi_company_name"][0]; ?></span>
                                                    </div>
                                                </div>
                                            </blockquote>
                                        </div>

                                    <?php } ?>
                                </div>
                                <!-- Carousel Buttons Next/Prev -->
                                <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                                <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                            </div>                          
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonials Section End --> 
            <?php
        endwhile;
    else:
        ?>    
        <div class="error"><?php _e('Not found.'); ?></div> 
    <?php endif; ?>
</div>


<?php get_footer(); ?>

<script type="text/javascript">
    $(document).ready(function () {
    $(".element").typed({
    strings: [
<?php
$service_arr = get_field("hom_bnr_service_rep");
for ($i = 0; $i < count($service_arr); $i++) {
    ?>
        "<?php echo $service_arr[$i]["hom_bnr_service"]; ?>",
<?php } ?>
    ],
            typeSpeed: 100,
            loop: true
    });
    });
</script>