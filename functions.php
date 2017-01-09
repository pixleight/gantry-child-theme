<?php
/**
 * Indludes
 *
 * Loads necessary include files.
 */

$ksc_includes = [
  'lib/custom-posts.php',     // Declare custom posts
  'lib/custom-queries.php',   // Alter the main query
  'lib/config.php',           // Configuration
];

foreach( $ksc_includes as $file ) {
  if( !$filepath = locate_template($file) ) {
    trigger_error( sprintf( __( 'Error locating %s for inclusion', 'g5_helium-child'), $file ), E_USER_ERROR);
  }

  require_once $filepath;
}

unset($file, $filepath);
