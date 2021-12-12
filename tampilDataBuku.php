<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Read Data</title>
    <style>
	.header{
            padding: 10px;
            width: 100%;
            display: flex;
            background-color: rgb(255, 255, 255);
            text-align: right;
            box-shadow: 0 2px 6px 0 rgba(0,0, 0, 0.2);
            position:sticky;
			height:150px;
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
            margin-left: 600px;
        }
        
    .logo{
            display: inline;
            margin-top: auto;
            margin-left: 90px;
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
                <h1>Toko Buku online</h1>
            </a>
        </div>
        <ul>
        <li><a href="">Daftar Buku</a></li>
        <li><a href="reviewAdmin.php">Review Buku</a></li>
        <li><a href="keluar.php">Logout</a></li>
        </ul>
    </div>
    <div class="main">
        <?php
        $con = mysqli_connect('localhost','root','','consumen') or die ("Koneksi gagal"); //koneksi ke database
         ?>
            <h2>Data Ebook</h2>
            <input type=button value='Tambah Data' onclick="window.location.href='inputDataBuku.php';"><p/>
            <table class='content-table' border= '1' cellspacing='0' cellpadding='10' style="width:100%">
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Gambar</th>
                <th>Penerbit</th>
                <th>Tahun Penerbit</th>
                <th>Penulis</th>
                <th>Review</th>
                <th width="150px">Aksi</th> 
            </tr>
            <?php
            $qry = mysqli_query($con, "SELECT * FROM buku ORDER BY id Asc"); 
            $no = 1;
            if(mysqli_num_rows($qry)>0){
            while ($data = mysqli_fetch_array($qry)){
                ?>
            <tr style="text-align:center">
                        <td><?php echo $no++?></td>
                        <td><?php echo $data['judul']?></td>
                        <td><img src="buku/<?php echo $data['buku_image']?>" width="50px"></td>
                        <td><?php echo $data['penerbit']?></td>
                        <td><?php echo $data['tahun_penerbit']?></td>
                        <td><?php echo $data['penulis']?></td>
                        <td><?php echo $data['review']?></td>
                        <td>
                            <a href='hapus.php?aksi=<?php echo $data['id']?>'>Hapus</a> || 
                            <a href='edit.php?id=<?php echo $data['id']?>'>Edit</a>
                        </td>
                    </tr>
            <?php }}else{ ?>
            <tr>
                <td colspan="9" style="text-align:center">Tidak Ada Buku</td>
            </tr>
        <?php } ?>
         </table>
</body>
</html>