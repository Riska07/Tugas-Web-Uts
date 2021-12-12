<?php 
	include 'db.php';
	session_start();
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="Login.php"</script>';
	}
	$pelanggan=mysqli_query($conn,"SELECT * FROM tb_pelanggan WHERE id_pelanggan='".$_GET['idplgn']."'");
	$p=mysqli_fetch_object($pelanggan);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-widthm initial-scale=1" charset="utf-8">
	<title>Buka Buku</title>
</head>
<body>
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Toko Buku Online</a></h1>
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
			<h3 style="color:white">Detail Pelanggan</h3>
			<div class="box" style="background-color: #FFBF00;">
				<table class="detail-pelanggan" border="0">
					<tr>
						<td><b>Nama Pelanggan</b></td><td>:</td>
						<td><?php echo $p->nama_pelanggan ?></td>
					</tr>
					<tr>
						<td><b>Tempat Tanggal Lahir</b></td><td>:</td>
						<td><?php echo $p->tempat_lahir ?>, <?php echo $p->tanggal_lahir ?></td>
					</tr>
					<tr>
						<td><b>Jenis Kelamin</b></td><td>:</td>
						<td><?php echo $p->jenis_kelamin ?></td>
					</tr>
					<tr>
						<td><b>No Hp</b></td><td>:</td>
						<td><?php echo $p->no_hp ?></td>
					</tr>
					<tr>
						<td><b>Alamat</b></td><td>:</td>
						<td><?php echo $p->alamat ?></td>
					</tr>
					<tr>
						<td><b>Email</b></td><td>:</td>
						<td><?php echo $p->email ?></td>
					</tr>
					<tr>
						<td><b>Username</b></td><td>:</td>
						<td><?php echo $p->username ?></td>
					</tr>
					<tr>
						<td><b>Password</b></td><td>:</td>
						<td><?php echo $p->password ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2021 - toko Buku terbaik/small>
		</div>
	</footer>
</body>
</html>
