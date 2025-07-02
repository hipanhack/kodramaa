<?php
// series type
function series() {

	$labels = array(
		'name'                => _x( 'Series', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Series', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Series', 'text_domain' ),
		'name_admin_bar'      => __( 'Series', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Series:', 'text_domain' ),
		'all_items'           => __( 'All Series', 'text_domain' ),
		'add_new_item'        => __( 'Add New Series', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Series', 'text_domain' ),
		'edit_item'           => __( 'Edit Series', 'text_domain' ),
		'update_item'         => __( 'Update Series', 'text_domain' ),
		'view_item'           => __( 'View Series', 'text_domain' ),
		'search_items'        => __( 'Search Series', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Series', 'text_domain' ),
		'description'         => __( 'Series', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', ),
		'taxonomies'          => array( 'genres','post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-video',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'anime', $args );

}
add_action( 'init', 'series', 0 );

// blog type
function blog() {

	$labels = array(
		'name'                => _x( 'Blogs', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Blogs', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Blogs', 'text_domain' ),
		'name_admin_bar'      => __( 'Blogs', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Blog:', 'text_domain' ),
		'all_items'           => __( 'All Blogs', 'text_domain' ),
		'add_new_item'        => __( 'Add New Blog', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Blog', 'text_domain' ),
		'edit_item'           => __( 'Edit Blog', 'text_domain' ),
		'update_item'         => __( 'Update Blog', 'text_domain' ),
		'view_item'           => __( 'View Blog', 'text_domain' ),
		'search_items'        => __( 'Search Blog', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Blogs', 'text_domain' ),
		'description'         => __( 'Blogs', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', ),
		'taxonomies'          => array( 'label' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-write-blog',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'blog', $args );

}
add_action( 'init', 'blog', 0 );

// labels taxonomy
function label() {

	$labels = array(
		'name'                       => _x( 'Labels', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Labels', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Labels', 'text_domain' ),
		'all_items'                  => __( 'All Labels', 'text_domain' ),
		'parent_item'                => __( 'Parent Label', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Label:', 'text_domain' ),
		'new_item_name'              => __( 'New Label Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Label', 'text_domain' ),
		'edit_item'                  => __( 'Edit Label', 'text_domain' ),
		'update_item'                => __( 'Update Label', 'text_domain' ),
		'view_item'                  => __( 'View Label', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate genres with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove labels', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Labels', 'text_domain' ),
		'search_items'               => __( 'Search Labels', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'label', array( 'blog' ), $args );

}
add_action( 'init', 'label', 0 );

// genres taxonomy
function genres() {

	$labels = array(
		'name'                       => _x( 'Genres', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Genres', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Genres', 'text_domain' ),
		'all_items'                  => __( 'All Genres', 'text_domain' ),
		'parent_item'                => __( 'Parent Genre', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Genre:', 'text_domain' ),
		'new_item_name'              => __( 'New Genre Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Genre', 'text_domain' ),
		'edit_item'                  => __( 'Edit Genre', 'text_domain' ),
		'update_item'                => __( 'Update Genre', 'text_domain' ),
		'view_item'                  => __( 'View Genre', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate genres with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove genres', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Genres', 'text_domain' ),
		'search_items'               => __( 'Search Genres', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'genres', array( 'anime' ), $args );

}
add_action( 'init', 'genres', 0 );

function studio() {

	$labels = array(
		'name'                       => _x( 'Studio', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Studio', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Studio', 'text_domain' ),
		'all_items'                  => __( 'All Studio', 'text_domain' ),
		'parent_item'                => __( 'Parent Studio', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Studio:', 'text_domain' ),
		'new_item_name'              => __( 'New Studio Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Studio', 'text_domain' ),
		'edit_item'                  => __( 'Edit Studio', 'text_domain' ),
		'update_item'                => __( 'Update Studio', 'text_domain' ),
		'view_item'                  => __( 'View Studio', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate studio with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove studio', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Studio', 'text_domain' ),
		'search_items'               => __( 'Search Studio', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'studio', array( 'anime' ), $args );

}
add_action( 'init', 'studio', 0 );

function season() { 

    $labels = array( 
        'name'                       => _x( 'Season', 'Taxonomy General Name', 'text_domain' ), 
        'singular_name'              => _x( 'Season', 'Taxonomy Singular Name', 'text_domain' ), 
        'menu_name'                  => __( 'Season', 'text_domain' ), 
        'all_items'                  => __( 'All Season', 'text_domain' ), 
        'parent_item'                => __( 'Parent Season', 'text_domain' ), 
        'parent_item_colon'          => __( 'Parent Season:', 'text_domain' ), 
        'new_item_name'              => __( 'New Season Name', 'text_domain' ), 
        'add_new_item'               => __( 'Add New Season', 'text_domain' ), 
        'edit_item'                  => __( 'Edit Season', 'text_domain' ), 
        'update_item'                => __( 'Update Season', 'text_domain' ), 
        'separate_items_with_commas' => __( 'Separate Season with commas', 'text_domain' ), 
        'search_items'               => __( 'Search Season', 'text_domain' ), 
        'add_or_remove_items'        => __( 'Add or remove season', 'text_domain' ), 
        'choose_from_most_used'      => __( 'Choose from the most used season', 'text_domain' ), 
        'not_found'                  => __( 'Not Found', 'text_domain' ), 
    ); 
    $args = array( 
        'labels'                     => $labels, 
        'hierarchical'               => false, 
        'public'                     => true, 
        'show_ui'                    => true, 
        'show_admin_column'          => true, 
        'show_in_nav_menus'          => true, 
        'show_tagcloud'              => true, 
    ); 
    register_taxonomy( 'season', array( 'anime' ), $args ); 

} 

// Hook into the 'init' action 
add_action( 'init', 'season', 0 ); 

function director()
{
    $labels = array(
        'name' => _x('Director', 'Taxonomy General Name', 'text_domain'),
        'singular_name' => _x('Director', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name' => __('Director', 'text_domain'),
        'all_items' => __('All Director', 'text_domain'),
        'parent_item' => __('Parent Director', 'text_domain'),
        'parent_item_colon' => __('Parent Director:', 'text_domain'),
        'new_item_name' => __('New Director Name', 'text_domain'),
        'add_new_item' => __('Add New Director', 'text_domain'),
        'edit_item' => __('Edit Director', 'text_domain'),
        'update_item' => __('Update Director', 'text_domain'),
        'separate_items_with_commas' => __('Separate Director with commas', 'text_domain'),
        'search_items' => __('Search Director', 'text_domain'),
        'add_or_remove_items' => __('Add or remove director', 'text_domain'),
        'choose_from_most_used' => __('Choose from the most used director', 'text_domain'),
        'not_found' => __('Not Found', 'text_domain')
    );
    $args   = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true
    );
    register_taxonomy('director', array(
        'anime'
    ), $args);
}
add_action('init', 'director', 0);

function cast()
{
    $labels = array(
        'name' => _x('Cast', 'Taxonomy General Name', 'text_domain'),
        'singular_name' => _x('Cast', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name' => __('Cast', 'text_domain'),
        'all_items' => __('All Cast', 'text_domain'),
        'parent_item' => __('Parent Cast', 'text_domain'),
        'parent_item_colon' => __('Parent Cast:', 'text_domain'),
        'new_item_name' => __('New Cast Name', 'text_domain'),
        'add_new_item' => __('Add New Cast', 'text_domain'),
        'edit_item' => __('Edit Cast', 'text_domain'),
        'update_item' => __('Update Cast', 'text_domain'),
        'separate_items_with_commas' => __('Separate Cast with commas', 'text_domain'),
        'search_items' => __('Search Cast', 'text_domain'),
        'add_or_remove_items' => __('Add or remove cast', 'text_domain'),
        'choose_from_most_used' => __('Choose from the most used cast', 'text_domain'),
        'not_found' => __('Not Found', 'text_domain')
    );
    $args   = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true
    );
    register_taxonomy('cast', array(
        'anime'
    ), $args);
}
add_action('init', 'cast', 0);

function network()
{
    $labels = array(
        'name' => _x('Network', 'Taxonomy General Name', 'text_domain'),
        'singular_name' => _x('Network', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name' => __('Network', 'text_domain'),
        'all_items' => __('All Network', 'text_domain'),
        'parent_item' => __('Parent Network', 'text_domain'),
        'parent_item_colon' => __('Parent Network:', 'text_domain'),
        'new_item_name' => __('New Network Name', 'text_domain'),
        'add_new_item' => __('Add New Network', 'text_domain'),
        'edit_item' => __('Edit Network', 'text_domain'),
        'update_item' => __('Update Network', 'text_domain'),
        'separate_items_with_commas' => __('Separate Network with commas', 'text_domain'),
        'search_items' => __('Search Network', 'text_domain'),
        'add_or_remove_items' => __('Add or remove network', 'text_domain'),
        'choose_from_most_used' => __('Choose from the most used network', 'text_domain'),
        'not_found' => __('Not Found', 'text_domain')
    );
    $args   = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true
    );
    register_taxonomy('network', array(
        'anime'
    ), $args);
}
add_action('init', 'network', 0);

function country()
{
    $labels = array(
        'name' => _x('Country', 'Taxonomy General Name', 'text_domain'),
        'singular_name' => _x('Country', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name' => __('Country', 'text_domain'),
        'all_items' => __('All Country', 'text_domain'),
        'parent_item' => __('Parent Country', 'text_domain'),
        'parent_item_colon' => __('Parent Country:', 'text_domain'),
        'new_item_name' => __('New Country Name', 'text_domain'),
        'add_new_item' => __('Add New Country', 'text_domain'),
        'edit_item' => __('Edit Country', 'text_domain'),
        'update_item' => __('Update Country', 'text_domain'),
        'separate_items_with_commas' => __('Separate Country with commas', 'text_domain'),
        'search_items' => __('Search Country', 'text_domain'),
        'add_or_remove_items' => __('Add or remove country', 'text_domain'),
        'choose_from_most_used' => __('Choose from the most used country', 'text_domain'),
        'not_found' => __('Not Found', 'text_domain')
    );
    $args   = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true
    );
    register_taxonomy('country', array(
        'anime'
    ), $args);
}
add_action('init', 'country', 0);