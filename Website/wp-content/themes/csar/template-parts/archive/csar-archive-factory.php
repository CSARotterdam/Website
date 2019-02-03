<?php
    class csar_archive_factory {
        public function new_csar_archive($object) {
            switch (get_class($object)) {
                case 'WP_Post'        : return $this::new_csar_archive_from_post($object);
                case 'WP_Post_Type'   : return $this::new_csar_archive_from_post_type($object);
            }
        }

        private function new_csar_archive_from_post(WP_Post $post) : csar_archive {
            return new csar_archive(
                get_the_title($post), 
                get_the_content($post), 
                $post -> post_type == "page" ? 'post' : get_post_type($post), 
                get_the_post_thumbnail_url($post) ? get_the_post_thumbnail_url($post) : ''
            );
        }

        private function new_csar_archive_from_post_type(WP_Post_Type $post_type) : csar_archive {
            return new csar_archive(
                $post_type -> label, 
                '', 
                $post_type -> name,
                ''
            );
        }
    }