<?php

    /*************************
     *  Theme Initialisation *
     *************************/

    require_once locate_template('assets/cleanup.php');
    require_once locate_template('assets/options.php');

    function csar_theme_setup() {
        add_theme_support('post-thumbnails');
        add_image_size('200x800', 1200, 800, true);
    }

    function remove_unnecessary_menu_items() {
        remove_menu_page('edit-comments.php');
    }

    function register_navigation_menu() {
        register_nav_menu('header-menu', __("Hoofdmenu", "csar-theme"));
    }

    function csar_widgets_init() {
        register_sidebar(array(
            'name'          => "Footer Area",
            'id'            => "footer_area_widgets",
            "before_widget" => '<div class="col-12 col-md-4 light-background-list"><div class="row">',
            "after_widget"  => '</div></div>',
            "before_title"  => '<h4 class="centered-header">',
            "after_title"   => '</h4>'
        ));
    }

    add_action('after_setup_theme', 'csar_theme_setup');
    add_action('admin_menu', 'remove_unnecessary_menu_items');
    add_action('init', 'register_navigation_menu');
    add_action('widgets_init', 'csar_widgets_init');

    /****************************
     * Enqueue Styles & Scripts *
     ****************************/

    function csar_styles_and_scripts() {
        wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, false, 'all' );
        wp_enqueue_style('bootstrap');
        wp_register_style('main', get_template_directory_uri() . '/assets/css/main.css', false, false, 'all' );
        wp_enqueue_style('main');

        wp_enqueue_style('style', get_stylesheet_uri() );

        wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', false, '', true );
        wp_enqueue_script('jquery');
        wp_register_script('javascript-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', false, '', true );
        wp_enqueue_script('javascript-bootstrap');
        wp_register_script('openlayers', get_template_directory_uri() . '/assets/vendors/openlayers/OpenLayers.js', false, '', true );
        wp_enqueue_script('openlayers');
        wp_register_script('custom-js', get_template_directory_uri() . '/assets/js/main.js', false, '', true );
        wp_enqueue_script('custom-js');
    }

    function csar_admin_styles_and_scripts() {
        wp_enqueue_style('bootstrap');
        wp_enqueue_script('bootstrap-bundle');
    }

    add_action("wp_enqueue_scripts", "csar_styles_and_scripts");
    add_action("admin_enqueue_scripts", "csar_admin_styles_and_scripts");

    /**************************************
     * Post Types, Metaboxes & Taxonomies *
     **************************************/

    require_once locate_template('assets/components/types/commissie.php');
    require_once locate_template('assets/components/types/event.php');
    require_once locate_template('assets/components/types/gallery.php');
    require_once locate_template('assets/components/types/lid.php');

    require_once locate_template('assets/components/metaboxes/event.php');
    require_once locate_template('assets/components/metaboxes/gallery.php');
    require_once locate_template('assets/components/metaboxes/lid.php');
    
    /******************
     * Template Parts *
     ******************/

    require_once locate_template('template-parts/navigation/csar-navigation-menu-item.php');
    require_once locate_template('template-parts/navigation/csar-navigation-menu.php');
    require_once locate_template('template-parts/archive/csar-archive.php');
    require_once locate_template('template-parts/archive/csar-archive-factory.php');

    /*************
     * Functions *
     *************/

    function get_option_page_value(string $option_category, string $option_slug) {
        $company_options = get_option($option_category);

        if (!is_array($company_options)) {
            return null;
        }

        if (!array_key_exists($option_slug, $company_options)) {
            return null;
        }

        return $company_options[$option_slug];
    }

    function get_company_option(string $option_slug) {
        return get_option_page_value("csar_options_company", $option_slug);
    }

    function get_copyright_option(string $option_slug) {
        return get_option_page_value("csar_options_copyright", $option_slug);
    }

    function apply_copyright_filters(string $copyright_message) {
        return str_replace('YYYY', date("Y"), $copyright_message);
    }

    function any_is_empty(array $checklist) {
        foreach ($checklist as $variable) {
            if (empty($variable)) {
                return true;
            }
        }

        return false;
    }

    function get_news_page_id() {
        return get_option('page_for_posts');
    }

    function get_news_page_object() {
        return get_post(get_news_page_id());
    }

    function is_active_post(int $post_id) {
        global $post;

        if (!$post || $post -> ID != $post_id) {
            if (get_news_page_id() != $post_id || get_permalink($post_id) != get_requested_url()) {
                return false;
            }
        } 
        
        return true;
    }

    function get_requested_url() {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    function get_archive_post_type_object() {
        if (!is_post_type_archive()) {
            return false;
        }
        
        $post_type = get_query_var('post_type');
        return get_post_type_object($post_type);
    }

    function get_archive_post_type_slug($post_type_object) {
        if (!$post_type_object -> name) {
            return 'post';
        }

        return $post_type_object -> name;
    }