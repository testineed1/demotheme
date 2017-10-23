<?php get_header();

$current_term  = get_queried_object();
//echo "<pre>";
//print_r($get_sulg);
$sulg_id = $get_sulg->term_id;

?>
<div class="content">
        
            <section class="service_det_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                                    <div id="serviceid_<?php echo $current_term->term_id; ?>">   
                                        
                                        <div class="service_content">
                                            <p><?php                                            
                                            $service_content = get_field('listing_content', 'service-type_' . $current_term->term_id);
                                            echo $service_content; ?></p>
                                        </div>
                                        <div class="service_sub_sec" id="service_sub_sec">
                                            <!-- Desktop View start -->
                                            <?php
                                            $args = array(
                                                'posts_per_page' => -1,
                                                'orderby' => 'date',
                                                'order' => 'DESC',
                                                'post_type' => 'service',
                                                'post_status' => 'publish',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'service-type',
                                                        'field' => 'term_id',
                                                        'terms' => $current_term->term_id,
                                                    )
                                                )
                                            );
                                            $service_array = get_posts($args);
                                            /*
                                              echo "<pre>";
                                              print_r($service_array);
                                              echo "</pre>";
                                             */
                                            ?>
                                            <ul class="nav nav-tabs desktop_view">
                                                <?php
                                                for ($p = 0; $p < count($service_array); $p++) {

                                                    $img_url = get_field("service_icon", $service_array[$p]->ID);
                                                    ?>
                                                    <li <?php if ($p == 0) { ?> class="active" <?php } ?> >
                                                        <a data-toggle="tab" data-cate="<?php echo $current_term->term_id; ?>" href="#<?php echo $service_array[$p]->post_name; ?>" class="ser_sub_acc type_<?php echo $service_array[$p]->post_name; ?>">
                                                            <span  class="ser_sub_acc_img">
                                                                <img src="<?php echo $img_url; ?>" />
                                                            </span>
                                                            <span class="ser_sub_title"><?php echo $service_array[$p]->post_title; ?></span>
                                                        </a>
                                                        <span  class="ser_sub_btm wow fadeInUp" data-wow-delay="2s">
                                                            <img src="<?php bloginfo('template_url'); ?>/images/service_line.png" />
                                                        </span>
                                                    </li>
                                                <?php } ?>
                                            </ul>

                                            <div class="tab-content desktop_view">
                                                <?php
                                                for ($p = 0; $p < count($service_array); $p++) {
                                                    ?>
                                                    <div data-cate="<?php echo $current_term->term_id; ?>" id="<?php echo $service_array[$p]->post_name; ?>"  class="tab-pane fade <?php
                                                    if ($p == 0) {
                                                        echo " in active";
                                                    }
                                                    ?> ">
                                                        <p><?php echo $service_content = apply_filters('the_content', $service_array[$p]->post_content); ?></p>
                                                    </div>
                                                <?php } ?>
                                            </div>                                            
                                            <!-- Desktop View End -->
                                            <!-- Responsive View Start -->
                                            <div class="faq_section responsive-service">
                                                <div class="panel-group" id="accordion_<?php echo $k; ?>">
                                                    <?php
                                                    for ($p = 0; $p < count($service_array); $p++) {
                                                        ?>
                                                        <div class="panel panel-default">                                        
                                                            <a class="panel-heading <?php
                                                            if ($_GET['type'] == "") {
                                                                if ($p != 0) {
                                                                    echo "collapsed 1";
                                                                }
                                                            } else {
                                                                if ($_GET['type'] != $service_array[$p]->post_name) {
                                                                    echo "collapsed 2";
                                                                }
                                                            }
                                                            ?> " data-toggle="collapse" data-parent="#accordion_<?php echo $k; ?>" href="#collapse_ss_<?php echo $service_array[$p]->post_name; ?>" <?php if ($_GET['type'] == "") {
                                                                if ($p == 0) { ?> aria-expanded="true" <?php }
                                                            } ?> >
                                                                <span class="faq_title"><?php echo $service_array[$p]->post_title; ?></span>
                                                                <span class="pull-right faq_icon">
                                                                    <i class="icon icon-android-add"></i>
                                                                    <i class="icon icon-android-remove"></i>
                                                                </span>                                                
                                                            </a>
                                                            <div id="collapse_ss_<?php echo $service_array[$p]->post_name; ?>" class="panel-collapse collapse <?php
                                                                 if ($_GET['type'] == "") {
                                                                     if ($p == 0) {
                                                                         echo "in 1";
                                                                     }
                                                                 } else {
                                                                     if ($_GET['type'] == $service_array[$p]->post_name) {
                                                                         echo "in 2";
                                                                     }
                                                                 }
                                                                 ?>  "  <?php
                                                                 if ($_GET['type'] == "") {
                                                                     if ($p == 0) {
                                                                         ?>
                                                                         aria-expanded="true" 
                                                                <?php
                                                            }
                                                        } else {
                                                            if ($_GET['type'] == $service_array[$p]->post_name) {
                                                                ?>
                                                                         aria-expanded="true"                     <?php }
                } ?> >
                                                                <div class="panel-body">
                                                                    <div id="mob_scroll_<?php echo $service_array[$p]->post_name; ?>">
                                                                    <p><?php echo $service_content = apply_filters('the_content', $service_array[$p]->post_content); ?></p>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

            <?php } ?>

                                                </div>
                                            </div>
                                            <!-- Responsive View End -->
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </section> 
            <!-- service End -->

        
</div>
<?php get_footer(); ?>