<?php get_header(); ?>
            <div id="content">
              <div class="container">
                <?php
                    $type = 'people';
                    $args=array(
                      'post_type' => $type,
                      'post_status' => 'publish',
                      'posts_per_page' => -1,
                      'caller_get_posts'=> 1
                    );
                    $my_query = null;
                    $my_query = new WP_Query($args);

                    if( $my_query->have_posts() ) {
                      $counter = 0;
                      while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <?php include(locate_template("people-entry.php")); ?>
                        <?php
                        $counter++;
                      endwhile;
                    }

                    wp_reset_query();
                ?>
              </div><!-- #container -->
            </div><!-- #content -->
<?php get_footer(); ?>