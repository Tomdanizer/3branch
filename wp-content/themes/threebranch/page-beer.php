<?php get_header(); ?>


            <div id="content" class="section">
              <div class="container-fluid">
                <div class="row">
    

                    <?php
                        $type = 'beers';
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
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
                                <div class="beer-card">
                                    <div class="row">
                                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-center">
                                        <?php 
                                            $image = get_field('image');

                                            if( !empty($image) ): 

                                                // vars
                                                $url = $image['url'];
                                                $title = $image['title'];
                                                $alt = $image['alt'];
                                                $caption = $image['caption'];

                                                // thumbnail
                                                $size = 'large'; // (thumbnail, medium, large, full or custom size)
                                                $thumb = $image['sizes'][ $size ];
                                                $width = $image['sizes'][ $size . '-width' ];
                                                $height = $image['sizes'][ $size . '-height' ];
                                                if( !empty($image) ): ?>
                                                    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                            <div><?php the_title(); ?></div>
                                            <?php
                                                /*
                                                *  get all custom fields and dump for texting
                                                */
                                                $fields = get_field_objects();
                                                 //var_dump( $fields ); 
                                                /*
                                                *  get all custom fields, loop through them and create a label => valuemarkup
                                                */
                                                $fields = get_field_objects();
                                                if( $fields )
                                                {
                                                    foreach( $fields as $field_name => $field )
                                                    {
                                                        if($field['name'] != "image" ){
                                                            echo '<div>';
                                                                echo '<h3>' . $field['label'] . '</h3>';
                                                                echo $field['value'];
                                                            echo '</div>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <?php get_template_part( 'entry-content' ); ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Expandable div to show more information? -->
                                <!-- End Expandable div to show more information? -->
                            </div>
                            <?php
                            endwhile;
                        }
                        wp_reset_query();
                    ?>
                </div> <!-- row -->
              </div><!-- #container -->
            </div><!-- #content -->


<?php get_footer(); ?>