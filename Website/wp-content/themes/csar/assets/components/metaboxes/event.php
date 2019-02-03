<?php
// Make event_locatie metabox
function event_add_locatie()
{
    add_meta_box('event_locatie_id', 'Event locatie:', 'event_locatie_html', 'event', 'normal', 'high');
}

// Make event_locatie metabox html-head
function event_locatie_html($post)
{
    $data = get_post_meta($post->ID);
    $value = isset($data['event_locatie']) ? esc_attr($data['event_locatie'][0]) : '';

    echo "<input type='text' name='event_locatie' id='event_locatie' value='$value' style='width: 100%' />";
}

// Add the function that create meta box
add_action('add_meta_boxes', 'event_add_locatie');

function event_locatie_postdata()
{
    global $post;

    if (array_key_exists('event_locatie', $_POST)) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post->ID;
        }
        update_post_meta($post->ID, "event_locatie", $_POST["event_locatie"]);
    }
}

// Add the function that save the post of locatie event
add_action('save_post', 'event_locatie_postdata');

// Event Begin datum + tijd metabox

// Make event begin datum metabox
function event_add_begin_datum()
{
    add_meta_box('event_begindatum_id', 'Event begin datum:', 'event_begindatum_html', 'event', 'normal', 'high');
}

  // Make event begin datum metabox html-head
function event_begindatum_html($post)
{
    $data = get_post_meta($post->ID);
    $datum = isset($data['event_begindatum_date']) ? esc_attr($data['event_begindatum_date'][0]) : "";
    $time = isset($data['event_begindatum_time']) ? esc_attr($data['event_begindatum_time'][0]) : "";

    echo "<input type='date' name='event_begindatum_date' id='event_begindatum_date' value='$datum' style='width: 100%' />";
    echo "<input type='time' name='event_begindatum_time' id='event_begindatum_time' value='$time' style='width: 100%' />";
}

  // Add the function that create meta box
add_action('add_meta_boxes', 'event_add_begin_datum');

function event_begindatum_postdata()
{
    global $post;

    if (array_key_exists('event_begindatum_date', $_POST) && array_key_exists('event_begindatum_time', $_POST)) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post->ID;
        }
        update_post_meta($post->ID, "event_begindatum_date", $_POST["event_begindatum_date"]);
        update_post_meta($post->ID, "event_begindatum_time", $_POST["event_begindatum_time"]);
    }
}

  // Add the function that save the post of begin datum event
add_action('save_post', 'event_begindatum_postdata');

// Event Eind datum + tijd metabox

// Make event eind datum metabox
function event_add_eind_datum()
{
    add_meta_box('event_einddatum_id', 'Event eind datum:', 'event_einddatum_html', 'event', 'normal', 'high');
}

// Make event eind datum metabox html-head
function event_einddatum_html($post)
{
    $data = get_post_meta($post->ID);
    $datum = isset($data['event_einddatum_date']) ? esc_attr($data['event_einddatum_date'][0]) : "";
    $time = isset($data['event_einddatum_time']) ? esc_attr($data['event_einddatum_time'][0]) : "";

    echo "<input type='date' name='event_einddatum_date' id='event_einddatum_date' value='$datum' style='width: 100%' />";
    echo "<input type='time' name='event_einddatum_time' id='event_einddatum_time' value='$time' style='width: 100%' />";
}

// Add the function that create meta box
add_action('add_meta_boxes', 'event_add_eind_datum');

// Add the functon that saves the data
function event_einddatum_postdata()
{
    global $post;

    if (array_key_exists('event_einddatum_date', $_POST) && array_key_exists('event_einddatum_time', $_POST)) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post->ID;
        }
        update_post_meta($post->ID, "event_einddatum_date", $_POST["event_einddatum_date"]);
        update_post_meta($post->ID, "event_einddatum_time", $_POST["event_einddatum_time"]);
    }
}

  // Add the function that save the post of eind datum event
add_action('save_post', 'event_einddatum_postdata');

// Event Organisator metabox

// Make event_organisator metabox
function event_add_organisator()
{
    add_meta_box('event_Organisator_id', 'Event organisator:', 'event_organisator_html', 'event', 'normal', 'high');
}

// Make event_organisator metabox html-head
function event_organisator_html($post)
{
    $data = get_post_meta($post->ID);
    $value = isset($data['event_orgnisator']) ? esc_attr($data['event_orgnisator'][0]) : '';

    echo "<input type='text' name='event_orgnisator' id='event_orgnisator' value='$value' style='width: 100%' />";
}

// Add the function that create meta box
add_action('add_meta_boxes', 'event_add_organisator');

function event_organisator_postdata()
{
    global $post;

    if (array_key_exists('event_orgnisator', $_POST)) {
        update_post_meta($post->ID, "event_orgnisator", $_POST["event_orgnisator"]);
    }

    if (array_key_exists('event_orgnisator', $_POST) && defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post->ID;
    }
}

// Add the function that save the post of organisator event
add_action('save_post', 'event_organisator_postdata');

// Event AanmeldURL metabox

// Make event_AanmeldURL metabox
function event_add_aanmeldurl()
{
    add_meta_box('event_AanmeldURL_id', 'Event aanmeld URL:', 'event_aanmeldurl_html', 'event', 'normal', 'high');
}

// Make event_AanmeldURL metabox html-head
function event_aanmeldurl_html($post)
{
    $data = get_post_meta($post->ID);
    $value = isset($data['event_AanmeldURL']) ? esc_attr($data['event_AanmeldURL'][0]) : '';

    echo "<input type='url' name='event_AanmeldURL' id='event_AanmeldURL' value='$value' style='width: 100%' />";
}

// Add the function that create meta box
add_action('add_meta_boxes', 'event_add_aanmeldurl');

function event_aanmeldurl_postdata()
{
    global $post;

    if (array_key_exists('event_AanmeldURL', $_POST)) {
        update_post_meta($post->ID, "event_AanmeldURL", $_POST["event_AanmeldURL"]);
    }

    if (array_key_exists('event_AanmeldURL', $_POST) && defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post->ID;
    }
}

// Add the function that save the post of organisator event
add_action('save_post', 'event_aanmeldurl_postdata');

// Event Kosten metabox

// Make event_Kosten metabox
function event_add_kosten()
{
    add_meta_box('event_kosten_id', 'Event kosten:', 'event_kosten_html', 'event', 'normal', 'high');
}

// Make event_Kosten metabox html-head
function event_kosten_html($post)
{
    $data = get_post_meta($post->ID);
    $value = isset($data['event_kosten']) ? esc_attr($data['event_kosten'][0]) : '';

    echo "€ <input type='text' name='event_kosten' lang='en-150' id='event_kosten' value='$value' style='width: 95%' />";
}

// Add the function that create meta box
add_action('add_meta_boxes', 'event_add_kosten');

function event_kosten_postdata()
{
    global $post;

    if (array_key_exists('event_kosten', $_POST)) {
        update_post_meta($post->ID, "event_kosten", $_POST["event_kosten"]);
    }

    if (array_key_exists('event_kosten', $_POST) && defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post->ID;
    }
}

// Add the function that save the post of organisator event
add_action('save_post', 'event_kosten_postdata');
