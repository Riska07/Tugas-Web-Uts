<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="Login.php"</script>';
	}
	$query=mysqli_query($conn,"SELECT * FROM tb_pelanggan where id='".$_SESSION['id_user']."' ");
	$data=mysqli_fetch_object($query);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-widthm initial-scale=1" charset="utf-8">
	<title>Buka Buku</title>
	<style>
	.header{
            padding: 10px;
            width: 100%;
            display: flex;
            background-color: rgb(255, 255, 255);
            text-align: right;
            box-shadow: 0 2px 6px 0 rgba(0,0, 0, 0.2);
            position:sticky;
			height:180px;
        }
    .header a{
            font-size: 16px;
            text-decoration: none;
            color: rgb(0, 0, 0); 
			margin-right: 30px;
			list-style: none;
            /* border: 1px solid black; */
        }
    .header ul{
            display: flex;
            /* border: 1px solid black; */
            margin-left: 800px;
        }
        
    .logo{
            display: inline;
            margin-top: auto;
            margin-left: 80px;
            /* border: 1px solid black; */
        }
    .logo h1{
            color: rgb(0, 0, 0);
            font-family: "logoLR";
            font-weight: lighter;
            letter-spacing: 20px;
            text-align: justify;
        }
    .logo h4{
            font-family: "logoLR";
            color: rgb(0, 0, 0);
            font-size: 8px;
            letter-spacing: 10px;
            font-weight: lighter;
            text-align: center;
            /* border: 1px solid black; */
        }
	.footer{
		margin-top : 415px;

	}
	</style>
</head>
<body>
<div class="header">
        <div class="logo">
            <a href="">
                <h1>Toko Buku Online</h1>
            </a>
			<ul>
				<li><a href="index.php">Buku</a></li>
				<li><a href="Profil-pelanggan.php">Profil</a></li>
				<li><a href="pesanan.php">Pesanan</a></li>
				<li><a href="pembayaran.php">Pembayaran</a></li>
				<li><a href="keluar.php">Logout</a></li>
			</ul>
        </div>
    </div>
	<header>
		<div class="container">
		</div>
	</header>
	<!-- content -->
	<div class="section" style="background-color:	#5584AC">
		<div class="container">
			<h3 style="color:white;">Profil</h3>
			<div class="box" style="background-color:#22577E">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $data->Nama?>" required>
					<select class="input-control" name="jenis_kelamin" required>
						<option value="">Jenis Kelamin</option>
						<option value="Laki - Laki" <?php echo ($data->jenis_kelamin=="Laki - Laki")? 'selected':'' ?>>Laki - Laki</option>
						<option value="Perempuan" <?php echo ($data->jenis_kelamin=="Perempuan")? 'selected':'' ?>>Perempuan</option>
					</select>
					<input type="text" name="no_hp" placeholder="No Hp" class="input-control" value="<?php echo $data->no_hp?>" required>
					<input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $data->Email?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $data->Username?>" required>	
					<input type="text" name="pass" placeholder="Email" class="input-control" value="<?php echo $data->Password?>" required>
					<input type="submit" name="submit" value="Update Profil" class="btn">
				</form>
				<?php
					if(isset($_POST['submit'])){

						$nama 	        = ucwords($_POST['nama']);
						$jenis_kelamin	= $_POST['jenis_kelamin'];
						$no_hp      	= $_POST['no_hp'];
                        $email 	        = $_POST['email'];
						$user	        = $_POST['user'];
						$pass	        = $_POST['pass'];
						$update=mysqli_query($conn,"UPDATE tb_pelanggan SET 
							Nama ='".$nama."',
							jenis_kelamin ='".$jenis_kelamin."',
							no_hp ='".$no_hp."',
							Username ='".$user."',
							Email ='".$email."',
							Password ='".$pass."'
							WHERE id='".$_SESSION['id_user']."'
							");

						if($update){
							echo '<script>alert("Ubah Profil Berhasil")</script>';
							echo '<script>window.location="profil-pelanggan.php"</script>';
						}else{
							echo 'gagal'.mysqli_error($conn);
						}
					}
				 ?> 
			</div>
</body>
</html>
