<?php

// add title
function saltedfishto_theme_support() {
	// add title tag
	add_theme_support( 'title-tag' );
	// add logo in theme
	add_theme_support( 'custom-logo' );
	// add thumbnail in page
	add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme', 'saltedfishto_theme_support');

// add menu
function saltedfishto_menus() {
	$locations = array(
		'primary' => "Desktop Primary Left Sidebar",
		'footer' => "Footer Menu Items"
	);
	register_nav_menus( $locations );
}
add_action('init', 'saltedfishto_menus');

// add css
function saltedfishto_register_styles() {
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style( 'saltedfishto-bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.1.3', 'all' );
	wp_enqueue_style( 'saltedfishto-style', get_stylesheet_uri(), array('saltedfishto-bootstrap-style'), $version, 'all' );
}
add_action( 'wp_enqueue_scripts', 'saltedfishto_register_styles' );

// add js
function saltedfishto_register_scripts() {
	wp_enqueue_script( 'saltedfishto-jquery-script', get_stylesheet_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array(), '3.6.0', true );
	wp_enqueue_script( 'saltedfishto-bootstrap-script', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '5.1.3', true );
	wp_enqueue_script( 'saltedfishto-fontawesome-script', get_stylesheet_directory_uri() . '/assets/js/fontawesome/all.min.js', array(), '6.1.1', true );
	wp_enqueue_script( 'saltedfishto-main-script', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'saltedfishto_register_scripts' );

// add widget
function saltedfishto_widget_areas() {
	register_sidebar(
		array(
			'before_title' => '<h2>',
			'after_title' => '</h2>',
			'before_widget' => '',
			'after_widget' => '',
			'name' => 'Sidebar Area',
			'id' => 'sidebar-1',
			'description' => 'Sidebar Widget Area'
		)
	);
	register_sidebar(
		array(
			'before_title' => '<h2>',
			'after_title' => '</h2>',
			'before_widget' => '',
			'after_widget' => '',
			'name' => 'Footer Area',
			'id' => 'footer-1',
			'description' => 'Footer Widget Area'
		)
	);
}
add_action( 'widgets_init', 'saltedfishto_widget_areas' );