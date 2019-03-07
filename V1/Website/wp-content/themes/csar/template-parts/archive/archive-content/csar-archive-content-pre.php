<?php
    function print_pre_archive_template(csar_archive $archive) { ?>
        <div class="bg-light">
            <div class="container partial-content-container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="centered-header page-title"><?php echo $archive -> archive_title; ?></h1>
                        <p class="content-justify"><?php echo $archive -> archive_content; ?></p>
                    </div>
                </div>

                <div class="row news-list-container">
    <?php }