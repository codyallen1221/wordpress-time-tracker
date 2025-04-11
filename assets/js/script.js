document.addEventListener('DOMContentLoaded', function() {
    let timer;
    let startTime;
    const clockDisplay = document.getElementById('time-tracker-clock');
    const workDetailsInput = document.getElementById('work-details');
    const saveButton = document.getElementById('save-work-details');

    function updateClock() {
        const currentTime = new Date();
        const elapsedTime = Math.floor((currentTime - startTime) / 1000);
        const hours = Math.floor(elapsedTime / 3600);
        const minutes = Math.floor((elapsedTime % 3600) / 60);
        const seconds = elapsedTime % 60;

        clockDisplay.textContent = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }

    function startTimer() {
        startTime = new Date();
        timer = setInterval(updateClock, 1000);
    }

    function stopTimer() {
        clearInterval(timer);
    }

    saveButton.addEventListener('click', function() {
        const workDetails = workDetailsInput.value;
        if (workDetails) {
            // Save work details via AJAX or other methods
            console.log('Work details saved:', workDetails);
        }
    });

    // Start the timer when the page loads
    startTimer();
});