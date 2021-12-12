<?php
		include 'db.php';
		session_start();
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	
	<form method="POST" enctype="multipart/form-data" >
		<table>
			<tr>
				<td>Kode Pemesanan</td>
				<td>:</td>
				<td><?php echo $_SESSION['id_user']?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo $_SESSION['a_global']->Nama; ?>" required></td>
			</tr>
			<tr>
				<td>Tanggal Pemesanan</td>
				<td>:</td>
				<td>
					<input type="date" name="tanggal"required>
				</td>
			</tr>
			<tr>
				<td>No HP</td>
				<td>:</td>
				<td>
					<input type="text" name="no_hp" required>
				</td>
			</tr>
			<tr>
				<td>Bukti Pembayaran</td>
				<td>:</td>
				<td>
					<input type="file" name="gambar" required>
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
			$filename = $_FILES['gambar']['name'];
			$tmp_name = $_FILES['gambar']['tmp_name'];
			$type1 = explode('.', $filename);
			$type2 = $type1[1];

			$newname = 'bukti'.time().'.'.$type2;

			// print_r($_FILES['gambar']);
			// menampung data format file yang diizinkan
			$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
			// validasi format file
			if(!in_array($type2, $tipe_diizinkan)){

				
				// jika format file tidak ada di dalam tipe diizinkan
				echo '<script>alert("Format file tidak diizinkan")</script>';
			}else{
				// jika format file sesuai dengan yang ada di dalam arraytipe diizinkan
				// proses upload file sekaligus insert ke database
				move_uploaded_file($tmp_name,'./bukti/'.$newname);
				$insert=mysqli_query($conn,"INSERT INTO tb_transaksi values(null,
								'".$_SESSION['id_user']."',
								'".$_POST['nama']."',
								'".$_POST['tanggal']."',
								'".$_POST['no_hp']."',
								'".$newname."'
								)");
				if($insert){
					echo '<script>alert("Terima Kasih Telah Melakukan Pembayaran")</script>';
					echo '<script>window.location="cetak.php"</script>';

				}else{
					echo 'gagal'.mysqli_error($conn);
				}
			}
		}
	?>
</body>
</html>