<?php get_header(); ?>
<?php echo do_shortcode('[company]'); ?>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>

        <div class="row text-center">
            <?php
            $args = array(
                'post_type' => 'service',
            );
          
            $services = get_posts($args);
            global $post;
            if (!empty($services)) {

                foreach ($services as $post) {
                   

                    // modify the $post variable with the post data you want. Note that this variable must have this name!

                    setup_postdata($post); ?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-<?php the_field('service_post') ?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><?php the_title(); ?></h4>
                        <p class="text-muted"><?php the_content(); ?></p>
                        <?php the_post_thumbnail('thumbnail');  ?>

                    </div>


            <?php
                    wp_reset_postdata();
                }
            }
            ?>

        </div>
    </div>
</section>

<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <ul class="timeline">
            <?php


            $args = array();
            $my_posts = get_posts($args);
            global $post;
            $i=0;
            if (!empty($my_posts)) {

                foreach ($my_posts as $post) {
                    setup_postdata($post);
                    if (($i % 2) == 0) {
?>
                        <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2009-2011</h4>
                                <h4 class="subheading"><?php the_title(); ?></h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted"><?php the_content(); ?></p>
                            </div>
                        </div>
                    </li>
<?php 
                    }
                    else{
                        ?>

                        <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>March 2011</h4>
                                <h4 class="subheading"><?php the_title();?> </h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted"><?php the_content(); ?></p></div>
                        </div>
                    </li>
<?php
                    }
                    $i++;
            ?>
                   

            <?php
                    wp_reset_postdata();
                }
            }





            ?>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Be Part
                        <br />
                        Of Our
                        <br />
                        Story!
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- Footer-->

<?php get_footer(); ?>
