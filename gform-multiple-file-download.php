add_filter( 'gform_notification', 'rw_notification_attachments', 10, 3 );
function rw_notification_attachments( $notification, $form, $entry ) {
    $log = 'rw_notification_attachments() - ';
    GFCommon::log_debug( $log . 'starting.' );
 
    if ( $notification['name'] == 'Admin Notification' ) {
 
        $fileupload_fields = GFCommon::get_fields_by_type( $form, array( 'fileupload' ) );
 
        if ( ! is_array( $fileupload_fields ) ) {
            return $notification;
        }
 
        $notification['attachments'] = rgar( $notification, 'attachments', array() );
        $upload_root = RGFormsModel::get_upload_root();
 
        foreach( $fileupload_fields as $field ) {
 
            $url = rgar( $entry, $field->id );
 
            if ( empty( $url ) ) {
                continue;
            } elseif ( $field->multipleFiles ) {
                $uploaded_files = json_decode( stripslashes( $url ), true );
                foreach ( $uploaded_files as $uploaded_file ) {
                    $attachment = preg_replace( '|^(.*?)/gravity_forms/|', $upload_root, $uploaded_file );
                    GFCommon::log_debug( $log . 'attaching the file: ' . print_r( $attachment, true  ) );
                    $notification['attachments'][] = $attachment;
                }
            } else {
                $attachment = preg_replace( '|^(.*?)/gravity_forms/|', $upload_root, $url );
                GFCommon::log_debug( $log . 'attaching the file: ' . print_r( $attachment, true  ) );
                $notification['attachments'][] = $attachment;
            }
 
        }
 
    }
 
    GFCommon::log_debug( $log . 'stopping.' );
 
    return $notification;
} 
