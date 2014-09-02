<?php get_header(); ?>
      <div id="content" class="content-container">
        <div class="container">

              
            
                <?php

                    $type = 'post';

                    $args=array(

                      'post_type' => $type,

                      'post_status' => 'publish',

                      'posts_per_page' => -1,

                      'caller_get_posts'=> 1

                    );

                    $my_query = null;

                    $my_query = new WP_Query($args);



                    if( $my_query->have_posts() ) {

                      while ($my_query->have_posts()) : $my_query->the_post(); ?>
                          <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php get_template_part( 'entry' ); ?>


                            </div>
                          </div><!-- row -->
                        <?php

                      endwhile;

                    }



                    wp_reset_query();

                ?>


        </div><!-- #container -->
      </div><!-- #content -->
    <?php get_footer(); ?>
