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
	<title>Open Buku</title>
	<style>
	.header{
            padding: 10px;
            width: 100%;
            display: flex;
            background-color: rgb(255, 255, 255);
            text-align: right;
            box-shadow: 0 4px 8px 0 rgba(0,0, 0, 0.2);
            position:sticky;
        }
    .header a{
            font-size: 16px;
            text-decoration: none;
            color: rgb(0, 0, 0); 
            /* border: 1px solid black; */
        }
    .header ul{
            display: flex;
            /* border: 1px solid black; */
            margin-left: 600px;
        }
        
    .logo{
            display: inline;
            margin-top: 5px;
            margin-left: 100px;
            /* border: 1px solid black; */
        }
    .logo h1{
            color: rgb(0, 0, 0);
            font-family: "logoLR";
            font-weight: lighter;
            letter-spacing: 5px;
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
		margin-top : 215px;

	}
	</style>
	<link rel="stylesheet" href="stylesheet/style.css">
	<link rel="https://fonts.googleapis.com/css2?family=Scheherazade+New&display=swap" rel="stylesheet">
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

<!-- search -->
	<div class="search" style="background-color:#FFC4E1">
		<div class="container">
		</div>
	</div>

	<!-- new buku -->
	<div class="section" >
		<div class="container" style="background-color: cadetblue;" >
			<h3 style="color:black;">Buku </h3>
			<div class="box" style="background-color: darkslategray;">
				<?php 
					$buku=mysqli_query($conn,"SELECT * FROM buku ");
					if(mysqli_num_rows($buku)>0){
						while ($p=mysqli_fetch_array($buku)){

				 ?>
				 <a href="detail-buku.php?id=<?php echo $p['id'] ?>" style="text-decoration: none;">
					<div class="col-4">
						<img src="mybook/MyBook/buku/<?php echo $p['buku_image']?>" width="100px">
						<p><?php echo substr($p['judul'], 0,30) ?></p>
						<p class="harga">Rp. <?php echo ($p['harga_buku']) ?></p>
				</a>
						<form method="POST" style="float: left;" enctype="multipart/form-data">
							<button type="submit" name="pesan" class="btn-pesan" value="<?php echo $id=$p['id']; ?>">Pesan</button>&nbsp;
							<select class="select" name="jmlh">
									<option value="1">&nbsp;&nbsp;1</option	>
									<option value="2">&nbsp;&nbsp;2</option>
									<option value="3">&nbsp;&nbsp;3</option>
									<option value="4">&nbsp;&nbsp;4</option>
									<option value="5">&nbsp;&nbsp;5</option>
									<option value="6">&nbsp;&nbsp;6</option>
									<option value="7">&nbsp;&nbsp;7</option>
									<option value="8">&nbsp;&nbsp;8</option>
									<option value="9">&nbsp;&nbsp;9</option>
									<option value="10">&nbsp;&nbsp;10</option>
							</select>
					
						</form>

					</div>
				
				<?php }
					if(isset($_POST['pesan'])){
						$id=$_POST['pesan'];
						$jumlah=$_POST['jmlh'];
						$databuku = mysqli_query($conn,"SELECT * FROM buku WHERE id='".$id."'");
						if(mysqli_num_rows($databuku)>0){
							$row=mysqli_fetch_array($databuku);
							$judul=ucwords($row['judul']);
							$gambar=$row['buku_image'];
							$penerbit=$row['penerbit'];
							$tahun=$row['tahun_penerbit'];
							$descripsi=$row['descripsi_buku'];
							$penulis=$row['penulis'];
							$harga=$row['harga_buku'];	
							$review=$row['review'];
							$pesanan=mysqli_query($conn,"INSERT into tb_pesanan values(null,
							'".$_SESSION['id_user']."',
							'".$judul."',
							'".$harga."',
							'".$gambar."',
							'".$jumlah."',
							'".$penerbit."',
							'".$tahun."',
							'".$descripsi."',
							'".$penulis."',
							'".$review."'
							)");
						if($pesanan){
							echo '<script>alert("Apa anda yakin ingin membeli buku ini? ")</script>';
							echo '<script>alert("Buku berhasil dipesan! ")</script>';
						}else{	
							echo 'gagal'.mysqli_error($conn);
						}
					}
					}

				} else{ ?>
					<p>Buku yang anda Pilih Tidak ada</p>
				<?php }?>		
			</div>
		</div>
	</div>
</body>
</html>
 