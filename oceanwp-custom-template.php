 function custom_post_layout_class( $class ) {

	// Alter your layout
	if ( is_singular( 'sfwd-topic' )
		|| is_singular( 'sfwd-lesson' )
		|| is_singular( 'sfwd-quiz' ) ) {
		$class = 'full-width';
	}

	// Return correct class
	return $class;

}
add_filter( 'ocean_post_layout_class', 'custom_post_layout_class', 20 );
