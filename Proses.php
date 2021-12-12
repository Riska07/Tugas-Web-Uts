<?php
	$con = mysqli_connect('localhost','root','','consumen') or die ("Koneksi gagal"); //koneksi ke database
	$nama = $_POST['Nama'];
	$Username = $_POST['Username'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
    
	if ($_GET['aksi']=='simpan'){
		mysqli_query($con, "INSERT INTO petshop(Nama, Username, Email, Pass); 
		VALUES ('$nama', '$Username', '$Email', '$Password')");
		header('location:Read.php');
		
	}
	elseif ($_GET['aksi']=='update'){

        mysqli_query($con,"UPDATE petshop SET Nama = '$Nama',Username = '$Username', Email = '$Email', Pass = '$Password');
        WHERE  id     = '$_POST[idlama]'");
		header('location:Read.php');
	}

	elseif ($_GET['aksi']=='hapus'){
		mysqli_query($con,"DELETE FROM consumen WHERE id = $_GET[Nama]");
		header('location:Read.php');
	}
	
?>