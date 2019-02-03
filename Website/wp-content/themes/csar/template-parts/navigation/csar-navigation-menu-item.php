<?php
    class csar_navigation_menu_item {
        public $menu_id;
        public $post_id;
        public $parent_menu_id;
        public $menu_title;
        public $post_url;
        public $menu_children;
        public $is_active;

        public function __construct(WP_Post $menu_item_data) {
            global $post;

            $this -> menu_id            = $menu_item_data -> ID;
            $this -> post_id            = $menu_item_data -> object_id;
            $this -> parent_menu_id     = $menu_item_data -> menu_item_parent;
            $this -> menu_title         = $menu_item_data -> title;
            $this -> post_url           = $menu_item_data -> url;
            $this -> menu_children      = array();
            $this -> is_active          = is_active_post($this -> post_id);

            if (any_is_empty([
                    $this -> menu_id, 
                    $this -> post_id,
                    $this -> menu_title,
                    $this -> post_url
                ])) {
                
                throw new InvalidArgumentException("Not all data for the menu item where present");
            }
        }
        
        public function has_parent() {
            return $this -> parent_menu_id != 0;
        }

        public function has_children() {
            return count($this -> menu_children) > 0;
        }

        public function add_child(object $new_child) {
            $this -> menu_children[$new_child -> menu_id] = $new_child;
        }
    }