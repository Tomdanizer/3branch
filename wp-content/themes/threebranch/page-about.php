<?php get_header(); ?>
           <div id="info" class="section">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center header-text">The Story</h1>
                    </div>
                    <div class="row">
                        <div id="about" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <?php
                    $type = 'about';
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

                            </div>
                        <div class="col-xs-12 hidden-xs col-sm-6 col-md-6 col-lg-6">
                            <img id="logo" src="http://3branchbrewing.com/wp/wp-content/uploads/2014/08/10347160_705393836188159_5982104175341874188_n.jpg" alt="" />
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->
<?php get_footer(); ?>