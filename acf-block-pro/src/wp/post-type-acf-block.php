<?php

if ( ! function_exists('registerPostType') ) {

// Register Custom Post Type
function registerPostType() {

	$labels = array(
		'name'                  => _x( 'ACF Blocks', 'Post Type General Name', 'acf-block-pro' ),
		'singular_name'         => _x( 'ACF Block', 'Post Type Singular Name', 'acf-block-pro' ),
		'menu_name'             => __( 'ACF Blocks', 'acf-block-pro' ),
		'name_admin_bar'        => __( 'ACF Blocks', 'acf-block-pro' ),
		'archives'              => __( 'Item Archives', 'acf-block-pro' ),
		'attributes'            => __( 'Item Attributes', 'acf-block-pro' ),
		'parent_item_colon'     => __( 'Parent Item:', 'acf-block-pro' ),
		'all_items'             => __( 'All Blocks', 'acf-block-pro' ),
		'add_new_item'          => __( 'Add New Item', 'acf-block-pro' ),
		'add_new'               => __( 'Add Block', 'acf-block-pro' ),
		'new_item'              => __( 'New ACF Block', 'acf-block-pro' ),
		'edit_item'             => __( 'Edit ACF Block', 'acf-block-pro' ),
		'update_item'           => __( 'Update Item', 'acf-block-pro' ),
		'view_item'             => __( 'View Item', 'acf-block-pro' ),
		'view_items'            => __( 'View Items', 'acf-block-pro' ),
		'search_items'          => __( 'Search Item', 'acf-block-pro' ),
		'not_found'             => __( 'Not found', 'acf-block-pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'acf-block-pro' ),
		'featured_image'        => __( 'Featured Image', 'acf-block-pro' ),
		'set_featured_image'    => __( 'Set featured image', 'acf-block-pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'acf-block-pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'acf-block-pro' ),
		'insert_into_item'      => __( 'Insert into item', 'acf-block-pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'acf-block-pro' ),
		'items_list'            => __( 'Items list', 'acf-block-pro' ),
		'items_list_navigation' => __( 'Items list navigation', 'acf-block-pro' ),
		'filter_items_list'     => __( 'Filter items list', 'acf-block-pro' ),
	);
	$args = array(
		'label'                 => __( 'ACF Block', 'acf-block-pro' ),
		'description'           => __( 'Create an ACF block for the Gutenberg editor.', 'acf-block-pro' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 75,
		'menu_icon'             => 'dashicons-grid-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'acf-block', $args );

}

add_action( 'init', 'registerPostType', 0 );

}
