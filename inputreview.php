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
                <h1>Toko Buku online</h1>
            </a>
        </div>
        <ul>
            <li>Daftar Buku</li>
            <li>Review Buku</a></li>
            <li>Log out</li>
        </ul>
    </div>
    <div class="main">
        <div class="paket">
            <?php
                echo "
                    <h1>Review Ebook </h1>
                    <form method=POST action='prosesreview.php?aksi=simpan'>
                    <table class='content-table'>
                        <tr>
                            <td>Judul Buku</td><td colspan=3><input type='text' name='judul_buku' size=50 maxlength=50 required></td>
                        </tr>
                        <tr><td>Isi</td><td colspan=3><input type='text' name='isi' size=50 maxlength=50 required></td></tr>
                        <tr><td>Penulis Review</td><td colspan=3><input type='text' name='penulis_review' size=50 maxlength=50 required></td></tr>
                        <tr id='submit'>
                            <td colspan='3'>
                                <input name='submit' type='submit' value='simpan'>
                            </td>
                        </tr>
                    </table>
                </form>
                ";
            ?>
        </div>
    </div>
</body>
</html>