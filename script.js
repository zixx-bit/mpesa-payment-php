var timer = 5;
var counter;

function startTimer() {
	counter = setInterval(countDown, 1000);
}

function countDown() {
	var display = document.getElementById("timer");
	display.innerHTML = timer;


	timer--;

	if (timer < 0) {
		clearInterval(counter);

		window.location.href = "payment_response.php";
	}
}

startTimer();
