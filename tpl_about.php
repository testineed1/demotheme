<?php
/*
  Template Name: About
 */
?>
<?php get_header(); ?>


<div class="content">
    <section class="about about_inner">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="row">   
                        <div class="col-md-7 col-sm-6 wow fadeInUp aboutimg">
                            <div class="aboutimg1">
                                <?php $big_image = get_field("big_image"); ?>
                                <img src="<?php echo $big_image; ?>" alt="Big Image"/>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 wow fadeInDown">
                        
                            <?php $about_content = get_field("about_content"); ?>
                            <?php echo $about_content; ?>
                        </div>
                    </div>


                    <div class="row work-flow">
                        <?php 
                            $work_flow = get_field("work_flow");
                            for($i = 0; $i<count($work_flow); $i++){
                        ?>

                        <div class="col-md-4 col-sm-4">
                            <?php $work_image = $work_flow[$i]['work_image']['url'];?>
                            <div class="left-img"><img src="<?php echo $work_image;?>"></div>
                            <div class="right-content">
                                <STRONG><?php echo $work_flow[$i]['work_title'];?></STRONG>
                                <p><?php echo $work_flow[$i]['work_short_description'];?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="row about_sec_row">    
                        <?php $director_big_img = get_field("director_big_img"); ?>
                        <?php $director_smll_img = get_field("director_smll_img"); ?>
                        <?php $director_content = get_field("director_content"); ?>
                        <div class="col-md-6 col-sm-6 wow fadeInUp service-content">
                            <?php echo $director_content; ?>
                        </div> 
                        <div class="col-md-6 col-sm-6 wow fadeInUp text-center">
                            <div class="main-img">
                                
                                <img src="<?php echo $director_big_img; ?>" class="wow fadeInRight"/>
                                
                            </div>
                        </div>
                               
                    </div>


                    <div class="row team-content" id="team">
                        <?php 
                            $about_team = get_field("about_team");
                            for($j = 0; $j<count($about_team); $j++){
                        ?>

                        <div class="col-md-3 col-sm-3">
                            <?php $team_image = $about_team[$j]['team_image']['url'];?>
                            <div class="img-data text-center"><img class="img-circle" src="<?php echo $team_image;?>"></div>
                            <div class="team-text">
                                <p class="team-title"><?php echo $about_team[$j]['team_title'];?></p>
                                <p class="sub-text"><?php echo $about_team[$j]['team_subtitle'];?></p>
                                <div class="team-social text-center">
                                    <?php if(!empty($about_team[$j]['facebook'])){?>
                                    <a href="<?php echo $about_team[$j]['facebook'];?>"><i class="fa fa-facebook"></i></a>
                                    <?php } if(!empty($about_team[$j]['twitter'])){?>
                                    <a href="<?php echo $about_team[$j]['twitter'];?>"><i class="fa fa-twitter"></i></a>
                                    <?php } if(!empty($about_team[$j]['linkedln'])){ ?>
                                    <a href="<?php echo $about_team[$j]['linkedln'];?>"><i class="fa fa-linkedin"></i></a>
                                    <?php } if(!empty($about_team[$j]['gmail'])){ ?>
                                    <a href="<?php echo $about_team[$j]['gmail'];?>"><i class="fa fa-envelope-o"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                <?php endwhile;
            else:
                ?>    

                <div class="error"><?php _e('Not found.'); ?></div> 

<?php endif; ?>

        </div>
    </section>   <!-- About End -->
</div>

<?php get_footer(); ?>
<script type="text/javascript">
    $('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {

    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 300
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
  
</script>