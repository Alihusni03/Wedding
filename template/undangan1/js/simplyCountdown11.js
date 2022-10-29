var countDownDate = new Date("Oct 28, 2022 15:37:25").getTime();
var x = setInterval(function() {
var now = new Date().getTime();
var distance = countDownDate - now;
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
									
										// Keluarkan hasil dalam elemen dengan id = "demo"
document.getElementById("demo").innerHTML = days + "d " + hours + "h "
		+ minutes + "m " + seconds + "s ";
									
										// Jika hitungan mundur selesai, tulis beberapa teks 
if (distance < 0) {
clearInterval(x);
document.getElementById("demo").innerHTML = "Acara Sedang Dimulai";
											}
}, 1000);
			