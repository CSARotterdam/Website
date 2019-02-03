<?php
    function event_post_type() {
        $labels = array(
            'name'               => _x( 'Events',                                   'csar-theme' ),
            'singular_name'      => _x( 'Event',                                    'csar-theme' ),
            'menu_name'          => _x( 'Events',                                   'csar-theme' ),
            'name_admin_bar'     => _x( 'Events',                                   'csar-theme' ),
            'add_new'            => _x( 'Toevoegen',                                'csar-theme' ),
            'add_new_item'       => __( 'Event toevoegen',                          'csar-theme' ),
            'new_item'           => __( 'Nieuwe event',                             'csar-theme' ),
            'edit_item'          => __( 'Bewerk event',                             'csar-theme' ),
            'view_item'          => __( 'Bekijk event',                             'csar-theme' ),
            'all_items'          => __( 'Alle events',                              'csar-theme' ),
            'search_items'       => __( 'Zoek events',                              'csar-theme' ),
            'parent_item_colon'  => __( 'Hoofd event',                              'csar-theme' ),
            'not_found'          => __( 'Geen event gevonden',                      'csar-theme' ),
            'not_found_in_trash' => __( 'Geen event gevonden in de prullenbak',     'csar-theme' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'event' ),
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 50,
            'menu_icon'          => 'dashicons-smiley',
            'taxonomies'         => array(),
            'supports'           => array(
                'title',
                'excerpt',
                'editor',
                'thumbnail'
            )
        );

        register_post_type( 'event', $args );
    }

    add_action( 'init', 'event_post_type' );