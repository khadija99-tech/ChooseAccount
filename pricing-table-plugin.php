<?php
/*
Plugin Name: Pricing Table Plugin
Description: A custom pricing table.
Version: 2.0
Author: Khadija
*/

defined('ABSPATH') || exit;

// Load assets
function ptp_enqueue_assets() {
    wp_enqueue_style('ptp-style', plugin_dir_url(__FILE__) . 'assets/style.css');
    wp_enqueue_script('ptp-script', plugin_dir_url(__FILE__) . 'assets/script.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'ptp_enqueue_assets');

// Register shortcode
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin-settings.php';
