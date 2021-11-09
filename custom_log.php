function custom_logs( $message ) {
    if ( is_array( $message ) ) {
        $message = json_encode( $message );
    }
    $file = fopen( "../custom_logs.log", "a" );
    echo fwrite( $file, "\n" . date( 'Y-m-d h:i:s' ) . " :: " . print_r( $message, true ) );
    fclose( $file );
}
