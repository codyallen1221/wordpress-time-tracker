<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress Time Tracker</title>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . '../assets/css/style.css'; ?>">
</head>
<body>
    <div class="wrap">
        <h1>WordPress Time Tracker</h1>
        <div id="time-clock">
            <h2>Current Time: <span id="current-time"></span></h2>
        </div>
        <form id="work-details-form">
            <label for="work-details">What are you working on?</label>
            <textarea id="work-details" name="work-details" rows="4" cols="50" required></textarea>
            <button type="submit">Save Work Details</button>
        </form>
        <div id="saved-details">
            <h3>Saved Work Details:</h3>
            <ul id="details-list"></ul>
        </div>
    </div>
    <script src="<?php echo plugin_dir_url(__FILE__) . '../assets/js/script.js'; ?>"></script>
</body>
</html>