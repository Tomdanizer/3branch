<?php

add_action( 'after_setup_theme', 'threebranch_setup' );

function threebranch_setup()

{

    load_theme_textdomain( 'threebranch', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'post-thumbnails' );

    global $content_width;

    if ( ! isset( $content_width ) ) $content_width = 640;

    register_nav_menus(

        array( 'main-menu' => __( 'Main Menu' ) )

    );

}

add_action( 'wp_enqueue_scripts', 'threebranch_load_scripts' );

function threebranch_load_scripts()

{

    wp_enqueue_script( 'jquery' );

}

add_action( 'comment_form_before', 'threebranch_enqueue_comment_reply_script' );

function threebranch_enqueue_comment_reply_script()

{

    if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }

}

add_filter( 'the_title', 'threebranch_title' );

function threebranch_title( $title ) {

    if ( $title == '' ) {

        return '&rarr;';

    } 

    else {

        return $title;

    }

}

add_filter( 'wp_title', 'threebranch_filter_wp_title' );

function threebranch_filter_wp_title( $title )

{

    return $title . esc_attr( get_bloginfo( 'name' ) );

}

add_action( 'widgets_init', 'threebranch_widgets_init' );

function threebranch_widgets_init()

{

    register_sidebar( array (

    'name' => __( 'Sidebar Widget Area', 'threebranch' ),

    'id' => 'primary-widget-area',

    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

    'after_widget' => "</li>",

    'before_title' => '<h3 class="widget-title">',

    'after_title' => '</h3>',

    ) );

}

function threebranch_custom_pings( $comment )

{

    $GLOBALS['comment'] = $comment;

    ?>

    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>

    <?php 

}

add_filter( 'get_comments_number', 'threebranch_comments_number' );

function threebranch_comments_number( $count )

{

    if ( !is_admin() ) {

        global $id;

        $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );

        return count( $comments_by_type['comment'] );

    } else {

        return $count;

    }

}





 

add_action( 'after_setup_theme', 'bootstrap_setup' );

 

if ( ! function_exists( 'bootstrap_setup' ) ):



	function bootstrap_setup(){



		add_action( 'init', 'register_menu' );

			

		function register_menu(){

			register_nav_menu( 'top-bar', 'Bootstrap Top Menu' ); 

		}



		class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {



			

			function start_lvl( &$output, $depth ) {



				$indent = str_repeat( "\t", $depth );

				$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";

				

			}



			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

				

				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';



				$li_attributes = '';

				$class_names = $value = '';



				$classes = empty( $item->classes ) ? array() : (array) $item->classes;

				$classes[] = ($args->has_children) ? 'dropdown' : '';

				$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';

				$classes[] = 'menu-item-' . $item->ID;





				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

				$class_names = ' class="' . esc_attr( $class_names ) . '"';



				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';



				$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';



				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';

				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

				$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';



				$item_output = $args->before;

				$item_output .= '<a'. $attributes .'>';

				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

				$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';

				$item_output .= $args->after;



				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

			}



			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

				

				if ( !$element )

					return;

				

				$id_field = $this->db_fields['id'];



				//display this element

				if ( is_array( $args[0] ) ) 

					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );

				else if ( is_object( $args[0] ) ) 

					$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 

				$cb_args = array_merge( array(&$output, $element, $depth), $args);

				call_user_func_array(array(&$this, 'start_el'), $cb_args);



				$id = $element->$id_field;



				// descend only when the depth is right and there are childrens for this element

				if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {



					foreach( $children_elements[ $id ] as $child ){



						if ( !isset($newlevel) ) {

							$newlevel = true;

							//start the child delimiter

							$cb_args = array_merge( array(&$output, $depth), $args);

							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);

						}

						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );

					}

						unset( $children_elements[ $id ] );

				}



				if ( isset($newlevel) && $newlevel ){

					//end the child delimiter

					$cb_args = array_merge( array(&$output, $depth), $args);

					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);

				}



				//end this element

				$cb_args = array_merge( array(&$output, $element, $depth), $args);

				call_user_func_array(array(&$this, 'end_el'), $cb_args);

				

			}

			

		}



	}



endif;





add_action('init', 'cptui_register_my_cpt_beers');

function cptui_register_my_cpt_beers() {

register_post_type('beers', array(

'label' => 'Beers',

'description' => '',

'public' => true,

'show_ui' => true,

'show_in_menu' => true,

'capability_type' => 'post',

'map_meta_cap' => true,

'hierarchical' => false,

'rewrite' => array('slug' => 'beers', 'with_front' => true),

'query_var' => true,

'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),

'taxonomies' => array('styles'),

'labels' => array (

  'name' => 'Beers',

  'singular_name' => 'Beer',

  'menu_name' => 'Beers',

  'add_new' => 'Add Beer',

  'add_new_item' => 'Add New Beer',

  'edit' => 'Edit',

  'edit_item' => 'Edit Beer',

  'new_item' => 'New Beer',

  'all_items' => 'All Beers',

  'view' => 'View Beer',

  'view_item' => 'View Beer',

  'search_items' => 'Search Beers',

  'not_found' => 'No Beers Found',

  'not_found_in_trash' => 'No Beers Found in Trash',

  'parent' => 'Parent Beer',

)

) ); }



// Register Custom Taxonomy

function custom_taxonomy() {



	$labels = array(

		'name'                       => _x( 'Styles', 'Taxonomy General Name', 'text_domain' ),

		'singular_name'              => _x( 'Style', 'Taxonomy Singular Name', 'text_domain' ),

		'menu_name'                  => __( 'Styles', 'text_domain' ),

		'all_items'                  => __( 'All Items', 'text_domain' ),

		'parent_item'                => __( 'Parent Item', 'text_domain' ),

		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),

		'new_item_name'              => __( 'New Item Name', 'text_domain' ),

		'add_new_item'               => __( 'Add New Item', 'text_domain' ),

		'edit_item'                  => __( 'Edit Item', 'text_domain' ),

		'update_item'                => __( 'Update Item', 'text_domain' ),

		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),

		'search_items'               => __( 'Search Items', 'text_domain' ),

		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),

		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),

		'not_found'                  => __( 'Not Found', 'text_domain' ),

	);

	$args = array(

		'labels'                     => $labels,

		'hierarchical'               => true,

		'public'                     => true,

		'show_ui'                    => true,

		'show_admin_column'          => true,

		'show_in_nav_menus'          => true,

		'show_tagcloud'              => true,

	);

	register_taxonomy( 'styles', array( 'beers' ), $args );



}



// Hook into the 'init' action

add_action( 'init', 'custom_taxonomy', 0 );
add_theme_support( 'post-thumbnails' ); 