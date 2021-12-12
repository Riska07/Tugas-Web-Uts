<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="Login.php"</script>';
	}
	$query=mysqli_query($conn,"SELECT * FROM tb_admin where id ='".$_SESSION['id']."'");
	$d=mysqli_fetch_object($query);
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
			<h1><a href="dashboard.php">Toko Buku Online</a></h1>
			<ul>
				<li><a href="profil.php">Profil</a></li>
				<li class="dropdown"><a href="#">Data Buku</a>
					<ul class="isi-dropdown">
						<li><a href="data-kategori.php" style="padding-right:10px;padding-left: 14px;">Data Kategori</a></li>
						<li><a href="data-buku.php" style="padding-right:14.1px;padding-left: 14px;">Data Buku</a></li>
					</ul>
				</li>
				<li class="dropdown-customer"><a href="#" >Data Customer</a>
					<ul class="isi-dropdown-customer">
						<li><a href="data-pemesanan.php" style="padding-right: 3px;padding-left: 14px;">Data Pembayaran</a></li>
						<li><a href="data-pelanggan.php" style="padding-right: 11px;padding-left: 14px;">Data Pelanggan</a></li>
					</ul>
				</li>
				<li><a href="keluar.php">Logout</a></li> 
			</ul>
		</div>
	</header>
	<!-- content -->
	<div class="section" style="background-color:#900C3F">
		<div class="container">
			<h3 style="color:white">Profil</h3>
			<div class="box" style="background-color:#FFBF00">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name?>" required>
                    <input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" class="input-control" value="<?php echo $d->admin_name?>" required>
                    <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp?>" required>
					<input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username?>" required>
					<input type="submit" name="submit" value="Update Profil" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama 	= ucwords($_POST['nama']);
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $hp 	= $_POST['hp'];
                        $email 	= $_POST['email'];
						$user 	= $_POST['user'];
						

						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="profil.php"</script>';
						}else{
							echo 'gagal'.mysqli_error($conn);
						}
					}
				 ?>
			</div>

			<h3 style="color:white">Ubah Password</h3>
			<div class="box" style="background-color:#FFBF00">
				<form action="" method="POST">
					<input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
					<input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
					<input type="submit" name="ubah_password" value="Update Password" class="btn">
				</form>
				<?php 
					
				 ?>
			</div>
		</div>
	</div>
</body>
</html>
