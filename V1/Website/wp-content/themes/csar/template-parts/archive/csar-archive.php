<?php
    include locate_template('template-parts/archive/archive-content/csar-archive-content-pre.php');
    include locate_template('template-parts/archive/archive-content/csar-archive-content-pro.php');
    include locate_template('template-parts/archive/archive-content/csar-archive-content-items.php');

    class csar_archive {
        public $archive_title;
        public $archive_content;
        public $archive_post_type;
        public $archive_thumbnail;

        public function __construct(string $archive_title, string $archive_content, string $archive_post_type, string $archive_thumbnail = '') {
           $this -> archive_title       = $archive_title;
           $this -> archive_content     = $archive_content;
           $this -> archive_post_type   = $archive_post_type;
           $this -> archive_thumbnail   = $archive_thumbnail; 
        }

        public function print_archive() {
            print_pre_archive_template($this);
            print_archive_items_template($this);
            print_pro_archive_template($this);
        }
    }