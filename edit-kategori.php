<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="Login.php"</script>';
	}
	$kategori=mysqli_query($conn,"SELECT * FROM tb_category WHERE category_id='".$_GET['id']."'");
	if(mysqli_num_rows($kategori)==0){
		echo '<script>window.location="data-kategori.php"</script>';
	}
	$k=mysqli_fetch_object($kategori);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-widthm initial-scale=1" charset="utf-8">
	<title>Buka Meubel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Toko buku Online</a></h1>
			<ul>
				<li><a href="profil.php">Profil</a></li>
				<li class="dropdown"><a href="#">Data Produk</a>
					<ul class="isi-dropdown">
						<li><a href="data-kategori.php" style="padding-right:10.7px;padding-left: 14px;">Data Kategori</a></li>
						<li><a href="data-produk.php" style="padding-right:15px;padding-left: 14px;">Data Barang</a></li>
					</ul>
				</li>
				<li class="dropdown-customer"><a href="#" >Data Customer</a>
					<ul class="isi-dropdown-customer">
						<li><a href="data-pemesanan.php" style="padding-right: 8px;padding-left: 14px;">Data Pemesanan</a></li>
						<li><a href="data-pelanggan.php" style="padding-right: 11.8px;padding-left: 14px;">Data Pelanggan</a></li>
						<li><a href="data-keranjang.php" style="padding-right: 13px;padding-left: 14px;">Data Keranjang</a></li>
					</ul>
				</li>
				<li><a href="keluar.php">Logout</a></li> 
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section" style="background-color:#900C3F">
		<div class="container">
			<h3 style="color:white">Edit Data Kategori</h3>
			<div class="box" style="background-color:#FFBF00">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name?>" required>
					<input type="submit" name="submit" value="Update Kategori" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){
						$nama=ucwords($_POST['nama']);
						$update=mysqli_query($conn,"UPDATE tb_category SET category_name='".$nama."' WHERE category_id='".$k->category_id."'");
						if($update){
							echo '<script>alert("Edit Data Berhasil")</script>';
							echo '<script>window.location="data-kategori.php"</script>';
						}else{
							echo 'Gagal '.mysqli_error($conn);
						}
					}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2021 - Toko Buku Terbaik</small>
		</div>
	</footer>
</body>
</html>
