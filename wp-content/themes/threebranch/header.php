<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( ' | ', true, 'right' ); ?></title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
 <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css" />
 <link rel="stylesheet" type="text/css" href="/css/owl.theme.default.min.css" />
 <link rel="stylesheet" type="text/css" href="/css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="/css/animate.css" />
<link rel="stylesheet" type="text/css" href="/css/jquery.fullPage.css" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrapper" class="hfeed">
          <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                 <!-- <img id="logo" src="images/3branchlogo.jpg"> -->
                 
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#threebranch_main_menu">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  <img id="logo-header" src="http://3branchbrewing.com/wp/wp-content/uploads/2014/08/3branchlogoheaderwhite.png">
                  </div>
              </div>
          
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div id="threebranch_main_menu" class="collapse navbar-collapse">
<!--                 <div id="search">
                    <?php get_search_form(); ?>
                </div> -->
                <?php wp_nav_menu( array( 
'container'       => '',
'theme_location' => 'main-menu', 
'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
'walker'	 => new Bootstrap_Walker_Nav_Menu()
) ); ?>
                </div>
                 </div><!-- /.container-fluid -->
            </nav>
       