<?php
	//Proses.php
	$con = mysqli_connect('localhost','root','','consumen') or die ("Koneksi tidak ada"); //koneksi ke database
	$nama = $_POST['Nama'];
	$jenis_kelamin = $_POST['Jenis Kelamin'];
	$no_hp =$_POST['NoHp'];
	$user = $_POST['Username'];
    $email = $_POST['Email'];
    $pass = $_POST['Password'];
	if ($_GET['action']=='save'){
		mysqli_query($con, "INSERT INTO registrasi (Nama,Jenis Kelamin,NoHp, User, Email, Pass) 
			VALUES ('$nama', '$user','$email','$pass')");
		header('location:Login.php');
	}
	
?>