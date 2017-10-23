<?php
/*
  Template Name: Blog
 */
?>
<?php get_header(); ?>


<div class="content">
    <section class="blog_list_sec">
        <div class="container">
            <div class="row">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="col-md-12">
                            <div class="grid">
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $blogs_arg2 = array(
                                    'posts_per_page' => -1,
                                    'post_status' => 'publish',
                                    'suppress_filters' => true
                                );
                                $blogs_array2 = get_posts($blogs_arg2);
                                $args = array(
                                    'posts_per_page' => get_option('posts_per_page'),
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'post_status' => 'publish',
                                    'suppress_filters' => true,
                                    'paged' => $paged
                                );
                                $blogs_array = get_posts($args);
                                for ($i = 0; $i < count($blogs_array); $i++) {
                                    //echo "<pre>";
                                    //print_r($blogs_array[$i]);
                                    $blog_image = wp_get_attachment_image_url(get_post_thumbnail_id($blogs_array[$i]->ID), 'medium');
                                    ?>
                                    <div class="grid-item">
                                        <div class="blog_box">
                                            <div class="blog_box_img">
                                                <img src="<?php echo $blog_image; ?>"/>
                                            </div>
                                            <div class="blog_box_cont">
                                                <span class="box_date" > <?php echo get_the_date( $format, $blogs_array[$i]->ID ); ?> </span>
                                                <div class="blog_title">
                                                    <a href="<?php echo get_permalink($blogs_array[$i]->ID); ?>"><?php echo $blogs_array[$i]->post_title;?></a>
                                                </div>

                                                <div class="blog_soc_disp">
                                                    <a class="box_view_cnt"><i class="icon icon-eye"></i> <?php echo intval( get_post_meta( $blogs_array[$i]->ID, 'views', true )); ?></a>
                                                    <a class="box_share_cnt" href="<?php echo get_permalink($blogs_array[$i]->ID); ?>" class="pull-right"><i class="fa fa-comment" style="color:#00c4ab;"></i> <?php echo $blogs_array[$i]->comment_count." Comments"; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>

                            <?php
                            $big = 999999999; // need an unlikely integer

                            $count = count($blogs_array2);
                            $offset = get_option('posts_per_page');

                            $max = $count / $offset;
                            if (is_float($max)) {
                                $max = (int) $max + 1;
                            }

                            $mypagei = paginate_links(array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')),
                                'total' => $max
                            ));
                            if ($mypagei != '') {
                                ?>
                                <div class="pager">
                                    <?php echo $mypagei; ?>
                                </div>   
                            <?php } ?>  

                        </div>
                        <?php
                    endwhile;
                else:
                    ?>    
                    <div class="error"><?php _e('Not found.'); ?></div> 
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>