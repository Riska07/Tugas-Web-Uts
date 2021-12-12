<?php 
	include 'db.php';
	session_start();
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="Login.php"</script>';
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-widthm initial-scale=1" charset="utf-8">
	<title>Buka Buku</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Buka Buku</a></h1>
			<ul>
				<li><a href="profil.php">Profil</a></li>
				<li class="dropdown"><a href="#">Data Buku/a>
					<ul class="isi-dropdown">
						<li><a href="data-kategori.php" style="padding-right:10.7px;padding-left: 14px;">Data Kategori</a></li>
						<li><a href="data-buku.php" style="padding-right:15px;padding-left: 14px;">Data Buku</a></li>
					</ul>
				</li>
				<li class="dropdown-customer"><a href="#" >Data Customer</a>
					<ul class="isi-dropdown-customer">
						<li><a href="data-pemesanan.php" style="padding-right: 3.5px;padding-left: 14px;">Data Pembayaran</a></li>
						<li><a href="data-pelanggan.php" style="padding-right: 11.8px;padding-left: 14px;">Data Pelanggan</a></li>
					</ul>
				</li>
				<li><a href="keluar.php">Logout</a></li> 
			</ul>
		</div>
	</header>
	<!-- content -->
	<div class="section" style="background-color:#900C3F">
		<div class="container">
			<h3 style="color:white">Data Pelanggan</h3>
			<div class="box" style="background-color:#FFBF00">
				<table class="table-pelanggan" border="1">
					<thead>
						<tr>
							<th>No</th>
							<th width="60px">Kode</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>No Hp</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
$list_pelanggan = mysqli_query($conn, "SELECT * FROM tb_pelanggan");
							while($row=mysqli_fetch_array($list_pelanggan)){
						 ?>
						<tr style="text-align: center;">
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['id'] ?></td>
							<td><?php echo $row['nama'] ?></td>
							<td><?php echo $row['jenis_kelamin'] ?></td>
							<td><?php echo $row['no_hp'] ?></td>
							
							<td>
								<a href="detail-pelanggan.php?idplgn=<?php echo $row['id']?>">Detail</a> || 
								<a href="proses-hapus.php?idplgn=<?php echo $row['id']?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
