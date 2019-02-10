<?php get_header(); ?>

<div id="csarGallery" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
            $post_arguments = array(
                "post_type" => "gallery",
                "post_status" => "publish",
                "posts_per_page" => 5
            );

            $posts = get_posts($post_arguments);
            $number_of_posts = count($posts);

            for ($slideIndex = 0; $slideIndex < $number_of_posts; $slideIndex++) { ?>
                <li data-target="#csarGallery" data-slide-to="<?php echo $slideIndex; ?>" class="<?php echo $slideIndex == 0 ? 'active' : ''; ?>"></li>
            <?php }
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
            $count = 0;
            if (!empty($posts)) {
                foreach ($posts as $post) {
                    if (get_the_post_thumbnail_url($post -> ID)) {
                        $count = $count + 1;

                        ?>  <div class="carousel-item <?php echo $count == 1 ? 'active' : ''; ?>">
                                <a href="<?php echo get_post_meta($post -> ID, 'image_url_id', true) ? get_post_meta($post -> ID, 'image_url_id', true) : '#'; ?>" title="<?php echo $post -> post_title ?>" alt="<?php echo $post -> post_title ?>">
                                    <img class="d-block w-100" src="<?php echo get_the_post_thumbnail_url($post -> ID); ?>" alt="Slide" title="Slide">
<!--                                    <div class="carousel-caption d-none d-md-block">-->
<!--                                        <h5>--><?php //echo $post -> post_title; ?><!--</h5>-->
<!--                                        <p>--><?php //echo get_post_meta($post -> ID, 'image_subtitle', true); ?><!--</p>-->
<!--                                    </div>-->
                                </a>
                            </div>
                    <?php }
                }

                wp_reset_postdata();
            }
        ?>
    </div> <!-- carousel-inner -->
    <a class="carousel-control-prev" href="#csarGallery" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Vorige</span>
    </a>
    <a class="carousel-control-next" href="#csarGallery" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Volgende</span>
    </a>
</div> <!-- csarGallery -->

<main>
    <div class="bg-light">
        <div class="container content-container">
            <div class="row">
                <div class="col-12">
                    <h1 class="centered-header page-title"><?php echo get_the_title($post -> ID); ?></h1>
                </div> <!-- col-12 -->
                <div class="col-12">
                    <?php
                        // Door een bug in WordPress moet the_content handmatig worden uitgevoerd
                        echo apply_filters('the_content', $post -> post_content);
                    ?>
                </div> <!-- col-12 -->
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- bg-light -->

    <div class="bg-dark">
        <div class="container content-container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="centered-header">Recente Nieuwsberichten</h2>
                        </div> <!-- col-12 -->

                            <?php
                                $post_arguments = array(
                                    "post_type" => "post",
                                    "post_status" => "publish",
                                    "posts_per_page" => 3
                                );

                                $posts = get_posts($post_arguments);
                                $number_of_posts = count($posts);
                            ?>

                                <?php
                                $count = 0;
                                if (!empty($posts)) {
                                    foreach ($posts as $post) {

                                            ?>  <a class="container" href="<?php echo get_permalink( $post ); ?>" title="<?php echo get_the_title( $post ); ?>">
                                                    <div class="row newsarticle">
                                                        <?php
                                                            if(get_the_post_thumbnail_url($post -> ID)) { ?>
                                                                <div class="col-12 col-md-3 img-center">
                                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($post -> ID); ?>" alt="<?php echo get_the_title( $post ); ?>" title="<?php echo get_the_title( $post ); ?>"/>
                                                                    <div class="list-spacer d-block d-md-none"></div>
                                                                    </div>
                                                        <?php } ?>

                                                        <div class="col-12 <?php echo get_the_post_thumbnail_url($post->ID) ? "col-md-9" : "" ?>">
                                                            <h4><?php echo $post -> post_title; ?></h4>
                                                            <p class="content-justify"><?php the_excerpt(); ?></p>
                                                        </div>
                                                    </div> <!-- row: single newsarticle -->
                                                </a>
                                        <?php }

                                    wp_reset_postdata();
                                }
                            ?>

                    </div> <!-- row: single entry -->
                </div> <!-- col-12 col-md-6 -->
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="centered-header">Opkomende Events</h2>
                        </div> <!-- col-12 -->

                        <?php
                                $post_arguments = array(
                                    "post_type" => "event",
                                    "post_status" => "publish",
                                    "posts_per_page" => 3
                                );

                                $posts = get_posts($post_arguments);
                                $number_of_posts = count($posts);
                            ?>

                                <?php
                                $count = 0;
                                if (!empty($posts)) {
                                    foreach ($posts as $post) {

                                            ?>  <a class="container" href="<?php echo get_permalink( $post ); ?>" title="news">
                                                    <div class="row newsarticle">
                                                        <?php
                                                            if(get_the_post_thumbnail_url($post -> ID)) { ?>
                                                                <div class="col-12 col-md-3 img-center">
                                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($post -> ID); ?>" alt="Image" title="Image"/>
                                                                    <div class="list-spacer d-block d-md-none"></div>
                                                                    </div>
                                                        <?php } ?>

                                                        <div class="col-12 <?php echo get_the_post_thumbnail_url($post->ID) ? "col-md-9" : "" ?>">
                                                            <h4><?php echo $post -> post_title; ?></h4>
                                                            <p class="content-justify"><?php the_excerpt(); ?></p>
                                                        </div>
                                                    </div> <!-- row: single newsarticle -->
                                                </a>
                                        <?php }

                                    wp_reset_postdata();
                                }
                            ?>

                        </a>
                    </div> <!-- row: single entry -->
                </div> <!-- col-12 col-md-6 -->
            </div> <!-- row: column -->
        </div> <!-- container -->
    </div> <!-- bg-dark -->
</main>

<?php get_footer(); ?>
