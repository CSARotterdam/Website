<?php
    function commissie_post_type() {
        $labels = array(
            'name'               => _x( 'Commissies',                                   'csar-theme' ),
            'singular_name'      => _x( 'Commissie',                                    'csar-theme' ),
            'menu_name'          => _x( 'Commissie',                                    'csar-theme' ),
            'name_admin_bar'     => _x( 'Commissie',                                    'csar-theme' ),
            'add_new'            => _x( 'Toevoegen',                                    'csar-theme' ),
            'add_new_item'       => __( 'Commissie toevoegen',                          'csar-theme' ),
            'new_item'           => __( 'Nieuwe commissie',                             'csar-theme' ),
            'edit_item'          => __( 'Bewerk commissie',                             'csar-theme' ),
            'view_item'          => __( 'Bekijk commissie',                             'csar-theme' ),
            'all_items'          => __( 'Alle commissie',                               'csar-theme' ),
            'search_items'       => __( 'Zoek commissie',                               'csar-theme' ),
            'parent_item_colon'  => __( 'Hoofd commissie',                              'csar-theme' ),
            'not_found'          => __( 'Geen commissie gevonden',                      'csar-theme' ),
            'not_found_in_trash' => __( 'Geen commissie gevonden in de prullenbak',     'csar-theme' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'commissie' ),
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 50,
            'menu_icon'          => 'dashicons-groups',
            'taxonomies'         => array(),
            'supports'           => array(
                'title',
                'excerpt',
                'editor',
                'thumbnail'
            )
        );

        register_post_type( 'commissie', $args );
    }

    add_action( 'init', 'commissie_post_type' );
