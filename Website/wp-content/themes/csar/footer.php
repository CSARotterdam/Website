        <?php
            $copyright_message = get_copyright_option("copyright_message");
        ?>

        <footer>
            <div class="bg-grey">
                <div class="container content-container">
                    <div class="row">
                        <?php
                            if (is_active_sidebar('footer_area_widgets'))
                                dynamic_sidebar('footer_area_widgets');
                        ?>
                    </div>

                    <div class="row copyright">
                        <div class="col-12">
                            <p class="centered-header">
                                <?php echo $copyright_message ? apply_copyright_filters($copyright_message) : ""; ?>
                            </p>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- bg-white -->
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
