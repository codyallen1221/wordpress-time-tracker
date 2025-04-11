<?php
// This file contains helper functions that assist the main plugin functionality.

function format_time($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $formatted_time = sprintf('%02d:%02d', $hours, $minutes);
    return $formatted_time;
}

function get_saved_work_details() {
    return get_option('wordpress_time_tracker_work_details', []);
}

function save_work_details($details) {
    $current_details = get_saved_work_details();
    $current_details[] = $details;
    update_option('wordpress_time_tracker_work_details', $current_details);
}
?>