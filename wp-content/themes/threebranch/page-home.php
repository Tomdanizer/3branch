<?php get_header(); ?>

<main id="slides">

    <section id="slide-beer" class="homeSlide section bcg">

        <div id="product" class="section-space vertical-center vertical-center-carousel">

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
                                         <img src="images/style.png">

                                        <p class="beer-text text-center"><?php echo $term->name; ?></p>

                                    </div>

                                  

                                    <?php endforeach; ?>

                                <?php endif; ?>

                    </div>

                </div><!-- end row -->

            </div><!-- end container -->

        </div><!-- end section -->

    </section>

    <section id="slide-store" class="homeSlide section bcg">

            <div id="store" class="section-space vertical-center vertical-center-carousel">

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

                                            <p class="store-text text-center"><?php echo $term->name; ?></p>

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

                            <div class="event-list text-left">

                                <h1 class="header-text">Latest Posts</h1>
                               <?php
echo do_shortcode('[facebook=https://www.facebook.com/3branchbrewery]');

 ?>


                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                            <div class="event-list text-left">

                                <h1 class="header-text">Upcoming Events</h1>

                               <?php
echo do_shortcode('[ik_fb_feed]');

 ?>


                            </div>

                        </div><!-- end col -->

                    </div><!-- end row -->

                </div><!-- end container -->

            </div><!-- end section -->

    </section>  

    <section id="slide-about" class="homeSlide section bcg">

            <div id="about" class="section-space vertical-center">

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

            <div id="blog" class="section-space vertical-center">

                    <div class="container">

                        <div class="row">

                            <h1 class="text-center header-text">Recent Blog Posts</h1>

                        </div>

                        <div class="row text-left">
                                <ul class="recent-posts col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                  
                                    <?php $the_query = new WP_Query( 'showposts=5' ); ?>
                                    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                                        <li class="row">
                                                         <span class="col-xs-12 col-sm-12 col-md-2 col-lg-2"> 
                                                                                        <?php the_time('M j, Y') ?>
                                                                                    </span>
                                    <a class="col-xs-12 col-sm-12 col-md-2 col-lg-2" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                     </li>
                                    <?php endwhile;?>
                                    
                                </ul>

                        </div><!-- end row -->

                    </div><!-- end container -->

                </div><!-- end section -->

    </section>


    <section id="slide-contact" class="homeSlide section bcg">

            <div id="contact" class="section-space vertical-center">

                    <div class="container">

                        <div class="row">

                            <h1 class="text-center header-text">Contact</h1>

                        </div>

                        <div class="row text-center">

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <form class="contact-form" action="" method="POST" role="form">
                                
                                    <div class="form-group text-left">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Your Email">
                                        <label for="message">Message</label>
                                        <textarea class="form-control" id="message" placeholder="Your Message" rows="6"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <h4>Email</h4>
                                <div><a href="mailto:info@3branchbrewing.com">info@3branchbrewing.com</a></div>
                                <br>
                                <h4>Social</h4>
                                <div>Facebook</div>
                                <div>Twitter</div>
                            </div>
                                

                        </div><!-- end row -->

                    </div><!-- end container -->

            </div><!-- end section -->

    </section>
<?php get_footer(); ?>