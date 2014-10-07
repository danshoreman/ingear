<?php

// Add custom functions
require_once( 'includes/custom-functions.php' ); 


// Add theme support
add_theme_support('post-thumbnails');

// wp custom background (thx to @bransonwerner for update)
add_theme_support( 'custom-background',
    array(
    'default-image' => '',    // background image default
    'default-color' => '',    // background color default (dont add the #)
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
    )
);

// rss thingy
add_theme_support('automatic-feed-links');

// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

// adding post format support
add_theme_support( 'post-formats',
	array(
		'aside',             // title less blurb
		'gallery',           // gallery of images
		'link',              // quick link to other site
		'image',             // an image
		'quote',             // a quick quote
		'status',            // a Facebook like status update
		'video',             // video
		'audio',             // audio
		'chat'               // chat transcript
	)
);

// wp menus
add_theme_support( 'menus' );


// Add image sizes
add_image_size( 'thumbnail', 200, 200, true );
add_image_size( 'image', 700, 350, true );


// Register our sidebars and widgetized areas.
function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'main-sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

// Change default excerpt
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );