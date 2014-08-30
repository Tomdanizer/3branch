<?php get_header(); ?>
        <div id="container">
            <div id="content">
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
                          <?php get_template_part( 'entry' ); ?>

                        <?php
                      endwhile;
                    }

                    wp_reset_query();
                ?>
            </div><!-- #content -->
        </div><!-- #container -->
<?php get_footer(); ?>