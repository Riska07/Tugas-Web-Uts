<?php 
	session_start();
	include 'db.php';
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
</head>
<body>
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Toko Buku Online</a></h1>
			<ul>
				<li><a href="profil.php">Profil</a></li>
				<li class="dropdown"><a href="#">Data Buku</a>
					<ul class="isi-dropdown">
						<li><a href="data-kategori.php" style="padding-right:10.7px;padding-left: 14px;">Data Kategori</a></li>
						<li><a href="data-buku.php" style="padding-right:15px;padding-left: 14px;">Data Buku</a></li>
					</ul>
				</li>
				<li class="dropdown-customer"><a href="#" >Data Customer</a>
					<ul class="isi-dropdown-customer">
						<li><a href="data-pemesanan.php" style="padding-right: 3.5px;padding-left: 14px;">Data Pembayaran</a></li>
						<li><a href="data-pelanggan.php" style="padding-right: 11.8px;padding-left: 14px;">Data Pelanggan</a></li>
						<li><a href="data-keranjang.php" style="padding-right: 8px;padding-left: 14px;">Data Pemesanan</a></li>
					</ul>
				</li>
				<li><a href="keluar.php">Logout</a></li> 
			</ul>
		</div>
	</header>
	<!-- content -->
	<div class="section" style="background-color:#900C3F">
		<div class="container">
			<h3 style="color:white">Data Pembayaran</h3>
			<div class="box" style="background-color:#FFBF00">
				<table class="table" border="1" cellspacing="0">
					<thead>
						<tr>
							<th width="40px">No</th>
							<th width="50px">Kode</th>
							<th width="150px">Nama</th>
							<th width="100px">Bahan</th>
							<th width="102px">Tanggal</th>
							<th>No Hp</th>
							<th>Keterangan</th>
							<th>Bukti</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$no=1;
							$buku = mysqli_query($conn,"SELECT * FROM tb_pemesanan");
							if(mysqli_num_rows($buku)>0){
							while($row=mysqli_fetch_array($buku)){
						?>
						<tr style="text-align: center">
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['kode_pemesanan'] ?></td>
							<td><?php echo $row['keterangan_pemesanan'] ?></td>
							<td><a href="bukti/<?php echo $row['bukti_pembayaran'] ?>" target="_blank"><img src="bukti/<?php echo $row['bukti_pembayaran'] ?>" width="50px"></a></td>
							<td>
								<a href="proses-hapus.php" onclick="return confirm('Yakin ingin menghapus pemesanan?')">Hapus</a>
							</td>
						</tr>
					<?php }}else{ ?>
						<tr>
							<td colspan="10" style="text-align:center;">Belum Ada Pembayaran</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>		
			</div>
		</div>
	</div>
</body>
</html>
