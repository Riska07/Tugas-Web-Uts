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
	<link rel="stylesheet"  href="stylesheet/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container">
			<h1><a href="index.php">Toko Buku Online/a></h1>
			<ul>
				<li><a href="buku.php">Buku</a></li>
				<li><a href="profil-pelanggan.php">Profil</a></li>
				<li><a href="pesanan.php">Pesanan</a></li>
				<li><a href="keluar.php">Logout</a></li>
			</ul>
		</div>
	</header>
	<!-- content -->
	<div class="section" style="background-color:#900C3F">
		<div class="container">
			<h3 style="color:white">Pembayaran</h3>
			<div class="box-register" style="background-color:#FFBF00">
				<?php
					$data_pesanan = mysqli_query($conn,"SELECT * FROM tb_pemesanan where kode='".$_SESSION['id']."'");
					if(mysqli_num_rows($data_pesanan)>0){
				?>
				<form action="" method="POST" enctype="multipart/form-data" > 
					<table border="0" class="table-form" >
					<tr>
						<td>Kode Pemesanan</td>
						<td>:</td>
						<td>
							<button class="id" name="kode"><?php echo $_SESSION['id'] ?></button>
						</td>
					</tr>
					<tr>
						<td>Keterangan pemesanan</td>
						<td>:</td>
						<td>
							<textarea class="input-form" name="keterangan_pemesanan" placeholder="Contoh: Buku Matematika" required></textarea>						
						</td>
					</tr>
					<tr>
						<td>Bukti Pembayaran</td>
						<td>:</td>
						<td>
							<input  class="input-gbr" type="file" name="gambar" required>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="simpan" class="btn-daftar" value="Pesan">
						</td>
					</tr>
				</table>
				</form>

				<?php 

				if(isset($_POST['simpan'])){
					$kode=$_SESSION['id'];
					$ket=$_POST['keterangan'];
					$keterangan="Lunas";

					// menampung data file yang diupload\
					
					// print_r($_FILES['gambar']);
					$filename = $_FILES['gambar']['name'];
					$tmp_name = $_FILES['gambar']['tmp_name'];
					$type1 = explode('.', $filename);
					$type2 = $type1[1];

					$newname = 'bukti'.time().'.'.$type2;

					// menampung data format file yang diizinkan
					$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
					// validasi format file
					if(!in_array($type2, $tipe_diizinkan)){

						
						// jika format file tidak ada di dalam tipe diizinkan
						echo '<script>alert("Format file salah")</script>';
					}else{
						// jika format file sesuai dengan yang ada di dalam arraytipe diizinkan
						// proses upload file sekaligus insert ke database
						move_uploaded_file($tmp_name,'./bukti/'.$newname);
					$insert=mysqli_query($conn,"INSERT INTO tb_pemesanan values(null,
										'".$kode."',
										'".$ket."',
										'".$newname."'
										)");
					$delete=mysqli_query($conn, "DELETE FROM tb_pemesanan WHERE kode='".$_SESSION['id']."'");
					$update=mysqli_query($conn,"UPDATE tb_pesanan SET keterangan='".$keterangan."' WHERE kode_pesanan='".$_SESSION['id']."'");
					if($insert and $delete and $update){
						echo '<script>alert("Terima Kasih Telah Melakukan Pembayaran Di website kami")</script>';
						echo '<script>window.location="pesanan.php"</script>';

					}else{
						echo 'gagal'.mysqli_error($conn);
					}
				}
			} 
		}
			?>
			</div>
		</div>
	</div>
</body>
</html>