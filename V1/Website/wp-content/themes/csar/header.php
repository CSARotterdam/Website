<!DOCTYPE html>

<?php
    $company_logo = get_company_option("company_logo");
?>

<html>
    <head>
        <title><?php echo esc_html(get_bloginfo('name')); ?></title>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head(); ?>
    </head>

    <body>
        <?php
            $navigation_menu = new csar_navigation_menu("Hoofdmenu");
            $navigation_menu -> print_html_menu();
        ?>