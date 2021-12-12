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
            font-weight: lighter;
            letter-spacing: 5px;
            text-align: justify;
        }
    .logo h4{
            
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
<div class="header">
        <div class="logo">
            <a href="">
                <h1>Toko Buku Online</h1>
            </a>
			<ul>
				<li><a href="index.php">Buku</a></li>
				<li><a href="profil-pelanggan.php">Profil</a></li>
				<li><a href="pesanan.php">Pesanan</a></li>
				<li><a href="keluar.php">Logout</a></li>
			</ul>
        </div>
    </div>
	<header>
		<div class="container">
		</div>
	</header>
	<!-- content -->
	<div class="section" style="background-color:#22577E">
		<div class="container">
			<h3 style="color:white">Data Pesanan</h3>
			<div class="box" style="background-color:#5584AC">
				<table class="table" border="1" cellspacing="0">
					<thead>
						<tr>
							<th width="100px">No</th>
							<th>Judul</th>
							<th>Gambar</th>
							<th>Penerbit</th>
							<th>Tahun</th>
							<th>Penulis</th>
							<th>Deskripsi</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Total</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$no=1;
							$buku = mysqli_query($conn,"SELECT * FROM tb_pesanan where kode='".$_SESSION['id_user']."'");
							if(mysqli_num_rows($buku)>0){
							$total_harga=0;
							while($row=mysqli_fetch_array($buku)){
							
						?>
						<tr style="text-align: center">
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['judul'] ?></td>	
							<td><a href="mybook/MyBook/buku/<?php echo $row['gambar'] ?>" target="_blank"><img src="mybook/MyBook/buku/<?php echo $row['gambar'] ?>" width="50px"></a></td>
							<td><?php echo $row['penerbit']?></td>
							<td><?php echo $row['tahun']?></td>
							<td><?php echo $row['penulis']?></td>
							<td><?php echo $row['deskripsi']?></td>			
							<td>Rp. <?php echo number_format($row['harga']); ?></td>
							<td><?php echo $row['jumlah'] ?></td>
							<td><?php echo number_format($total=$row['harga']*$row['jumlah']) ?></td>
							<?php $total_harga+=$total; ?>
							<td><a href="proses-hapus.php?idp=<?php echo $row['id_pesanan'];?>" onclick="return confirm('Yakin ingin membatalkan pesanan?')">Hapus</a></td>
						</tr>
					<?php 
						$total_harga+=$total;
				}}else{ ?>
						<tr>
							<td colspan="8" style="text-align:center;">Belum Ada Pemesanan Buku anda</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<a href="transaksi.php"><button>Bayar</button></a>
			</div>
		</div>
	</div>
</body>
</html>
