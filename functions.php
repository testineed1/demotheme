<?php
/* include theme commun codes */
include("functions/theme_commun_code.php");
/* end of include theme commun codes */

/* include theme widget area */
include("functions/theme_widget_areas.php");
/* end of include theme widget area */

/* include the Menu Registration page */
include("functions/register_menus.php");
/* end of include the Menu Registration page */

/* include the option page */
include("functions/theme_option_page.php");
/* end of include the option page */

/* Include the custom post type */
include("functions/custom_post_type.php");
/* end ov Include the custom post type */

/* Include the theme's custom functions */
include("functions/theme_custom_functions.php");
/* end of theme's custom functions */

/* Include the theme's custom widgets */
include("functions/widgets.php");
/* end of theme's custom widgets */

/* Include the theme's custom users */
include("functions/custom_users.php");
/* end of theme's custom users */

/* Include the theme's custom users */
include("functions/post-like/post-like.php");
/* end of theme's custom users */

if (!function_exists('twentytwelve_comment')) :

    /**
     * Template for comments and pingbacks.
     *
     * To override this walker in a child theme without modifying the comments template
     * simply create your own twentytwelve_comment(), and that function will be used instead.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     *
     * @since Twenty Twelve 1.0
     */
    function twentytwelve_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                // Display trackbacks differently than normal comments.
                ?>
                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                    <p><?php _e('Pingback:', 'twentytwelve'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('(Edit)', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?></p>
                    <?php
                    break;
                default :
                    // Proceed with normal comments.
                    global $post;
                    ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>" class="comment">
                        <div class="comment_avtar">
                            <?php
                            echo get_avatar($comment, 80);
                            ?>
                        </div>
                        <div class="comment_other_sec">
                            <header class="comment-meta comment-author vcard">
                                <?php
                                printf('<cite><b class="fn">%1$s</b> %2$s</cite>', get_comment_author_link(),
                                        // If current post author is also comment author, make it known visually.
                                        ( $comment->user_id === $post->post_author ) ? '<span>' . __('Post author', 'twentytwelve') . '</span>' : ''
                                );
                                printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'),
                                        /* translators: 1: date, 2: time */ sprintf(__('%1$s at %2$s', 'twentytwelve'), get_comment_date(), get_comment_time())
                                );
                                ?>
                            </header><!-- .comment-meta -->

                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'twentytwelve'); ?></p>
                            <?php endif; ?>

                            <section class="comment-content comment">
                                <?php comment_text(); ?>
                                <?php edit_comment_link(__('Edit', 'twentytwelve'), '<p class="edit-link">', '</p>'); ?>
                            </section><!-- .comment-content -->

                            <div class="reply">
                                <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'twentytwelve'), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                            </div><!-- .reply -->
                        </div>
                    </article><!-- #comment-## -->
                    <?php
                    break;
            endswitch; // end comment_type check
        }

    endif;


    /* Change comment layout fields*/

    function wpb_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
    }
     
    add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );
?>


