<?php
if( !function_exists('pchc_list_child_pages') ) {
  function pchc_list_child_pages( $atts ) {
    $a = shortcode_atts(array(
      'orderby' => 'menu_order',
      'order' => 'DESC'
    ), $atts );

    global $post;
    $gantry = Gantry\Framework\Gantry::instance();
    $theme  = $gantry['theme'];

    if( is_page() && $post->post_parent ){
      //
    } else {
      $context              = Timber::get_context();

      // WP_Query arguments
      $args = array (
      	'post_parent'            => $post->ID,
      	'post_type'              => array( 'page' ),
      	'post_status'            => array( 'publish' ),
      	'order'                  => $a['order'],
      	'orderby'                => $a['orderby'],
      );

      $context['posts']      = Timber::get_posts($args);
      //$context['pagination'] = Timber::get_pagination();

      $templates = ['listpages.html.twig'];

      Timber::render($templates, $context);
    }

  }

  add_shortcode('pchc_childpages', 'pchc_list_child_pages');
}
