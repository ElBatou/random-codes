/**
* Check that additional plugins are installed and active: ACF.
*/
public function check_plugins_required() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) ) {

        if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
            add_action( 'admin_notices', [ $this, 'my_plugin_notice_acf' ], 10 );
            deactivate_plugins( MY_PLUGIN_BASE );
        }

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}

/**
* Display a required message
*/
public function my_plugin_notice_acf() {
    ?><div class="error"><p>WP-Spectra Plugin requires the ACF-Pro plugin to be installed and active.</p></div><?php
}
