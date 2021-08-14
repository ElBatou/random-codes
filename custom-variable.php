//expose the property_id to the WP_Query, to use get_query_var safely
function add_query_vars_filter($vars) {
    $vars[] = 'property_id';
    return $vars;
}

add_filter('query_vars', __NAMESPACE__ . '\\add_query_vars_filter'); 
