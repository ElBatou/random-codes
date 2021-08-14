add_filter( 'gform_notification', 'change_user_notification_attachments', 10, 3 );
function change_user_notification_attachments( $notification, $form, $entry ) {
 
    //There is no concept of user notifications, so we will need to target notifications based on other criteria, such as name
    if ( $notification['name'] == 'User Notification' ) {
 
        $fileupload_fields = GFCommon::get_fields_by_type( $form, array( 'fileupload' ) );
 
        if ( ! is_array( $fileupload_fields ) )
            return $notification;
 
        $notification['attachments'] = ( is_array( rgget('attachments', $notification ) ) ) ? rgget( 'attachments', $notification ) : array();
        $upload_root = RGFormsModel::get_upload_root();
        foreach( $fileupload_fields as $field ) {
            $url = $entry[ $field->id ];
            $attachment = preg_replace( '|^(.*?)/gravity_forms/|', $upload_root, $url );
            if ( $attachment ) {
                $notification['attachments'][] = $attachment;
            }
        }
 
    }
 
    return $notification;
} 
