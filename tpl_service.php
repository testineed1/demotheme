<?php
/*
  Template Name: Service
 */
?>
<?php get_header(); ?>

<div class="content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <section class="service_list_sec service dark-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="service-list">
                                <div class="row">
                                    <div class="nav nav-tabs">
                                        <?php
                                        $service_type = get_terms(
                                                'service-type', array(
                                            'orderby' => 'date',
                                            'order' => 'Desc',
                                            'hide_empty' => 0
                                        ));

                                        //  echo "<pre>";
                                        //  print_r($service_type);

                                        $data_delay = 0.5;
                                        for ($k = 0; $k < count($service_type); $k++) {
                                            $service_img = get_field('service_icon', 'service-type_' . $service_type[$k]->term_id);
                                            ?>
                                            <div class="col-md-2 col-sm-2 <?php if ($k == 0) { ?> col-md-offset-1 col-sm-offset-1 col-xs-offset-0 <?php } ?>">
                                                <div class="service-box wow fadeInUp" data-wow-delay="<?php echo $data_delay; ?>s">
                                                    <a <?php if ($k == 0) { ?> class="active-link serviceid_<?php echo $service_type[$k]->term_id; ?>" <?php } else { ?>class="serviceid_<?php echo $service_type[$k]->term_id; ?>" <?php } ?> data-toggle="tab" href="#serviceid_<?php echo $service_type[$k]->term_id; ?>">
                                                        <i>
                                                            <?php if ($service_img) { ?>
                                                                <img src="<?php echo $service_img; ?>"/>
                                                            <?php } else { ?>
                                                                <img src="<?php bloginfo('template_url'); ?>/images/web.png"/>
                                                            <?php } ?>
                                                        </i>
                                                        <?php
                                                        $service_name = explode(' ', $service_type[$k]->name);
                                                        ?>
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
                        </div>
                    </div>
                </div>
            </section> 
            <a href="javascript:void(0);" id="clickme" style="display: none; position: absolute; z-index: -9999;">Click Here</a>
            <section class="service_det_sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <?php for ($k = 0; $k < count($service_type); $k++) { ?>
                                    <div id="serviceid_<?php echo $service_type[$k]->term_id; ?>" class="tab-pane fade <?php if ($k == 0) { ?> in active <?php } ?>">
                                        <div class="service_title">
                                            <h3> <?php echo $service_type[$k]->name; ?> </h3>
                                        </div>
                                        <div class="service_content">
                                            <p><?php echo $service_type[$k]->description; ?></p>
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
                                                        'terms' => $service_type[$k]->term_id,
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
                                                        <a data-toggle="tab" data-cate="<?php echo $service_type[$k]->term_id; ?>" href="#<?php echo $service_array[$p]->post_name; ?>" class="ser_sub_acc type_<?php echo $service_array[$p]->post_name; ?>">
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
                                                    <div data-cate="<?php echo $service_type[$k]->term_id; ?>" id="<?php echo $service_array[$p]->post_name; ?>"  class="tab-pane fade <?php
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
        <?php } ?>

                            </div>                  
                        </div>
                    </div>
                </div>
            </section> 
            <!-- service End -->

        <?php
    endwhile;
else:
    ?>    

        <div class="error"><?php _e('Not found.'); ?></div> 

<?php endif; ?>

</div>

<?php get_footer(); ?>

<?php
if (isset($_GET['type']) && ($_GET['type'] != "")) {
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var sel_cat = $("#<?php echo $_GET['type']; ?>").data("cate");
            $(".serviceid_" + sel_cat).trigger("click");
            $(".type_<?php echo $_GET['type']; ?>").trigger("click");
            

            var screen_width = $(window).width();

            if (screen_width > 767) {

                $('html, body').animate({
                    scrollTop: $("#service_sub_sec").offset().top - 200
                }, 500);
            } else {

                $("#clickme").attr("href", "#mob_scroll_<?php echo $_GET['type']; ?>");
                $("#clickme").trigger("click");   
                
            }

        

        });
    </script>
    <?php
}
?>