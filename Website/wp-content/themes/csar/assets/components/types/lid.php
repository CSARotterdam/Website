<?php
    function lid_post_type() {
        $labels = array(
            'name'               => _x( 'Leden',                                      'zwevendekiezer-theme' ),
            'singular_name'      => _x( 'Lid',                                      	'zwevendekiezer-theme' ),
            'menu_name'          => _x( 'Leden',                                      'zwevendekiezer-theme' ),
            'name_admin_bar'     => _x( 'Leden',                                      'zwevendekiezer-theme' ),
            'add_new'            => _x( 'Toevoegen',                                  'zwevendekiezer-theme' ),
            'add_new_item'       => __( 'Lid toevoegen',                              'zwevendekiezer-theme' ),
            'new_item'           => __( 'Nieuwe lid',                                 'zwevendekiezer-theme' ),
            'edit_item'          => __( 'Bewerk lid',                                 'zwevendekiezer-theme' ),
            'view_item'          => __( 'Bekijk lid',                                 'zwevendekiezer-theme' ),
            'all_items'          => __( 'Alle leden',                                 'zwevendekiezer-theme' ),
            'search_items'       => __( 'Zoek leden',                                 'zwevendekiezer-theme' ),
            'parent_item_colon'  => __( 'Hoofd lid',                                 'zwevendekiezer-theme' ),
            'not_found'          => __( 'Geen lid gevonden',                         'zwevendekiezer-theme' ),
            'not_found_in_trash' => __( 'Geen lid gevonden in de prullenbak',        'zwevendekiezer-theme' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'leden' ),
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 50,
            'menu_icon'          => 'dashicons-admin-users',
            'taxonomies'         => array(),
            'supports'           => array(
                'title',
                'editor',
                'thumbnail'
            )
        );

        register_post_type( 'leden', $args );
    }

    add_action( 'init', 'lid_post_type' );