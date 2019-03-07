<?php
    function print_pre_menu_template() {
        $company_logo       = get_company_option("company_logo");
        $company_short_name = get_company_option("company_short_name");
        $company_name       = get_company_option("company_name"); ?>
    
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light justify-content-between">
            <div class="container">
                <a class="navbar-brand d-none d-lg-block" href="<?php echo get_site_url(); ?>">
                    <?php echo $company_logo ? '<img src="' . $company_logo . '" height="30" class="d-inline-block align-top" alt="' . __('CSAR Logo', 'csar-theme') . '" title="' . __('CSAR Logo', 'csar-theme') . '">' : ''; ?>
                    <?php echo $company_name; ?>
                </a>

                <a class="navbar-brand d-block d-lg-none" href="<?php echo get_site_url(); ?>">
                    <?php echo $company_logo ? '<img src="' . $company_logo . '" height="30" class="d-inline-block align-top" alt="' . __('CSAR Logo', 'csar-theme') . '" title="' . __('CSAR Logo', 'csar-theme') . '">' : ''; ?>
                    <?php echo $company_short_name; ?>
                </a>

                <button
                    class           = "navbar-toggler"
                    type            = "button"
                    data-toggle     = "collapse"
                    data-target     = "#csar"
                    aria-expanded   = "false"
                    aria-label      = "<?php echo __("Toggle Navigatie", "csar-theme"); ?>">

                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="csar">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"> 
    <?php }
?>