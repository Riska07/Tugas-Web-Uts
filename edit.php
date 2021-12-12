<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Data</title>
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
.header li{
    display: inline;
    list-style-type: none;
    margin: 20px;
}


		.main{
			width: 550px;
			border: 1px solid black;
			margin: 200px auto 0;
			padding: 20px;
			background-color: rgba(255,255,255,0.7);
		}

		.main h2{
			text-align: center;
			color: #6495ED;
		}

		td{
			color: #0000CD;
		}
.footer{
    width: 95%;
    padding: 50px;
    background-color: black;
    margin-top: 500px;
    text-align: center;
}
.footer a{
    text-decoration: none;
    font-size: 15px;
    color:rgb(139, 2, 2) ;
    padding: 20px;
    font-size: 20px;
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
        <li><a href="">Review Buku</a></li>
        <li><a href="keluar.php">Log out</a></li>
        </ul>
    </div>
	<div class="main">
		<?php
			//edit.php
			$con = mysqli_connect('localhost','root','','consumen') or die ("Koneksi gagal"); 
			$data=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM buku WHERE id='$_GET[id]'"));
			echo "<h2>Edit Data Buku</h2>
			<form method=POST action='prosesBuku.php?aksi=update'>
			<input type='hidden' name='idlama' value='$data[id]'>
			<table>
				<tr><td>Judul</td><td colspan=3><input type='text' name='judul' size=40 maxlength=50 value='$data[judul]'></td></tr>
				<tr><td>penerbit</td><td colspan=3><input type='text' name='penerbit' size=40 maxlength=50 value='$data[penerbit]'></td></tr>
                <tr><td>Tahun Penerbit</td><td colspan=3><input type='text' name='tahun_penerbit' size=40 maxlength=50 value='$data[tahun_penerbit]'> 
                <tr><td>Penulis</td><td colspan=3><input type='text' name='penulis' size=40 maxlength=40 value='$data[penulis]'>
                <tr><td>Review</td><td colspan=3><input type='text' name='review' size=40 maxlength=50 value='$data[review]'>   
                <tr><td colspan=4><br/><input style='background-color:yellow;' type='submit' value='Simpan'></td></tr>
            </table></form>";
		?>
	</div>
</body>
</html>