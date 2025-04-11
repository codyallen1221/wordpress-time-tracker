<?php

/**
 * Plugin Name: WordPress Time Tracker
 * Description: A plugin to track time spent on building and editing WordPress sites.
 * Version: 1.0
 * Author: Cody Allen
 */

// Prevent direct access
if (! defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('WTT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WTT_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include necessary files
require_once WTT_PLUGIN_DIR . 'includes/class-time-tracker.php';
require_once WTT_PLUGIN_DIR . 'includes/helpers.php';

// Initialize the plugin
function wtt_init()
{
    $time_tracker = new Time_Tracker();
    $time_tracker->enqueue_scripts();
}
add_action('plugins_loaded', 'wtt_init');

// Register activation hook
function wtt_activate()
{
    // Code to run on activation
}
register_activation_hook(__FILE__, 'wtt_activate');

// Register deactivation hook
function wtt_deactivate()
{
    // Code to run on deactivation
}
register_deactivation_hook(__FILE__, 'wtt_deactivate');
