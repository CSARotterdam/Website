<?php get_header(); ?>

<main>
    <?php if (get_the_post_thumbnail_url($post -> ID)): ?>
        <img class="img-fluid header-image" src="<?php echo get_the_post_thumbnail_url($post -> ID); ?>" title="<?php echo $post -> post_title; ?>" alt="<?php echo $post -> post_title; ?>">
    <?php endif; ?>

    <div class="bg-light">
        <div class="container content-container">
            <div class="row">
                <div class="col-12">
                        <h1 class="centered-header page-title sub-header"><?php echo get_the_title($post -> ID); ?></h1>
                </div>

                <div class="col-12">
                    <p class="content-justify"><?php echo apply_filters('the_content', $post -> post_content); ?></p>
                </div>
            </div> 
        </div>
    </div>
</main>

<?php get_footer(); ?>