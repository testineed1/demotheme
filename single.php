<?php get_header(); ?>

<style type="text/css">
    
.social-links ul {
    padding: 0;
    list-style: none;
    margin: 20px 0;
}
.social-links ul li {
    display: inline-block;
}
.social-links ul li a {
    padding: 6px 12px;
    color: grey;
}
</style>

<div class="content">
    <section class="blog_detail_sec">
        <div class="container">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <div class="cms_content">
                                <?php /* if (has_post_thumbnail()) : ?>
                                    <div class="blog_detail_img">
                                        <?php the_post_thumbnail('full'); ?>
                                    </div>
                                <?php endif; */?>     
                                <div class="proj_soc_det blog_detail">
                                    <ul>
                                        <li><i class="icon icon-eye"></i><?php the_views(); ?></li>
                                        <li><i class="icon icon-share-alt"></i> <span class="share_count_post"> Share Data unavailable </span> </li>
                                        <li><i class="icon icon-comment"></i><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></li>
                                    </ul>
                                </div>
                                <div class="blog_detail_date">
                                    <?php //the_time(get_option('date_format')); ?>
                                </div>
                                <div class="blog_det_content">
                                    <?php the_content(); ?> 
                                    <div class="tag1">
                                     <?php the_tags( '<i class="fa fa-tags"></i>   ', ' , ', '<br />' ); ?>
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                                <?php
                                    //$user_id = get_current_user_id();
                                //echo "<pre>";
                                //print_r($post);
                                    $user_id = $post->post_author;
                                    $recent_author = get_user_by( 'ID', $user_id );
                                    //$current_user = wp_get_current_user();
                                  ?>
                                <div class="user-info">

                                    <ol class="commentlist">
                                        <li class="comment even thread-even depth-1" id="li-comment-1">
                                            <article id="comment-1" class="comment">
                                                <div class="comment_avtar">
                                                    <?php echo get_avatar( $user_id, 65 ); ?>
                                                </div>
                                               <div class="comment_other_sec">
                                                <section class="comment-content comment">
                                                    <header class="comment-meta comment-author vcard">
                                                        <cite><b class="fn">
                                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?> " rel="external nofollow" class="url"><?php echo $recent_author->display_name;?></a></b> </cite>
                                                    </header>
                                                    <p><?php echo get_field('user_content', 'user_'.$user_id);?></p>
                                                    <?php
                                                        $facebook_link = get_field('facebook_link', 'user_'.$user_id);
                                                        $google_plus = get_field('google_plus', 'user_'.$user_id);
                                                        $pinterest = get_field('pinterest', 'user_'.$user_id);
                                                        $twitter = get_field('twitter', 'user_'.$user_id);
                                                    ?>
                                                    <div class="social-links">
                                                        <ul>
                                                            <?php if(!empty($facebook_link)){?>
                                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                            <?php } if(!empty($google_plus)){?>
                                                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                                                            <?php } if (!empty($pinterest)){?>
                                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>    
                                                            <?php } if (!empty($twitter)){?>
                                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                            <?php }?>
                                                        </ul>
                                                    </div>

                                                </section>
                                                </div>
                                            </article>
                                        </li>
                                    </ol>

                                   

                                    
                                    
                                </div>
                                <div class="blog_det_page">
                                    <span class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">' . _x('&laquo;', 'Previous post link', 'twentytwelve') . '</span> %title'); ?></span>
                                    <span class="back_btn"><a href=""><i class="icon-content-41 icon"></i></a></span>
                                    <span class="nav-next"><?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&raquo;', 'Next post link', 'twentytwelve') . '</span>'); ?></span>
                                </div>
                                <?php comments_template('', true); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            else:
                ?>    
                <div class="error"><?php _e('Not found.'); ?></div> 
            <?php endif; ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>