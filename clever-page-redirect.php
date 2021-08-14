function my_custom_template_redirect() {
    if (is_page(ID)) {
        if (is_user_logged_in()) {
            wp_redirect(get_permalink(OTHER_ID));
            exit();
        }
    }
}

add_action('template_redirect', 'my_custom_template_redirect');
