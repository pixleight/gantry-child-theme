<?php

namespace KSC\CustomPosts;

add_action( 'init', __NAMESPACE__ . '\\register_cabins' );
function register_cabins() {
	$labels = array(
		"name" => __( 'Cabins', '' ),
		"singular_name" => __( 'Cabin', '' ),
		);

	$args = array(
		"label" => __( 'Cabins', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "cabin", "with_front" => true ),
		"query_var" => true,

		"supports" => array( "title", "editor", "custom-fields", "revisions", "thumbnail", "page-attributes" ),
	);
	register_post_type( "cabin", $args );

// End of cptui_register_my_cpts()
}

add_action( 'init', __NAMESPACE__ . '\\register_cabin_taxes' );
function register_cabin_taxes() {
	$labels = array(
		"name" => __( 'Cabin Types', '' ),
		"singular_name" => __( 'Cabin Type', '' ),
		);

	$args = array(
		"label" => __( 'Cabin Types', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => 0,
		"label" => "Cabin Types",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'cabin_types', 'with_front' => false ),
		"show_admin_column" => 0,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "cabin_types", array( "cabin" ), $args );

// End cptui_register_my_taxes()
}
