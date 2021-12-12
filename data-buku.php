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
						<li><a href="data-kategori.php" style="padding-right:10px;padding-left: 14px;">Data Kategori</a></li>
						<li><a href="data-buku.php" style="padding-right:14.3px;padding-left: 14px;">Data Buku</a></li>
					</ul>
				</li>
				<li class="dropdown-customer"><a href="#" >Data Customer</a>
					<ul class="isi-dropdown-customer">
						<li><a href="data-pemesanan.php" style="padding-right: 3px;padding-left: 14px;">Data Pembayaran</a></li>
					</ul>
				</li>
				<li><a href="keluar.php">Logout</a></li> 
			</ul>
		</div>
	</header>
	<!-- content -->
	<div class="section" style="background-color:#900C3F">
		<div class="container">
			<h3 style="color:white">Data Buku</h3>
			<div class="box" style="background-color:#FFBF00">
				<b><p><a href="tambah-produk.php">Tambah Data</a></p></b><br>
				<table class="table" border="1" cellspacing="0">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th>Judul</th>
                            <th>Gambar</th>
                            <th>Penerbit</th>
                            <th>Tahun penerbit</th>
                            <th>Deskripsi Buku</th>
                            <th>penulis</th>
							<th>Harga Buku</th>""""""""""""""""""""""""""""""""""""
							<th>ReviewaZTGh ew </th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$no=1;
							$buku = mysqli_query($conn,"SELECT * FROM buku LEFT JOIN tb_category USING (category_id) ORDER BY id DESC");
							if(mysqli_num_rows($buku)>0){
							while($row=mysqli_fetch_array($buku)){
						?>
						<tr style="text-align: center">
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td><?php echo $row['judul'] ?></td>
                            <td><a href="buku/<?php echo $row['buku_image'] ?>" target="_blank"><img src="buku/<?php echo $row['buku_image'] ?>" width="50px"></a></td>
                            <td><?php echo $row['penerbit'] ?></td>
                            <td><?php echo $row['tahun_penerbit'] ?></td>
	<td>Rp. <?php echo number_format($row['buku_price']) ?></td>
							<td>
								<a href="edit-buku.php">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['id']?>" onclick="return confirm('Apakah Anda Yakin ingin menghapus?')">Hapus</a>
							</td>
						</tr>
					<?php }}else{ ?>
						<tr>
							<td colspan="7">Tidak Ada Data Buku</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
