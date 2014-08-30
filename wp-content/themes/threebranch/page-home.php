<?php get_header(); ?>
<main id="slides">
    <section id="slide-beer" class="homeSlide section bcg">
        <div id="product" class="section-space">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center header-text">The Product</h1>
                </div>
                <div class="row">
                    <div id="beers" class="owl-carousel owl-theme">
                            <?php 
                                $terms = get_terms("styles");
                                if ( !empty( $terms ) && !is_wp_error( $terms ) ) : foreach ( $terms as $term ) : ?>
                                    <div class="beer-style">
                                        <img src="http://placehold.it/350x350">
                                        <p class="text-center"><?php echo $term->name; ?></p>
                                    </div>
                                  
                                    <?php endforeach; ?>
                                <?php endif; ?>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->
    </section>
    <section id="slide-store" class="homeSlide section bcg">
            <div id="store" class="section-space">
                <div class="container-fluid">
                    <div class="row">
                        <h1 class="text-center header-text">Store</h1>
                    </div>
                    <div class="row">
                        <div id="store_items" class="owl-carousel owl-theme">
                                <?php 
                                 

                                 $terms = get_terms("styles");
                                 if ( !empty( $terms ) && !is_wp_error( $terms ) ) : foreach ( $terms as $term ) : ?>
                                      
                                          <div class="item">
                                            <img src="http://placehold.it/350x350">
                                            <p class="text-center"><?php echo $term->name; ?></p>
                                          </div>
                                  
                                      <?php endforeach; ?>
                                 <?php endif; ?>
                        </div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->
    </section>
    <section id="slide-news" class="homeSlide section bcg">
            <div id="news" class="section-space">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="event-list">
                                <h1 class="header-text">Latest Posts</h1>
                                <ul>
                                    <li><a href="#">Blog Post Title & possibly Summary/Description News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 </a></li>
                                    <li><a href="#">News 2 News 2 News 2 News 2 </a></li>
                                    <li><a href="#">News 3 News 3 </a></li>
                                    <li><a href="#">News 4 News 4 News 4 News 4 News 4 News 4 News 4 News 4 News 4 News 4 </a></li>
                                    <li><a href="#">News 5News 5News 5News 5News 5News 5News 5 </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="event-list">
                                <h1 class="header-text">Upcoming Events</h1>
                                <ul>
                                    <li><a href="#">Event 1 Event 1 </a></li>
                                    <li><a href="#">Event 2Event 2Event 2Event 2Event 2Event 2Event 2 </a></li>
                                    <li><a href="#">Event 3 Event 3 Event 3 Event 3 </a></li>
                                    <li><a href="#">Event 4 Event 4 Event 4 Event 4 Event 4 </a></li>
                                    <li><a href="#">Event 5 Event 5 Event 5 Event 5 </a></li>
                                </ul>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->
    </section>  
    <section id="slide-about" class="homeSlide section bcg">
            <div id="about" class="section-space">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center header-text">The Story</h1>
                        <div class="text-center">
                            Super short preview / summary. with maybe Chicago? picture background or something relevant.
                        </div>

                         <div id="people">
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
                                      while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <div class="team-portrait">
                                                <?php 
                                                    $image = get_field('picture');

                                                if( !empty($image) ): 

                                                    // vars
                                                    $url = $image['url'];
                                                    $title = $image['title'];
                                                    $alt = $image['alt'];
                                                    $caption = $image['caption'];

                                                    // thumbnail
                                                    $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                                                    $thumb = $image['sizes'][ $size ];
                                                    $width = $image['sizes'][ $size . '-width' ];
                                                    $height = $image['sizes'][ $size . '-height' ];
                                                    if( !empty($image) ): ?>
                                                        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
                                                     <?php endif; ?>
                                                <?php endif; ?>
                                                <div class="team-portrait-description text-center">
                                                    <strong><?php the_title(); ?></strong>
                                                    <h6><?php the_field('title'); ?> <?php the_field('role'); ?></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                      endwhile;
                                    }

                                    wp_reset_query();
                                ?>
                            </div><!-- end #people -->

                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->
    </section>
    <section id="slide-blog" class="homeSlide section bcg">
            <div id="blog" class="section-space">
                    <div class="container">
                        <div class="row">
                            <h1 class="text-center header-text">Blog</h1>
                        </div>
                        <div class="row text-center">
                            <div>
                                Blog
                            </div>
                                
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end section -->
    </section>
    <section id="slide-contact" class="homeSlide section">
        <div id="slide-contact-background" class="bcg">
            <div id="contact" class="section-space">
                    <div class="container">
                        <div class="row">
                            <h1 class="text-center header-text">Contact</h1>
                        </div>
                        <div class="row text-center">
                            <div>
                                Contact
                            </div>
                                
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end section -->
        </div><!-- end bcg -->
    </section>
<?php get_footer(); ?>