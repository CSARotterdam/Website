<?php get_header(); ?>

<main>
    <?php
        $post = get_archive_post_type_object() ? get_archive_post_type_object() : get_news_page_object();

        $csarArchiveFactory = new csar_archive_factory();
        $csarArchive = $csarArchiveFactory -> new_csar_archive($post);

        $csarArchive -> print_archive();
    ?>
</main>

<?php get_footer(); ?>