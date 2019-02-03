<?php
    // Lid Rol omschrijving metabox

    // Make event_locatie metabox
    function lid_add_Role_omschrijving()
    {
        add_meta_box('lid_role_omschrijving_id', 'Role Omschrijving:', 'lid_role_omschrijving_html', 'leden', 'normal', 'high');
    }

    // Make event_locatie metabox html-head
    function lid_role_omschrijving_html($post)
    {
        $data = get_post_meta($post->ID);
        $functie = isset($data['lid_role_omschrijving_functie']) ? esc_attr($data['lid_role_omschrijving_functie'][0]) : '';
        $omschrijving = isset($data['lid_role_omschrijving_beschrijving']) ? esc_attr($data['lid_role_omschrijving_beschrijving'][0]) : '';
//        $functie_select = get_post_meta($post->ID, 'lid_role_omschrijving_functie_selected', true);

        ?>
        <label for="lid_role_omschrijving_functie">Functie:</label><br>
        <input type='text' name='lid_role_omschrijving_functie' id='lid_role_omschrijving_functie' value='<?php echo $functie ?>' style='width: 100%' />

        <label for="lid_role_omschrijving_beschrijving">Beschrijving: </label><br>
        <textarea type='text' name='lid_role_omschrijving_beschrijving' id='lid_role_omschrijving_beschrijving' rows='4' style='width: 100%'><?php echo $omschrijving ?></textarea>
        <?php

        }

    // Add the function that create meta box
    add_action('add_meta_boxes', 'lid_add_Role_omschrijving');

    function lid_role_omschrijving_postdata()
    {
        global $post;

        // Auto save
        if (array_key_exists('lid_role_omschrijving_functie', $_POST) && array_key_exists('lid_role_omschrijving_beschrijving', $_POST) && define('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post->ID;
        }

        // Update post
        if (array_key_exists('lid_role_omschrijving_functie', $_POST)) {
            update_post_meta($post->ID, "lid_role_omschrijving_functie", $_POST["lid_role_omschrijving_functie"]);
        }
//        if (array_key_exists('lid_role_omschrijving_functie_selected', $_POST)) {
//            update_post_meta($post->ID, "lid_role_omschrijving_functie_selected", $_POST["lid_role_omschrijving_functie_selected"]);
//        }
        if (array_key_exists('lid_role_omschrijving_beschrijving', $_POST)) {
            update_post_meta($post->ID, "lid_role_omschrijving_beschrijving", $_POST["lid_role_omschrijving_beschrijving"]);
        }
    }

    // Add the function that save the post of locatie events
    add_action('save_post', 'lid_role_omschrijving_postdata');

// Lid Socials metabox

    // Make event_locatie metabox
    function lid_add_social()
    {
        add_meta_box('lid_social_id', 'Social:', 'lid_social_html', 'leden', 'normal', 'high');
    }

    // Make event_locatie metabox html-head
    function lid_social_html($post)
    {
        $data = get_post_meta($post->ID);
//        $LinkedIn = isset($data['lid_social_LinkedIn']) ? esc_attr($data['lid_social_LinkedIn'][0]) : '';
        $email = isset($data['lid_social_E_mail']) ? esc_attr($data['lid_social_E_mail'][0]) : '';
//        $github = isset($data['lid_social_Github']) ? esc_attr($data['lid_social_Github'][0]) : '';
//        $Discord = isset($data['lid_social_Discord']) ? esc_attr($data['lid_social_Discord'][0]) : '';
//        $Facebook = isset($data['lid_social_Facebook']) ? esc_attr($data['lid_social_Facebook'][0]) : '';
//        $Twitter = isset($data['lid_social_Twitter']) ? esc_attr($data['lid_social_Twitter'][0]) : '';

        ?>
<!--    <label for="lid_social_LinkedIn">LinkedIn:</label><br>-->
<!--    <input type='text' name='lid_social_LinkedIn' id='lid_social_LinkedIn' value='--><?php //echo $LinkedIn ?><!--' style='width: 100%' />-->

    <label for="lid_social_E_mail">E-mail: </label><br>
    <input type='email' name='lid_social_E_mail' id='lid_social_E_mail' value="<?php echo $email ?>" style='width: 100%' />

<!--    <label for="lid_social_Github">Github: </label><br>-->
<!--    <input type='text' name="lid_social_Github" id="lid_social_Github" value="--><?php //echo $github ?><!--" style="width: 100%" />-->
<!---->
<!--    <label for="lid_social_Discord">Discord: </label><br>-->
<!--    <input type='text' name="lid_social_Discord" id="lid_social_Discord" value="--><?php //echo $Discord ?><!--" style="width: 100%" />-->
<!---->
<!--    <label for="lid_social_Facebook">Facebook: </label><br>-->
<!--    <input type='text' name="lid_social_Facebook" id="lid_social_Facebook" value="--><?php //echo $Facebook ?><!--" style="width: 100%" />-->
<!---->
<!--    <label for="lid_social_Twitter">Twitter: </label><br>-->
<!--    <input type='text' name="lid_social_Twitter" id="lid_social_Twitter" value="--><?php //echo $Twitter ?><!--" style="width: 100%" />-->
    <?php

    }

    // Add the function that create meta box
    add_action('add_meta_boxes', 'lid_add_social');

    // Add the function that take care of the storage of the data
    function lid_socail_postdata()
    {
        global $post;

//        if (array_key_exists('lid_social_LinkedIn', $_POST) &&
//            array_key_exists('lid_social_E_mail', $_POST) &&
//            array_key_exists('lid_social_Github', $_POST) &&
//            array_key_exists('lid_social_Discord', $_POST) &&
//            array_key_exists('lid_social_Facebook', $_POST) &&
//            array_key_exists('lid_social_Twitter', $_POST) &&
//            define('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
//            return $post->ID;
//        }
	    if (array_key_exists('lid_social_E_mail', $_POST) &&
	        define('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		    return $post->ID;
	    }
//        if (array_key_exists('lid_social_LinkedIn', $_POST)) {
//            update_post_meta($post->ID, "lid_social_LinkedIn", $_POST["lid_social_LinkedIn"]);
//        }
        if (array_key_exists('lid_social_E_mail', $_POST)) {
            update_post_meta($post->ID, "lid_social_E_mail", $_POST["lid_social_E_mail"]);
        }
//        if (array_key_exists('lid_social_Github', $_POST)) {
//            update_post_meta($post->ID, "lid_social_Github", $_POST["lid_social_Github"]);
//        }
//        if (array_key_exists('lid_social_Discord', $_POST)) {
//            update_post_meta($post->ID, "lid_social_Discord", $_POST["lid_social_Discord"]);
//        }
//        if (array_key_exists('lid_social_Facebook', $_POST)) {
//            update_post_meta($post->ID, "lid_social_Facebook", $_POST["lid_social_Facebook"]);
//        }
//        if (array_key_exists('lid_social_Twitter', $_POST)) {
//            update_post_meta($post->ID, "lid_social_Twitter", $_POST["lid_social_Twitter"]);
//        }
    }

    // Add the function that save the post of locatie events
    add_action('save_post', 'lid_socail_postdata');

    // Lid Account metabox

    // Make event_locatie metabox
    function lid_add_account()
    {
        add_meta_box('lid_account_id', 'WP-Account:', 'lid_account_html', 'leden', 'normal', 'high');
    }

    // Make event_locatie metabox html-head
    function lid_account_html($post)
    {
        $data = get_post_meta($post->ID);
        $Account_select = get_post_meta($post->ID, 'lid_account_selected', true);

        $blogusers = get_users(array('fields' => array('ID', 'display_name')));
        ?>
    <select name="lid_account_selected" id="lid_account_selected" class="postbox" style="width: 100%">
        <option value='-1'>Kies...</option>
        <?php
        foreach ($blogusers as $user) {
            echo "<option value='" . esc_html($user->ID) . "' " . selected($Account_select, esc_html($user->ID)) . " >" . esc_html($user->display_name) . "</option>";
        }
        ?>
    </select>
    <?php

    }

    // Add the function that create meta box
//    add_action('add_meta_boxes', 'lid_add_account');

    function lid_account_postdata()
    {
        global $post;

        if (array_key_exists('lid_account_selected', $_POST) && define('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post->ID;
        }
        if (array_key_exists('lid_account_selected', $_POST) && $_POST["lid_account_selected"] != -1) {
            update_post_meta($post->ID, "lid_account_selected", $_POST["lid_account_selected"]);
        } elseif (array_key_exists('lid_account_selected', $_POST) && $_POST["lid_account_selected"] == -1) {
            update_post_meta($post->ID, "lid_account_selected", "");
        }
    }

    // Add the function that save the post of locatie events
//    add_action('save_post', 'lid_account_postdata');