<?php 

/**
 * Add link vào Header
 */
function load_assets() {
    wp_enqueue_style("font", "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i", array(), "1.0", "all");
    wp_enqueue_style("bootstrapcss", "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", array(), "1.1", "all");
    wp_enqueue_style("maincss", get_theme_file_uri("/build/index.css"), array(), "1.0.2", "all");
    wp_enqueue_style("mainstylecss", get_theme_file_uri("/build/style-index.css"), array(), "1.0.3", "all");

    wp_enqueue_script("script", get_theme_file_uri("/build/index.js"), array(), "1.02", true);
}

add_action("wp_enqueue_scripts", "load_assets");

/**
 * Add Menu vào WordPress
 */
function add_menu() {
    add_theme_support("menus");
    register_nav_menus(array(
        "FooterMenuOne" => "Footer Menu One",
        "FooterMenuTwo" => "Footer Menu Two",
    ));
}

add_action("init", "add_menu");

/**
 * Custom giới hạn kí tự hàm excerpt
 */
function wpdocs_custom_excerpt_length($length) {
    return 30;
}

add_filter("excerpt_length", "wpdocs_custom_excerpt_length");

/**
 * Add Main Quey
 */
function university_create_query($query) {
    // Custom Query Archive Programs
    if (!is_admin() and is_post_type_archive("programs") and $query->is_main_query()) {
        $query->set("posts_per_page", -1);
        $query->set("orderby", "title");
        $query->set("order", "asc");
    }

    // Custom Query Archive Events
    if (!is_admin() and is_post_type_archive("event") and $query->is_main_query()) {
        $today = date("Ymd");
        $query->set("post_type", "event");
        $query->set("posts_per_page", 2);
        $query->set("meta_key", "events_date");
        $query->set("orderby", "meta_value_num");
        $query->set("order", "asc");
        $query->set("meta_query", array(
            array(
                "key" => "events_date",
                "compare" => ">=",
                "value" => $today,
                "type" => "numberic"
            )                    
        ));
    }
}

 add_action("pre_get_posts", "university_create_query");


