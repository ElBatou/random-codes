function extra_oceanwp_metabox( $types ) {

	// Your custom post type
	$types[] = 'info';
	$types[] = 'job_listing';

	// Return
	return $types;

}
add_filter( 'ocean_main_metaboxes_post_types', 'extra_oceanwp_metabox', 20 );
