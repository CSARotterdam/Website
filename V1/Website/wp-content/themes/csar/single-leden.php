<?php
    get_header();
    $data = get_post_meta( $post -> ID )
?>

<main>
    <div class="bg-light">
        <div class="container partial-content-container">
            <div class="row">
                <div class="col-12">
                    <h1 class="centered-header page-title smaller-title"><?php echo get_the_title( $post -> ID ); ?></h1>
                    <h3 class="subtitle centered-header"><?php echo $data["lid_role_omschrijving_functie"][0] ?></h3>
                    <p class="content-justify extra-space"><?php echo $data["lid_role_omschrijving_beschrijving"][0]; ?></p>
                </div> <!-- col-12 -->
            </div> <!-- row -->

            <div class="row">
                <div class="col-12 col-md-3">
                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url( $post ); ?>" title="<?php echo get_the_title( $post -> ID ); ?>" alt="<?php echo get_the_title( $post -> ID ); ?>"/>
                </div>

                <div class="col-12 col-md-9">
                    <?php echo apply_filters('the_content', $post -> post_content); ?>

                    <h5><?php echo __("Contact", "csar-theme"); ?></h5>
                    <?php echo __("Mail: "); ?> <?php echo $data["lid_social_E_mail"][0]; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>