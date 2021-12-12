<?php
include 'db.php';
if(isset($_GET['idp'])){
	mysqli_query($conn,"DELETE FROM tb_pesanan WHERE id_pesanan='".$_GET['idp']."'");
	echo '<script>window.location="pesanan.php"</script>';
}
?>