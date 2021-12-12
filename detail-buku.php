<?php
	error_reporting(0);
	include 'db.php';
	$buku=mysqli_query($conn,"SELECT * FROM buku WHERE id='".$_GET['id']."' ");
	$p=mysqli_fetch_object($buku);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-widthm initial-scale=1" charset="utf-8">
	<title>Buka Buku</title>
	<style>
	.header{
            padding: 5px;
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
			margin-right: 27px;
            /* border: 1px solid black; */
        }
    .header ul{
            display: flex;
            /* border: 1px solid black; */
            margin-left: 1000px;
        }
        
    .logo{
            display: inline;
            margin-top: 5px;
            margin-left: 80px;
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
		margin-top : 350px;

	}
	</style>
</head>
<body>
	<header>
		<div class="container">
			<h1><a href="index.php">Toko Buku Online</a></h1>
			<ul>
				<li><a href="buku.php">Buku</a></li>
				<li><a href="profil-pelanggan.php">Profil</a></li>
				<li><a href="keluar.php">Logout</a></li>
			</ul>
		</div>
	</header>


<!-- product detail -->
	<div class="section" style="background-color:#900C3F">
		<div class="container">
			<h3 style="color:white">Detail Buku</h3>
			<div class="box" style="background-color:#FFBF00">
				<div class="col-2">
					<a href="mybook/MyBook/buku/<?php echo $p->buku_image ?>" target="_blank"><center><img src="mybook/MyBook/buku/<?php echo $p->buku_image ?>" width="200px"style="border:none"></center></a>
				</div>
				<div class="col-2">
					<h3><?php echo $p->judul ?></h3>
                    <h4><?php echo $p->Penerbit ?></h4>
                    <h4><?php echo $p->tahun_penerbit ?></h4>
                    <h4><?php echo $p->penulis ?></h4>
                    <p>Deskripsi :<br>
						<?php echo $p->descripsi_buku; ?>
					</p>
					<h4>Rp. <?php echo ($p->harga_buku) ?></h4>
				</div>

			</div>
			<div style="text-align:right;float: right;"><a href="index.php" ><input type="submit"  name="kembali" value="Kembali" class="btn-pesan"></a></div>
		</div>
	</div>
</body>
</html>
