<?php
include 'db.php';
if(isset($_GET['aksi'])){
	mysqli_query($conn,"DELETE FROM buku WHERE id='".$_GET['aksi']."'");
	echo '<script>window.location="tampilDataBuku.php"</script>';
}
?>