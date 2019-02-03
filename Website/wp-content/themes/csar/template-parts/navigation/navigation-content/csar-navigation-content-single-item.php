<?php
    function print_single_menu_item_template(csar_navigation_menu_item $navigation_item) { ?>
        <li class="nav-item <?php echo $navigation_item -> is_active ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo $navigation_item -> post_url; ?>" title="<?php echo $navigation_item -> menu_title; ?>">
                <?php echo $navigation_item -> menu_title; ?>
                <?php echo $navigation_item -> is_active ? ' <span class="sr-only">(current)</span>' : ''; ?>
            </a>
        </li>
    <?php }