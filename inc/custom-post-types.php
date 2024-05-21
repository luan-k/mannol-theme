<?php

function create_posttype() {

    register_post_type( 'produtos',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Produtos' ),
                'singular_name' => __( 'Produto' )
            ),
            'public'              => true,
			'menu_icon'           => 'dashicons-products',
            'has_archive'         => true,
            'rewrite'             => array('slug' => 'produtos'),
            'show_in_rest'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'taxonomies' => array( 'category' ),
			'capability_type'     => 'post',
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail',  'revisions', 'custom-fields', ),

        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
