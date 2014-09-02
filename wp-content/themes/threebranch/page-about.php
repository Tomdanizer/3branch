<?php get_header(); ?>

           <div id="content" class="content-container">

                <div class="container">

                    <div class="row">

                        <h1 class="text-center header-text">The Story</h1>

                    </div>

                    <div class="row">

                        <div id="about" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <?php
                    $page = get_posts( array( 
                      'name' => 'about', 
                      'post_type' => 'page' ) 
                    );

                      if ( $page )
                      {
                          echo $page[0]->post_content;
                      }

                ?>



                            </div>

                        <div class="col-xs-12 hidden-xs col-sm-6 col-md-6 col-lg-6">

                            <img id="logo" src="http://3branchbrewing.com/wp/wp-content/uploads/2014/08/10347160_705393836188159_5982104175341874188_n.jpg" alt="" />

                        </div><!-- end col -->

                    </div><!-- end row -->

                </div><!-- end container -->

            </div><!-- end content -->

    <?php get_footer(); ?>
 <?php get_template_part( "footer-scripts" ); ?> 
  <?php get_template_part( "footer-close" ); ?> 