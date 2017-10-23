<?php get_header(); ?>



<div class="content">

    <?php if (have_posts()) : ?>            

        <?php while (have_posts()) : the_post(); ?>
            <section class="proj_detail_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="project_title">
                                <?php
                                $project_sub_title = get_field("project_sub_title");
                                if ($project_sub_title) {
                                    ?>
                                    <h1> <?php echo $project_sub_title; ?> </h1>
                                <?php } ?>
                                <span class="project_share_icons">
                                    <a href="#">
                                        <i class="icon icon-sharethis"></i>
                                    </a>
                                        <?php echo get_simple_likes_button( $post->ID ); ?>
                                    <a href="#">
                                        <i class="icon icon-youtube-play-1"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon icon-vimeo-1"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="proj_soc_det">
                                <ul>
                                    <li><i class="icon icon-eye"></i><?php the_views(); ?></li>
                                    <li><i class="icon icon-share-alt"></i>22 shares</li>
                                    <li><?php echo get_simple_likes_button( $post->ID ); ?> Likes</li>
                                    <?php rw_the_post_rating($post->ID, 'front-post'); ?>
                                    
                                </ul>
                            </div>
                            <div class="proj_sing_content">
                                <?php the_content(); ?>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="project_other_sec">
                                <?php
                                $project_side_rep = get_field("project_side_rep");
                                for ($i = 0; $i <= count($project_side_rep); $i++) {
                                    ?>
                                    <div class="project_rep">
                                        <span class="project_rep_title"><?php echo $project_side_rep[$i]["project_side_title"]; ?></span>
                                        <div class="proj_rep_content">
                                            <p><?php echo $project_side_rep[$i]["project_side_content"]; ?></p>
                                        </div>                                        
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>                 

    <?php else: ?>    

        <div class="error"><?php _e('Not found.'); ?></div> 

    <?php endif; ?>

    <section class="rec_proj_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="rec_proj_title"> 
                        <h4><?php echo get_option('recent_project_label_val'); ?></h4>
                        <div class="rec_proj_nav">
                            <i class="icon icon-chevron-left"></i>  
                            <i class="icon icon-chevron-right"></i>                                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel" id="rec_proj_slider">
                    <?php $btn_label = get_option('recent_project_btn_val'); ?>
                    <?php $slider_pro_limit = get_option('recent_project_slider_val'); ?>
                    <?php
                    $args = array(
                        'posts_per_page' => $slider_pro_limit,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_type' => 'project',
                        'post_status' => 'publish',
                        'exclude' => get_the_ID(),
                        'suppress_filters' => true
                    );
                    $posts_array = get_posts($args);
                    $total_projects = count($posts_array);
                    ?>

                    <?php for ($i = 0; $i <= ($total_projects - 1); $i++) { ?>
                        <div class="item"> 
                            <div class="portfolio-wrapper">

                                <?php
                                $project_type = wp_get_post_terms($posts_array[$i]->ID, "project-type");
                                ?>
                                <?php
                                $img_url = get_the_post_thumbnail_url($posts_array[$i], 'medium');
                                ?>
                                <img src="<?php echo $img_url; ?>"/>
                                <span class="holder"></span>
                                <div class="portfolio-caption">
                                    <div class="inner-wapper">
                                        <div class="portfolio-content">
                                            <h3><?php echo $posts_array[$i]->post_title; ?></h3>
                                            <?php
                                            for ($j = 0; $j <= count($project_type); $j++) {
                                                if ($project_type[$j]->name != "All") {
                                                    ?>
                                                    <span><?php echo $project_type[$j]->name; ?></span>
                                                    <?php
                                                    break;
                                                }
                                            }
                                            ?>
                                            <a href="<?php echo get_permalink($posts_array[$i]->ID); ?>"><?php echo $btn_label; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>


<?php get_footer(); ?>
<script type="text/javascript">
    $(document).ready(function () {

        /* Project Detail page */
        $('#rec_proj_slider.owl-carousel').owlCarousel({
            items: 3,
            loop: true,
            autoplay: false,
            margin: 30,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                420: {
                    items: 1
                },
                767: {
                    items: 3
                },
                1000: {
                    items: 3
                }}
        });
        $(".rec_proj_title .icon-chevron-left").click(function () {
            $("#rec_proj_slider .owl-prev").click();
        });
        $(".rec_proj_title .icon-chevron-right").click(function () {
            $("#rec_proj_slider .owl-next").click();
        });
        /* Project Detail Page */
    });
</script>