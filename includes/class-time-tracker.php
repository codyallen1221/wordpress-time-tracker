<?php
class Time_Tracker {
    private $start_time;
    private $work_details;

    public function __construct() {
        add_action('admin_bar_menu', array($this, 'display_clock'), 100);
        add_action('wp_ajax_save_work_details', array($this, 'save_work_details'));
        $this->work_details = get_option('time_tracker_work_details', '');
        $this->start_time = get_option('time_tracker_start_time', time());
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function enqueue_scripts() {
        wp_enqueue_style('time-tracker-style', plugins_url('../assets/css/style.css', __FILE__));
        wp_enqueue_script('time-tracker-script', plugins_url('../assets/js/script.js', __FILE__), array('jquery'), null, true);
        wp_localize_script('time-tracker-script', 'timeTracker', array(
            'ajax_url' => admin_url('admin-ajax.php'),
        ));
    }

    public function display_clock($wp_admin_bar) {
        $current_time = time() - $this->start_time;
        $formatted_time = gmdate("H:i:s", $current_time);
        $wp_admin_bar->add_node(array(
            'id' => 'time-tracker-clock',
            'title' => 'Time: ' . $formatted_time,
            'meta' => array('title' => 'Time Tracker')
        ));
        $wp_admin_bar->add_node(array(
            'id' => 'time-tracker-details',
            'title' => '<input type="text" id="work-details" value="' . esc_attr($this->work_details) . '" placeholder="What are you working on?" />',
            'meta' => array('title' => 'Work Details')
        ));
    }

    public function save_work_details() {
        if (isset($_POST['work_details'])) {
            $this->work_details = sanitize_text_field($_POST['work_details']);
            update_option('time_tracker_work_details', $this->work_details);
        }
        wp_die();
    }
}
?>