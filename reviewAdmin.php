<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Read Data</title>
    <style>
        .main{
            width: 600px;
            margin: 200px auto 300px;
        }

        .footer{
            width: 95%;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="">
                <h1>Toko Buku Online/h1>
            </a>
        </div>
        <ul>
        <li><a href="">Daftar Buku</a></li>
        <li><a href="reviewAdmin.php">Review Buku</a></li>
        </ul>
    </div>
    <div class="main">
        <?php
        $con = mysqli_connect('localhost','root','','penjualan_ebook') or die ("Koneksi gagal"); //koneksi ke database
        echo "
            <h2>Data Ebook</h2>
            <input type=button value='Tambah Data' onclick=\"window.location.href='inputreview.php';\"><p/>
            <table class='content-table' border= '1' cellspacing='0' cellpadding='10'>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Isi Review</th>
                <th>Penulis Review</th>
                <th>Akis</th>
            </tr>";
            $qry = mysqli_query($con, "SELECT id, judul_buku, isi, penulis_review FROM review ORDER BY id Asc"); 
            $no = 1;
            while ($data = mysqli_fetch_array($qry)){
                echo "<tr>
                        <td>$no</td>
                        <td>$data[judul_buku]</td>
                        <td>$data[isi]</td>
                        <td>$data[penulis_review]</td>
                        <td>
                            <a class='edit' href='prosesreview.php?aksi=hapus&id=$data[id]'>Hapus</a>
                        </td>
                    </tr>";
                $no++;
            }
        echo "</table>"
        ?>
    </div>
</body>
</html>