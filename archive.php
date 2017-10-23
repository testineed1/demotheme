<?php get_header();?>
<div class="content">
    <section class="blog_list_sec">
        <div class="container">
            <div class="row">
                
                
                <?php if (have_posts()) : ?>            
                <div class="col-md-12">
                    
                    <div class="grid">
                        <?php while (have_posts()) : the_post(); ?>
                    
                            <div class="grid-item">
                                <div class="blog_box">
                                    <div class="blog_box_img">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </div>
                                    <div class="blog_box_cont">
                                        <?php /*<p class="byline">Written by: <span><?php the_author_link(); ?></span> on </p>*/?>
                                        <span class="box_date" > <?php the_time(get_option('date_format')); ?> </span>
                                        <div class="blog_title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </div>
                                        <?php /*
                                        <div class="post-meta">Posted in <?php the_category(',') ?> | <?php comments_popup_link(__('0 Comments'), __('1 Comment'), __('% Comments')); ?></div>
                                        */?>
                                        <div class="blog_soc_disp">
                                            <a class="box_view_cnt"><i class="icon icon-eye"></i> <?php echo intval( get_post_meta( get_the_ID(), 'views', true )); ?></a>
                                            <a class="box_share_cnt" class="pull-right"><i class="fa fa-comment" style="color:#00c4ab;"></i> <?php comments_popup_link(__('0 Comments'), __('1 Comment'), __('% Comments')); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <?php endwhile; ?>  
                        </div>
                    </div>
                    <div class="pager">
                    <?php
                       
                        global $wp_query;
                
                        $big = 999999999; // need an unlikely integer
                        
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $wp_query->max_num_pages
                        ) );
                         wp_reset_query();
                    ?>
                    </div>               
                    <div class="clear"></div>
                    
            <?php else: ?>    
                    
                <div class="error"><?php _e('Not found.'); ?></div> 
                           
            <?php endif; ?>
                
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>