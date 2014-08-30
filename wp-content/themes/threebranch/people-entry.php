<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="row">
        <!-- Team member headshot -->
        <?php
            if(($counter % 2) == 1) :  ?> <!-- odd - right -->
                <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4 col-sm-push-7 col-md-push-8 col-lg-push-8 text-center">
        <?php else: ?> <!-- even - left -->
                <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4 text-center">
        <?php endif; ?>
        
        
            <?php 
                $image = get_field('picture');

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
                    <img class="head-picture" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                 <?php endif; ?>
            <?php endif; ?>
        </div>
        <!-- End Team member headshot -->
        <!-- Team member description -->
        <?php
            if(($counter % 2) == 1) : ?><!-- odd - right -->
                <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8 col-sm-pull-5 col-md-pull-4 col-lg-pull-4 text-right">
        <?php else: ?> <!-- even - left -->
                <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
        <?php endif; ?>

            <!-- Team Member Name -->
            <h4>
                <?php the_title(); ?>
            </h4>
            <!-- End Team Member Name -->
            <!-- Team Member Title & Role -->
            <h5>
                <?php the_field('title'); ?> : <?php the_field('role'); ?>
            </h5>
            <!-- End Team Member Title & Role -->
            <!-- Team Member Description -->
            <p>
                <?php 
                    get_template_part( 'people-entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); 
                ?>
            </p>
            <!-- End Team Member Description -->
        </div>
        <!-- End Team member description -->
    </div>
</div>