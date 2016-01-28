var time = {
	second: 5
}

function redirection() {
	document.getElementById('redirection').innerHTML = time.second;
	while (time.second > 0) {
	setTimeout(function(){ 
		document.getElementById('redirection').innerHTML = time.second--;
	}, 1000);
	}
	document.location.href="../../views/index.php";
}

redirection();