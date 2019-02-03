<?php
class CSAR_Options {
    // Holds the values to be used in the fields callback
    private $options;

    /**
     * CSAR_Options constructor
     * @date 21-05-2018
     * @version 1.0
     * @since 1.0
     */
    public function __construct() {
        // Add the options menu to WordPress
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Create the option page in WordPress that will contain theme options
     */
    public function add_plugin_page() {
        // Add a page to WordPress
        add_menu_page(__('Thema Opties', "csar-theme"), __('Thema Opties', "csar-theme"), 'manage_options', 'theme-options-page',  array( $this, 'create_admin_page' ), null, 99);
    }

    /**
     * Create the page that contains the options of the theme
     * @date 21-05-2018
     * @version 1.0
     * @since 1.0
     */
    public function create_admin_page() {
        // Get necessary scripts
        wp_enqueue_script( 'media' );

        // Enable uploads
        if (function_exists( 'wp_enqueue_media' )) {
            wp_enqueue_media();
        } else {
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }

        // Create the different setting fields
        $company_fields     = get_option('csar_options_company');
        $copyright_fields   = get_option('csar_options_copyright');

        // Check whether we received array
        if (!is_array($company_fields))
          $company_fields = array($company_fields);
        if (!is_array($copyright_fields))
          $copyright_fields = array($company_fields);

        // Add all the option fields to an array
        $this->options = array_merge($company_fields, $copyright_fields); ?>

        <!-- Print the option page -->
        <div class='wrap'>
            <h1><?php echo __('Thema Opties', "csar-theme"); ?></h1>
            <form method='POST' action='options.php'> <?php
                // Print the settigns
                do_settings_sections('theme-options-page');
                settings_fields('theme-settings');
                submit_button();
            ?></form>
        </div> <?php
    }

    /**
     * Register all the sections and fields that contain options for the theme
     * @date 21-05-2018
     * @version 1.0
     * @since 1.0
     */
    public function page_init() {
        // Company section
        add_settings_section('section_company_id', __('Bedrijfsinformatie', 'csar-theme'), array( $this, 'print_section_company_info' ), 'theme-options-page');
        add_settings_field('company_logo', __('Logo', 'csar-theme'), array( $this, 'company_logo_callback'), 'theme-options-page', 'section_company_id');
        add_settings_field('company_name', __('Bedrijfsnaam', 'csar-theme'), array( $this, 'company_name_callback'), 'theme-options-page', 'section_company_id');
        add_settings_field('company_short_name', __('Korte Bedrijfsnaam', 'csar-theme'), array( $this, 'company_short_name_callback'), 'theme-options-page', 'section_company_id');
        add_settings_field('company_email', __('Email', 'csar-theme'), array( $this, 'company_email_callback'), 'theme-options-page', 'section_company_id');
        add_settings_field('company_street', __('Straat', 'csar-theme'), array( $this, 'company_street_callback'), 'theme-options-page', 'section_company_id');
        add_settings_field('company_postal', __('Postcode', 'csar-theme'), array( $this, 'company_postal_callback'), 'theme-options-page', 'section_company_id');
        add_settings_field('company_city', __('Stad', 'csar-theme'), array( $this, 'company_city_callback'), 'theme-options-page', 'section_company_id');
        add_settings_field('company_phone', __('Telefoon', 'csar-theme'), array( $this, 'company_phone_callback'), 'theme-options-page', 'section_company_id');
        add_settings_field('company_longtitude', __('Lengtegraad', 'csar-theme'), array( $this, 'company_longtitude_callback'), 'theme-options-page', 'section_company_id');
        add_settings_field('company_lattitude', __('Breedtegraad', 'csar-theme'), array( $this, 'company_lattitude_callback'), 'theme-options-page', 'section_company_id');
        register_setting('theme-settings', 'csar_options_company', array( $this, 'sanitize_company' ) );

        // Copyright section
        add_settings_section('section_copyright_id', __('Copyright', 'csar-theme'), array($this, 'print_section_copyright'), 'theme-options-page');
        add_settings_field('copyright_message', __('Copyright Melding', 'csar-theme'), array($this, 'copyright_message_callback'), 'theme-options-page', 'section_copyright_id');
        register_setting('theme-settings', 'csar_options_copyright', array($this, 'sanitize_copyright'));
    }

    /*****************************************
     * Sanitize each setting field as needed *
     *****************************************/

    public function sanitize_company($input) {
        // Create a new array for the input
        $new_input = array();

        // Company fields
        if( isset( $input['company_logo'] ) )
            $new_input['company_logo'] = sanitize_text_field( $input['company_logo'] );
        if( isset( $input['company_name'] ) )
            $new_input['company_name'] = sanitize_text_field( $input['company_name'] );
        if( isset( $input['company_short_name'] ) )
            $new_input['company_short_name'] = sanitize_text_field( $input['company_short_name'] );
        if( isset( $input['company_email'] ) )
            $new_input['company_email'] = sanitize_text_field( $input['company_email'] );
        if( isset( $input['company_street'] ) )
            $new_input['company_street'] = sanitize_text_field( $input['company_street'] );
        if( isset( $input['company_postal'] ) )
            $new_input['company_postal'] = sanitize_text_field( $input['company_postal'] );
        if( isset( $input['company_city'] ) )
            $new_input['company_city'] = sanitize_text_field( $input['company_city'] );
        if( isset( $input['company_phone'] ) )
            $new_input['company_phone'] = sanitize_text_field( $input['company_phone'] );
        if( isset( $input['company_longtitude'] ) )
            $new_input['company_longtitude'] = sanitize_text_field( $input['company_longtitude'] );
        if( isset( $input['company_lattitude'] ) )
            $new_input['company_lattitude'] = sanitize_text_field( $input['company_lattitude'] );

        return $new_input;
    }

    public function sanitize_copyright($input) {
        // Create a new array for the input
        $new_input = array();

        // Sanitize the fields
        if(isset($input['copyright_message']))
            $new_input['copyright_message'] = sanitize_text_field($input['copyright_message']);

        // Return the new input
        return $new_input;
    }

    /**********************************
     * Print the company section text *
     **********************************/

    public function print_section_company_info() {
        // Print the title of the sections
        print __("Uw Bedrijfsgegevens:", "csar-theme");
    }

    public function company_logo_callback() { ?>
        <script>
            // Wait for the document to be done loading
            jQuery(document).ready(function($) {
                // Create a function that enables the user the upload something when clicked on the right button
                $('.logo_upload').click(function(e) {
                    // Make sure that the JavaScript functions aren't executed
                    e.preventDefault();

                    // Create a custom uploader
                    let custom_uploader = wp.media({
                        title: '<?php echo __('Logo', 'csar-theme'); ?>',
                        button: { text: '<?php echo __('Logo Uploaden', 'csar-theme'); ?>' },
                        multiple: false
                    })

                    // When the user selects an image
                    .on('select', function() {
                        // Save the image
                        let attachment = custom_uploader.state().get('selection').first().toJSON();

                        // Change the values on the settings page
                        $('.logo').attr('src', attachment.url);
                        $('.logo').show();
                        $('.logo_url').val(attachment.url);
                    }).open();
                });
            });
        </script> <?php

        // Check whether the company logo has been created before
        if (isset($this->options['company_logo'])) {
            // Load the image
            echo '<img class="logo" src="'.$this->options['company_logo'].'"  width="200px"/><br/>';
        } else {
            // Load an empty image
            echo '<img class="logo" src="" width="200px" style="display: none;"/><br/>';
        }

        // Create the textbox that stores the path to the image
        printf(
            '<input type="text" id="company_logo" class="logo_url" name="csar_options_company[company_logo]" value="%s" />',
            isset( $this->options['company_logo'] ) ? esc_attr( $this->options['company_logo']) : ''
        );

        // Create a button that can be user to upload an image
        echo '<br/>&nbsp;<a href="#" class="logo_upload">' . __("Logo Uploaden", "csar-theme") . '</a>';
    }

    public function company_name_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="company_name" name="csar_options_company[company_name]" value="%s" />',
            isset( $this->options['company_name'] ) ? esc_attr( $this->options['company_name']) : ''
        );
    }

    public function company_short_name_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="company_short_name" name="csar_options_company[company_short_name]" value="%s" />',
            isset( $this->options['company_short_name'] ) ? esc_attr( $this->options['company_short_name']) : ''
        );
    }

    public function company_email_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="company_email" name="csar_options_company[company_email]" value="%s" />',
            isset( $this->options['company_email'] ) ? esc_attr( $this->options['company_email']) : ''
        );
    }

    public function company_street_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="company_street" name="csar_options_company[company_street]" value="%s" />',
            isset( $this->options['company_street'] ) ? esc_attr( $this->options['company_street']) : ''
        );
    }

    public function company_postal_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="company_postal" name="csar_options_company[company_postal]" value="%s" />',
            isset( $this->options['company_postal'] ) ? esc_attr( $this->options['company_postal']) : ''
        );
    }

    public function company_city_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="company_city" name="csar_options_company[company_city]" value="%s" />',
            isset( $this->options['company_city'] ) ? esc_attr( $this->options['company_city']) : ''
        );
    }

    public function company_phone_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="company_phone" name="csar_options_company[company_phone]" value="%s" />',
            isset( $this->options['company_phone'] ) ? esc_attr( $this->options['company_phone']) : ''
        );
    }

    public function company_longtitude_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="company_longtitude" name="csar_options_company[company_longtitude]" value="%s" />',
            isset( $this->options['company_longtitude'] ) ? esc_attr( $this->options['company_longtitude']) : ''
        );
    }

    public function company_lattitude_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="company_lattitude" name="csar_options_company[company_lattitude]" value="%s" />',
            isset( $this->options['company_lattitude'] ) ? esc_attr( $this->options['company_lattitude']) : ''
        );
    }

    /************************************
     * Print the copyright section text *
     ************************************/

    public function print_section_copyright() {
        // Print the title of the sections
        print __("Uw Copyright Melding:", "csar-theme");
    }

    public function copyright_message_callback() {
        // Create the box that store the information
        printf(
            '<input type="text" id="copyright_message" name="csar_options_copyright[copyright_message]" value="%s" />',
            isset($this->options['copyright_message']) ? esc_attr($this->options['copyright_message']) : ''
        );
    }
}

// Check whether the user is an administrator
if(is_admin())
    // If the user is, we create the settings page for the theme
    $theme_settings_page = new CSAR_Options();
