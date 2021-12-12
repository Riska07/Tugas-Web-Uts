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
					</ul>
				</li>
				<li><a href="keluar.php">Logout</a></li> 
			</ul>
		</div>
	</header>
	<!-- content -->
	<div class="section" style="background-color:#900C3F">
		<div class="container">
			<h3 style="color:white">Data Kategori</h3>
			<div class="box" style="background-color:#FFBF00">
				<b><p><a href="tambah-kategori.php">Tambah Data</a></p></b><br>
				<table class="table" border="1" cellspacing="0">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php  
						$no=1;
							$kategori = mysqli_query($conn,"SELECT * FROM tb_category ORDER BY category_id DESC");
							if(mysqli_num_rows($kategori)>0){
							while($row=mysqli_fetch_array($kategori)){
						?>
						<tr>
							<td style="text-align:center;"><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td style="text-align:center">
								<a href="edit-kategori.php?id=<?php echo $row['category_id']?>">Edit</a> || <a href="proses-hapus.php?idk=<?php echo $row['category_id']?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
					<?php }}else{ ?>
						<tr>
							<td colspan="3">Tidak Ada Data</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
