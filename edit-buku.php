<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="Login.php"</script>';
	}
	$buku=mysqli_query($conn,"SELECT * FROM buku WHERE id='".$_GET['id']."'");
	if(mysqli_num_rows($bukuk)==0){
		echo '<script>window.location="data-bukuu.php"</script>';
	}
	$p=mysqli_fetch_object($buku);	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-widthm initial-scale=1" charset="utf-8">
	<title>Buka Buku</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
						<li><a href="data-bukuu.php" style="padding-right:15px;padding-left: 14px;">Data Buku/a></li>
					</ul>
				</li>
				<li class="dropdown-customer"><a href="#" >Data Customer</a>
					<ul class="isi-dropdown-customer">
						<li><a href="data-pemesanan.php" style="padding-right: 8px;padding-left: 14px;">Data Pembayaran</a></li>
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
			<h3 style="color:white">Edit Data Buku</h3>
			<div class="box" style="background-color:#FFBF00">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value="">--Pilih Kategori Buku--</option>
						<?php 
							$kategori=mysqli_query($conn,"SELECT * FROM tb_category ORDER BY category_id DESC");
							while($r=mysqli_fetch_array($kategori)){
						?>
					<option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id']==$p->category_id)?'selected':""; ?>><?php echo $r['category_name']; ?></option>
					<?php } ?>
					</select>
					<input type="text" name="judul" placeholder="Judul Buku" class="input-control" value="<?php echo $p->judul ?>" required>
					<input type="text" name="harga" placeholder="Harga Buku" class="input-control" value="<?php echo $p->harga_buku ?>" required>

					<img src="produk/<?php echo $p->Buku_image ?>" width="150px">
					<input type="hidden" name="foto" value="<?php echo $p->buku_image ?>">
					<input type="file" name="gambar" class="input-control">
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->descripsi_buku ?></textarea><br>
					<input type="submit" name="submit" value="Update Buku" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){
						// tampung  data inputan dari form
						$kategori 	= $_POST['kategori'];
						$judul 		= ucwords($_POST['judul']);
                        $foto		= $_POST['foto'];
                        $penerbit   = $_POST['penerbit'];
                        $tahun_penerbit = $_POST ['tahun_penerbit'];
                        $deskripsi	= $_POST['deskripsi'];
						$harga 		= $_POST['harga'];
						$penulis		= $_POST['penulis'];

						//  tampung data gambar yang baru
							$filename = $_FILES['gambar']['name'];
							$tmp_name = $_FILES['gambar']['tmp_name'];
							
	
						

						// jika admin ganti gambar
						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'buku'.time().'.'.$type2;

							// menampung data format file yang diizinkan
							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
							if(!in_array($type2, $tipe_diizinkan)){
							// jika format file tidak ada di dalam tipe diizinkan
								$namagambar=$foto;
								echo '<script>alert("Format file tidak diizinkan")</script>';
								echo '<script>window.location="data-bukuu.php"</script>';

							}else{
								unlink('./buku/'.$foto);
								move_uploaded_file($tmp_name,'./buku/'.$newname);
								$namagambar=$newname;
							}

						}else{
							//  jika admin tidak ganti gambar
							$namagambar=$foto;
						}

						// query UPDATE data barang
						$update=mysqli_query($conn,"UPDATE buku SET 
											category_id='".$kategori."',
											judul='".$judul."',
                                            gambar_buku='".$namagambar."',
                                            penerbit='".$penerbit."',
                                            tahunn_penerbit='".$tahun_penerbit."'
											product_price='".$harga."',
											product_description='".$deskripsi."',
											penulis='".$penulis."'
											WHERE id='".$p->id."'");
						if($update){
							echo '<script>alert("Update Barang Telah Berhasil")</script>';
							echo '<script>window.location="data-bukuu.php"</script>';
						}else{
							echo 'gagal'.mysqli_error($conn);
						}
					}

				?>
			</div>
		</div>
	</div>

	<script>
            CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>
