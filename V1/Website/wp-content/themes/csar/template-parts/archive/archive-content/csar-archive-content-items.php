<?php
    function print_archive_items_template(csar_archive $archive) { 
        $getPostsArguments = array(
            "post_type"         => $archive -> archive_post_type,
            "post_status"       => "publish",
            "posts_per_page"    => 6
        );

        $posts = get_posts($getPostsArguments);

        if ($posts) {
            foreach ($posts as $post) { ?>
                <div class="col-12 col-md-6">
                    <a href="<?php echo get_permalink( $post ); ?>" title="news">
                        <div class="container">
                            <div class="row inner-context little-news-box">
                                <?php if (get_the_post_thumbnail_url($post)) { ?>
                                    <div class="col-12 col-md-4 img-center">
                                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="<?php echo $post -> post_title; ?>" title="<?php echo $post -> post_title; ?>"/>
                                        <div class="list-spacer d-block d-md-none"></div>
                                    </div>

                                    <div class="col-12 col-md-8">
                                        <h4><?php echo get_the_title($post); ?></h4>
                                        <p class="content-justify"><?php echo get_the_excerpt($post); ?></p>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-12">
                                        <h4><?php echo get_the_title($post); ?></h4>
                                        <p class="content-justify"><?php echo get_the_excerpt($post); ?></p>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div> 
                    </a> 
                </div>
            <?php }

            wp_reset_postdata();
        }
    }