<?php
    /* Template Name: Over */
    get_header();
?>

<main>
    <div class="bg-light">
        <div class="container partial-content-container">
            <div class="row">
                <div class="col-12">
                    <h1 class="centered-header page-title"><?php echo get_the_title($post); ?></h1>
                    <p class="content-justify"><?php echo apply_filters('the_content', $post -> post_content); ?></p>
                </div>
            </div>

            <br />

            <div class="row">
	            <?php
                    $memberArguments = array (
	                    "post_type" => "leden",
	                    "post_status" => "publish",
	                    "posts_per_page" => -1
                    );

                    $members = get_posts( $memberArguments );

                    foreach ( $members as $member ) { ?>
	                    <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <?php if ( get_the_post_thumbnail_url( $member ) ) { ?>
                                    <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url( $member ); ?>" alt="<?php echo get_the_title( $member ); ?>">
                                <?php } ?>



                                <div class="card-body">
                                    <h5 class="card-title centered-header"><?php echo get_the_title( $member ); ?></h5>
                                    <h6 class="card-subtitle centered-header"><?php echo get_post_meta( $member -> ID, 'lid_role_omschrijving_functie')[0]; ?></h6>
                                    <br />
                                    <a href="<?php echo get_post_permalink( $member ); ?>" class="btn btn-primary full-size-button"><?php echo __("Meer informatie", "csar-theme"); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php }
	            ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>