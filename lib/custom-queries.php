<?php
namespace KSC\CustomQueries;

function alter_query($query) {
	//gets the global query var object
	global $wp_query;

  // Get outta here if we're not altering the main query
  if ( !$query->is_main_query() )
		return;

	if ( !$wp_query->query_vars['post_type'] == 'cabin' && !$wp_query->is_archive() )
		return;

  if( $wp_query->is_archive() ) { // Post archives
    if( $wp_query->query_vars['post_type'] == 'cabin' ) {
      // Cabin post type
      $query-> set('nopaging', true);
    	$query-> set('posts_per_page',-1);
    	$query-> set('posts_per_archive_page',-1);
      $query-> set('orderby','title');
      $query-> set('order','ASC');
    }
  }

	//we remove the actions hooked on the '__after_loop' (post navigation)
	remove_all_actions ( '__after_loop');
}
add_action('pre_get_posts', __NAMESPACE__ . '\\alter_query');
