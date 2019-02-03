<?php
    // Image URL metabox

    // Make image_url metabox
    function image_add_url()
    {
        add_meta_box('image_url_id', 'Image URL:', 'image_url_html', 'gallery', 'normal', 'high');
    }

    // Make image_url metabox html-head
    function image_url_html($post)
    {
        $data = get_post_meta($post->ID);
        $value = isset($data['image_url']) ? esc_attr($data['image_url'][0]) : '';

        echo "<input type='url' name='image_url' id='image_url' value='$value' style='width: 100%' />";
    }

    // Add the function that create meta box
    add_action('add_meta_boxes', 'image_add_url');

    function image_url_postdata()
    {
        global $post;

        if (array_key_exists('image_url', $_POST)) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $post->ID;
            }
            update_post_meta($post->ID, "image_url", $_POST["image_url"]);
        }
    }

    // Add the function that save the post of locatie events
    add_action('save_post', 'image_url_postdata');

    // Image Subtitle metabox

    // Make image_subtitle metabox
    function image_add_subtitle()
    {
        add_meta_box('image_subtitle_id', 'Image subtitle:', 'image_subtitle_html', 'gallery', 'normal', 'high');
    }

    // Make image_subtitle metabox html-head
    function image_subtitle_html($post)
    {
        $data = get_post_meta($post->ID);
        $value = isset($data['image_subtitle']) ? esc_attr($data['image_subtitle'][0]) : '';

        echo "<input type='text' name='image_subtitle' id='image_subtitle' value='$value' style='width: 100%' />";
    }

    // Add the function that create meta box
    add_action('add_meta_boxes', 'image_add_subtitle');

    function image_subtitle_postdata()
    {
        global $post;

        if (array_key_exists('image_subtitle', $_POST)) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $post->ID;
            }
            update_post_meta($post->ID, "image_subtitle", $_POST["image_subtitle"]);
        }
    }

    // Add the function that save the post of locatie events
    add_action('save_post', 'image_subtitle_postdata');
