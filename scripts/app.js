function showTweetPopup() {
	let popup = document.getElementById("tweetPopup");
	let body = document.getElementById("body");
	body.classList.toggle("darken");
	popup.classList.toggle("show");
}

function showButton() {
	let button = document.getElementById("everyoneBtn");
    button.classList.toggle("show");
}