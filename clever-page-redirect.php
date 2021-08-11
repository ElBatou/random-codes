function my_page_template_redirect() {
    if (is_page(15837)) {
        if (is_user_logged_in()) {
            wp_redirect(get_permalink(12037));
            exit();
        }
    }
}

add_action('template_redirect', 'my_page_template_redirect');
