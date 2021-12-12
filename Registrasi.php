	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sign up</title>
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
			.main{
				width: 425px;
				margin: 100px auto 0;
				background-color: rgba(0,0,0,0);
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
    </div>
	<div class="main">
			<form method=POST action=''>
			<table border=1 cellspacing=0 cellpadding=10>
				<tr><th colspan=2>Registrasi Akun Anda</th></tr>
				<tr><td>Nama</td><td><input type='text' name='Nama' size=40 maxlength=50></td></tr>
				<tr>
					<td>Jenis kelamin</td>
					<td>
						<select name="jenis_kelamin" required>
							<option value="">--Pilih--</option>
							<option value="Laki - Laki">Laki - Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</td>
				</tr>
				<tr><td>No Hp</td><td><input type="number" name="no_hp" size=40 maxlength=50></td></tr>
				<tr><td>Username</td><td><input type='text' name='User' size=40 maxlength=50></td></tr>
				<tr><td>Email</td><td><input type='text' name='Email' size=40 maxlength=50></td><tr>
				<tr><td>Password</td><td><input type='password' name='Pass' size=40 maxlength=50></td></tr>
				<tr><th colspan=2><br/><input style='background-color: salmon;' type='submit' value='Sign up' name='simpan'></th></tr>
			</table></form>
			<?php
		//Proses.php
		if (isset($_POST['simpan'])){
			include 'db.php';
			$nama = $_POST['Nama'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$no_hp = $_POST ['no_hp'];
			$user = $_POST['User'];
			$email = $_POST['Email'];
			$pass = $_POST['Pass'];


			$tambah = mysqli_query($conn, "INSERT INTO tb_pelanggan values (
				null,
				'".$nama."',
				'".$jenis_kelamin."',
				'".$no_hp."',
				'".$user."',
				'".$email."',
				'".$pass."'
				)");

			if($tambah){
				echo '<script>alert("Daftar Akun Berhasil")</script>';
				echo '<script>window.location="login.php"</script>'; 
			}
			else{
				echo 'gagal'.mysqli_error($conn);
			}
		}

		
		
	?>
			<p>Jika sudah memiliki akun silahkan <a href="Login.php">Login</a></p>
		</div>

	</body>
	</html>