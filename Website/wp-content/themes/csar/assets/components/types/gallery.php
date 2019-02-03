<?php
    function gallery_post_type() {
        $labels = array(
            'name'               => _x( 'Gallery',                                      'csar-theme' ),
            'singular_name'      => _x( 'Gallery',                                      'csar-theme' ),
            'menu_name'          => _x( 'Gallery',                                      'csar-theme' ),
            'name_admin_bar'     => _x( 'Gallery',                                      'csar-theme' ),
            'add_new'            => _x( 'Toevoegen',                                    'csar-theme' ),
            'add_new_item'       => __( 'Gallery toevoegen',                            'csar-theme' ),
            'new_item'           => __( 'Nieuwe gallery',                               'csar-theme' ),
            'edit_item'          => __( 'Bewerk gallery',                               'csar-theme' ),
            'view_item'          => __( 'Bekijk gallery',                               'csar-theme' ),
            'all_items'          => __( 'Alle gallery',                                 'csar-theme' ),
            'search_items'       => __( 'Zoek gallery',                                 'csar-theme' ),
            'parent_item_colon'  => __( 'Hoofd gallery:',                               'csar-theme' ),
            'not_found'          => __( 'Geen gallery gevonden',                        'csar-theme' ),
            'not_found_in_trash' => __( 'Geen gallery gevonden in de prullenbak',       'csar-theme' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'galleryafbeeldingen' ),
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 50,
            'menu_icon'          => 'dashicons-media-video',
            'taxonomies'         => array(),
            'supports'           => array(
                'title',
                'thumbnail'
            )
        );

        register_post_type( 'gallery', $args );
    }

    add_action( 'init', 'gallery_post_type' );