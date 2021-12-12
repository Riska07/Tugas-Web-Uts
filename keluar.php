<?php
	session_start();
	session_destroy();
	echo '<script>alert("Yakin anda ingin keluar")</script>';
	echo '<script>window.location="Login.php"</script>'
?>