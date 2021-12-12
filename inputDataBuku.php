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
                <h1>Toko Buku Online</h1>
            </a>
        </div>
        <ul>
        <li><a href="">Daftar Buku</a></li>
        <li><a href="reviewAdmin.php">Review Buku</a></li>
        <li><a href="keluar.php">Log out</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="paket">
                
                        <h1>Data Ebook </h1>
                        <form method=POST action='' enctype="multipart/form-data">
                    <table class='content-table'>
                        <tr>
                            <td>Judul Buku</td><td colspan=3><input type='text' name='judul' size=50 maxlength=50 required></td>
                        </tr>
                        <tr>
                            <td>Gambar Buku</td>
                            <td>
                            <input type='file' name='gambar' required>
                            </td>
                    
                        <tr>
                            <td>Penerbit</td>
                            <td>
                                <input type='text' name='penerbit' size=50 maxlength=50 required>
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun Penerbit</td>
                            <td>
                                <input type='date' name='tahun_penerbit' size=50 maxlength=50 required>
                            </td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>
                                <input type='text' name='penulis' size=50 maxlength=50 required>
                            </td>
                        </tr>
                        <tr>
                            <td>Descripsi</td>
                            <td><textarea name="descripsi_buku" cols="30" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>
                                <input type="text" name="harga_buku" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Review</td>
                            <td>
                                <input type='text' name='review' size=60 maxlength=60 required>
                            </td>
                        </tr>
                        <tr id='submit'>
                            <td colspan='3'>
                                <input name='submit' type='submit' value='simpan'>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        include 'db.php';
                        $judul =ucwords($_POST['judul']);
                        $penerbit =$_POST['penerbit'];
                        $tahun_penerbit =$_POST['tahun_penerbit'];
                        $penulis =$_POST['penulis'];
                        $descripsi_buku =$_POST['descripsi_buku'];
                        $harga_buku =$_POST['harga_buku'];
                        $review =$_POST['review'];
                        
                        // menampung data file yang diupload
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];
						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'buku'.time().'.'.$type2;

						// menampung data format file yang diizinkan
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						// validasi format file
						if(!in_array($type2, $tipe_diizinkan)){
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</script>';
						}else{
							// jika format file sesuai dengan yang ada di dalam arraytipe diizinkan
							// proses upload file sekaligus insert ke database
							move_uploaded_file($tmp_name,'./buku/'.$newname);

							$insert = mysqli_query($conn,"INSERT INTO buku VALUES (null,
                                '".$judul."',
                                '".$newname."',
                                '".$penerbit."',
                                '".$tahun_penerbit."',
                                '".$descripsi_buku."',
								'".$penulis."',
								'".$harga_buku."',
								'".$review."'
									)");
							if($insert){
								echo '<script>alert("Tambah Data Berhasil")</script>';
								echo '<script>window.location="tampilDataBuku.php"</script>';
							}else{
								echo 'gagal'.mysqli_error($conn);
							}
						}
                    }
                ?>

        </div>
    </div>
</body>
</html>