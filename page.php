<?php get_header(); ?>

<div class="content">
    <section class="cms_page_sec">
        <div class="container">
            <?php if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cms_content">
                                <?php the_content(); ?> 
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