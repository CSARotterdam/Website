<?php 
    function print_nested_menu_item_template(csar_navigation_menu_item $parent_item) { ?>
        <li class="nav-item dropdown">
            <a
                class           = "nav-link dropdown-toggle"
                href            = "<?php echo $parent_item -> post_url; ?>"
                id              = "csarAbout"
                role            = "button"
                data-toggle     = "dropdown"
                aria-haspopup   = "true"
                title           = "<?php echo $parent_item -> menu_title; ?>">

                <?php echo $parent_item -> menu_title; ?>
            </a>

            <div class="dropdown-menu" aria-labelledby="csarAbout">
                <?php
                    foreach ($parent_item -> menu_children as $child_item) {
                        print_single_child($child_item);
                    }
                ?>
            </div>
        </li>
    <?php }

    function print_single_child(csar_navigation_menu_item $child_item) { ?>
        <a class="dropdown-item" href="<?php echo $child_item -> post_url; ?>" title="<?php echo $child_item -> menu_title; ?>">
            <?php echo $child_item -> menu_title; ?>
        </a>
    <?php }