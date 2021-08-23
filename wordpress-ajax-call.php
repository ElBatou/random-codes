//Standard hooks to allow WordPress to execute a custom ajax call
add_action('wp_ajax_run_calculations', 'ajax_run_calculations');
add_action('wp_ajax_nopriv_run_calculations', 'ajax_run_calculations');

function ajax_run_calculations() {
   ...some logic here
   ... sanitize_text_field($_POST['option1_value']);

   wp_send_json($response);
}


//add the js files that will contain all the logic for the ajax call to be executed
public function enqueue_scripts() {
        wp_register_script($this->_token . '-frontend', esc_url($this->assets_url) . 'js/frontend' . $this->script_suffix . '.js', array('jquery'), $this->_version);
        wp_localize_script($this->_token . '-frontend', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
        wp_enqueue_script($this->_token . '-frontend');
}
