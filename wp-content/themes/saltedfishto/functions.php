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
		'primary' => "Header",
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
			'id' => 'sidebar-widget',
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
			'id' => 'footer-widget',
			'description' => 'Footer Widget Area'
		)
	);
}
add_action( 'widgets_init', 'saltedfishto_widget_areas' );

// modify wp_nav_menu
if (!class_exists('Saltedfishto_Sub_Menu')) {
	class Saltedfishto_Nav_Menu extends Walker_Nav_Menu
	{
		//Overwrite display_element function to add has_children attribute. Not needed in >= Wordpress 3.4
		/**
		 * @link https://gist.github.com/duanecilliers/1817371 copy from this url
		 */
		function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
		{
			if (!$element)
				return;
			$id_field = $this->db_fields['id'];
	
			//display this element
			if (is_array($args[0]))
				$args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
			else if (is_object($args[0]))
				$args[0]->has_children = !empty($children_elements[$element->$id_field]);
			$cb_args = array_merge(array(&$output, $element, $depth), $args);
			call_user_func_array(array(&$this, 'start_el'), $cb_args);
	
			$id = $element->$id_field;
	
			// descend only when the depth is right and there are childrens for this element
			if (($max_depth == 0 || $max_depth > $depth + 1) && isset($children_elements[$id])) {
				foreach ($children_elements[$id] as $child) {
	
					if (!isset($newlevel)) {
						$newlevel = true;
						//start the child delimiter
						$cb_args = array_merge(array(&$output, $depth), $args);
						call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
					}
					$this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
				}
				unset($children_elements[$id]);
			}
	
			if (isset($newlevel) && $newlevel) {
				//end the child delimiter
				$cb_args = array_merge(array(&$output, $depth), $args);
				call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
			}
	
			//end this element
			$cb_args = array_merge(array(&$output, $element, $depth), $args);
			call_user_func_array(array(&$this, 'end_el'), $cb_args);
		}// display_element
	
	
		/**
		 * @link https://gist.github.com/duanecilliers/1817371 copy from this url
		 */
		public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) 
		{
			if ((is_object($item) && $item->title == null) || (!is_object($item))) {
				return ;
			}
			
			$indent = ($depth) ? str_repeat("\t", $depth) : '';
	
			$li_attributes = '';
			$class_names = $value = '';
	
			$classes = empty($item->classes) ? array() : (array) $item->classes;
			//Add class and attribute to LI element that contains a submenu UL.
			if (is_object($args) && $args->has_children) {
				$classes[] = 'dropdown';
			}
			$classes[] = 'menu-item-' . $item->ID;
			//If we are on the current page, add the active class to that menu item.
			//$classes[] = ($item->current) ? 'active' : '';
	
			//Make sure you still add all of the WordPress classes.
			$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
			$class_names = ' class="' . esc_attr($class_names) . ' nav-item"';
	
			$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
			$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
	
			$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
	
			//Add attributes to link element.
			$args_classes = array('nav-link');
			$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
			$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
			$attributes .= !empty($item->url) ? ' href="' . ((is_object($args) && $args->has_children) ? '#' : esc_attr($item->url)) . '"' : '';
			$attributes .= (is_object($args) && $args->has_children) ? ' role="button" data-bs-toggle="dropdown" aria-expanded="false"' : '';
			
			$args_classes[] = $item->current ? 'active' : '';
			$args_classes[] = (is_object($args) && $args->has_children) ? 'dropdown-toggle' : '';
			$args_class_names = join(' ', array_filter($args_classes));
			$args_class_names = ' class="' . esc_attr($args_class_names) . '"';
			
			$item_output = (is_object($args)) ? $args->before : '';
			$item_output .= '<a' . $attributes . $args_class_names . '>';
			$item_output .= (is_object($args) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (is_object($args) ? $args->link_after : '');
			$item_output .= '</a>';
			$item_output .= (is_object($args) ? $args->after : '');
	
			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		}// start_el
	
	
		public function start_lvl(&$output, $depth = 0, $args = array()) 
		{
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"sub-menu dropdown-menu\">\n";
		}
	}
}

// add header image
$args = array(
    'flex-width'    => true,
    'width'         => 1280,
    'flex-height'   => true,
    'height'        => 400,
    'default-image' => get_template_directory_uri() . '/assets/images/header.gif',
);
add_theme_support( 'custom-header', $args );

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );