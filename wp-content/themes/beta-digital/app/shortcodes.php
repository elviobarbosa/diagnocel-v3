<?php
$theme_dir = get_template_directory();
$scan_dir = $theme_dir . '/app/shortcodes/';

require_once($scan_dir . 'timeline.php');
require_once($scan_dir . 'prod-taxonomies.php');
require_once($scan_dir . 'selos.php');