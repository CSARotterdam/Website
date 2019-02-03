<?php
    include locate_template('template-parts/navigation/navigation-content/csar-navigation-content-pre.php');
    include locate_template('template-parts/navigation/navigation-content/csar-navigation-content-pro.php');
    include locate_template('template-parts/navigation/navigation-content/csar-navigation-content-single-item.php');
    include locate_template('template-parts/navigation/navigation-content/csar-navigation-content-nested-item.php');

    class csar_navigation_menu {
        private $menu_items;

        public function __construct(string $menu_name = "Hoofdmenu") {
            $wordpress_navigation_items = wp_get_nav_menu_items($menu_name);

            if (!empty($wordpress_navigation_items)) {
                foreach ($wordpress_navigation_items as $wordpress_navigation_item) {
                    try {
                        $menu_item = new csar_navigation_menu_item($wordpress_navigation_item);

                        if ($menu_item -> has_parent()) {
                            if (!array_key_exists($menu_item -> parent_menu_id, $this -> menu_items))
                                throw new Exception("Found a child menu item before its parent");

                            $this -> menu_items[$menu_item -> parent_menu_id] -> add_child($menu_item);
                            continue;
                        }
                        
                        $this -> menu_items[$menu_item -> menu_id] = $menu_item;
                    } catch (InvalidArgumentException $exception) {
                        continue;
                    }            
                }
            }
        }

        public function print_html_menu() {
            print_pre_menu_template();

            if (!empty($this -> menu_items)) {
                foreach ($this -> menu_items as $menu_item) {
                    if ($menu_item -> has_children())
                        print_nested_menu_item_template($menu_item);
                    else
                        print_single_menu_item_template($menu_item);
                }
            }
            
            print_pro_menu_template();
        }
    }