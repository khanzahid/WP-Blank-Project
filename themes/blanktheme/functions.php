<?php
//redirect target IP
function redirect_target_ip_func() {
    $user_ip = get_the_user_ip();

    if (strpos($user_ip, '77.29') === 0) {
        wp_redirect('https://google.com', 301);
        exit();
    }
}
add_action('template_redirect', 'redirect_target_ip_func');

function get_the_user_ip() {
    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
    	$ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    	$ip = $_SERVER['REMOTE_ADDR'];
    }
    return apply_filters( 'wpb_get_ip', $ip );
}

function wp_blank_theme_setup() {
	

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wp-blank-theme' ),
		)
	);
}

// Enqueue scripts and styles.

function wp_blank_theme_scripts() {
	wp_enqueue_style( 'wp-blank-theme-style', get_stylesheet_uri(), array(), '' );
	wp_enqueue_style( 'blanktheme-bootstrap-5', get_template_directory_uri().'/assets/css/bootstrap-5.min.css', array(), '' );

}
add_action( 'wp_enqueue_scripts', 'wp_blank_theme_scripts' );

// Register Custom Post Type Project
function create_project_cpt() {

	$labels = array(
		'name' => _x( 'Projects', 'Post Type General Name', 'blanktheme' ),
		'singular_name' => _x( 'Project', 'Post Type Singular Name', 'blanktheme' ),
		'menu_name' => _x( 'Projects', 'Admin Menu text', 'blanktheme' ),
		'name_admin_bar' => _x( 'Project', 'Add New on Toolbar', 'blanktheme' ),
		'archives' => __( 'Project Archives', 'blanktheme' ),
		'attributes' => __( 'Project Attributes', 'blanktheme' ),
		'parent_item_colon' => __( 'Parent Project:', 'blanktheme' ),
		'all_items' => __( 'All Projects', 'blanktheme' ),
		'add_new_item' => __( 'Add New Project', 'blanktheme' ),
		'add_new' => __( 'Add New', 'blanktheme' ),
		'new_item' => __( 'New Project', 'blanktheme' ),
		'edit_item' => __( 'Edit Project', 'blanktheme' ),
		'update_item' => __( 'Update Project', 'blanktheme' ),
		'view_item' => __( 'View Project', 'blanktheme' ),
		'view_items' => __( 'View Projects', 'blanktheme' ),
		'search_items' => __( 'Search Project', 'blanktheme' ),
		'not_found' => __( 'Not found', 'blanktheme' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'blanktheme' ),
		'featured_image' => __( 'Featured Image', 'blanktheme' ),
		'set_featured_image' => __( 'Set featured image', 'blanktheme' ),
		'remove_featured_image' => __( 'Remove featured image', 'blanktheme' ),
		'use_featured_image' => __( 'Use as featured image', 'blanktheme' ),
		'insert_into_item' => __( 'Insert into Project', 'blanktheme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'blanktheme' ),
		'items_list' => __( 'Projects list', 'blanktheme' ),
		'items_list_navigation' => __( 'Projects list navigation', 'blanktheme' ),
		'filter_items_list' => __( 'Filter Projects list', 'blanktheme' ),
	);
	$args = array(
		'label' => __( 'Project', 'blanktheme' ),
		'description' => __( 'Projects', 'blanktheme' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-page',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'author', 'page-attributes'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'projects','with_front' => false),
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'projects', $args );

}
add_action( 'init', 'create_project_cpt', 0 );

// Register Taxonomy Project Type
function projecttype_taxonomy() {

	$labels = array(
		'name'              => _x( 'Project Types', 'taxonomy general name'),
		'singular_name'     => _x( 'Project Type', 'taxonomy singular name'),
		'search_items'      => __( 'Search Project Types'),
		'all_items'         => __( 'All Project Types'),
		'parent_item'       => __( 'Parent Project Type'),
		'parent_item_colon' => __( 'Parent Project Type:'),
		'edit_item'         => __( 'Edit Project Type'),
		'update_item'       => __( 'Update Project Type'),
		'add_new_item'      => __( 'Add New Project Type'),
		'new_item_name'     => __( 'New Project Type Name'),
		'menu_name'         => __( 'Project Type'),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Project Type'),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy( 'projecttype', 'projects', $args );

}
add_action( 'init', 'projecttype_taxonomy' );

function wp_custom_pagination($args = [], $class = 'pagination') {

	if ($GLOBALS['wp_query']->max_num_pages <= 1) return;

	    $args = wp_parse_args( $args, [
	        'mid_size'                   => 2,
	        'prev_next'                  => false,
	        'next_text'                  => __('Previous', 'blanktheme'),
	        'prev_text'                  => __('Next', 'blanktheme'),
	        'screen_reader_text' => __('', 'blanktheme'),
	]);

	$links       = paginate_links($args);
	$next_link = get_previous_posts_link($args['next_text']);
	$prev_link = get_next_posts_link($args['prev_text']);
	$check_prev = (!empty($prev_link))?$prev_link:'Next';
	$check_next = (!empty($next_link))?$next_link:'Previous';
	$template    = apply_filters( 'navigation_markup_template', '
	<div class="container"><div class= "row"><div style="display: flex;justify-content: space-around; align-items: center;" class="paginatin d-flex justify-content-between align-items-center"><div class="col-auto">
	    <button type="button" class="btn btn-outline-info" >%5$s</button>
	</div>
	<div class="col-auto">
	    <nav class="zk-paginatin navigation %1$s" role="navigation">
	            <h2 class="screen-reader-text">%2$s</h2>
	            <ul class="pagination mb-0 text-dark">
	                <li class="page-item">%4$s</li>
	            </ul>
	    </nav>
	</div>
	<div class="col-auto">
	   <button type="button" class="btn btn-primary btn-outline-info">%3$s</button>
	</div></div></div><div>', $args, $class);

	echo sprintf($template, $class, $args['screen_reader_text'], $check_next, $links, $check_prev);

}

// Projects Ajax request

add_action( 'wp_ajax_nopriv_get_project_func', 'get_project_func' );
add_action( 'wp_ajax_get_project_func', 'get_project_func' );

function get_project_func() {

    $logined = (is_user_logged_in()) ? 6 : 3;
    $args = array(
        'post_type'      => 'projects',
        'posts_per_page' => $logined,
        'tax_query'      => array(
            array(
                'taxonomy' => 'projecttype',
                'field'    => 'slug',
                'terms'    => 'architecture',
            ),
        ),
    );

    $projects = new WP_Query( $args );
    $data = array();
    while ( $projects->have_posts() ) { $projects->the_post();
        $data[] = array(
            'id'    => get_the_ID(),
            'title' => get_the_title(),
            'link'  => get_permalink(),
        );
    }

    wp_reset_postdata();

    wp_send_json_success( $data );
}
