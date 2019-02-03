<?php 
    /* Template Name: Contact */
    get_header(); 
?>

<script>
    const locationLat = "<?php echo get_company_option("company_longtitude"); ?>";
    const locationLog = "<?php echo get_company_option("company_lattitude"); ?>";
</script>

<main>
    <div id="map"></div>

    <div class="bg-light">
        <div class="container content-container">
            <div class="row">
                <div class="col-12">
                    <h1 class="centered-header page-title"><?php echo get_the_title($post); ?></h1>
                </div> <!-- col-12 -->
                
                <div class="col-12 col-md-6">
                    <p class="content-justify"><?php echo apply_filters('the_content', $post -> post_content); ?></p>

                    <?php echo get_company_option("company_name"); ?> <br/>
                    <?php echo get_company_option("company_street"); ?> <?php echo get_company_option("company_postal"); ?> <?php echo get_company_option("company_city"); ?> <br/>
                    <?php echo get_company_option("company_email"); ?> <br />
                    <?php echo get_company_option("company_phone"); ?>

                    <div class="list-spacer d-block d-md-none"></div>
                </div> <!-- col-12 col-md-6 -->

                <div class="col-12 col-md-6">
                    <?php gravity_form("Contact", true, false) ?>
                </div> <!-- col-12 col-md-6 -->
            </div> <!-- row -->    
        </div> <!-- container -->
    </div> <!-- bg-light -->
</main>

<?php get_footer(); ?>