<?php
/*
 * You can create your own template by placing a copy of this file on yourtheme/plugins/wp-embed-fb/
 * to access all fb data print_r($fb_data)
 */
 $width_out = $width;
 $width = $width_out - 20;
 $height = $width * $prop;
 $show_posts = get_option("wpemfb_show_posts") == "true" ? true : false;
 //\\print_r($fb_data)
 //$wp_emb_fbsdk = WP_Embed_FB::$fbsdk;
?>


    <?php if($show_posts) :  ?>
        <?php foreach($fb_data['posts']['data'] as $fbpost) : ?>
             <?php if(isset($fbpost['picture']) or $fbpost['message']) : ?>
                <div class="row fbpost">
                <?php $link = explode("_", $fbpost['id']) ?>
                
                    <?php if(isset($fbpost['picture'])) : ?>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <a  href="<?php echo "https://www.facebook.com/".$link[0]."/posts/".$link[1] ?>" target="_blank" rel="nofollow">
                                <img src="<?php echo $fbpost['picture'] ?>" />
                            </a>
                        </div>
                    <?php endif; ?>
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <div>
                                <!-- TODO This could be done better -->
                                    <?php echo substr($fbpost['created_time'],0,10) ?>
                            </div>
                             <span ><?php echo make_clickable($fbpost['message']) ?></span>
                         </div>
                </div>  
                <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
