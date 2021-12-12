<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
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
			margin: 150px auto 0;
			background-color: rgba(0,0,0,0);
		}

        .main{
            width: 600px;
            margin: 200px auto 300px;
        }

        .footer{
            width: 100%;
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
        <form action="" method="post">
            <table>
                    <tr>
                        <td>Username</td>
                        <td><input type='text' name='Username' size='35' placeholder='Silahkan Masukkan Username ' autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type='password' name='pass' size='35' placeholder='Silahkan Masukkan Password ' id="password"><br>
                            <input type="checkbox" onclick="myFunction()">Show Password
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2><center><button class="tombol" type="submit" name="login">Sign in</button></center>
                        </td>
                    </tr>
            </table>
        </form>
                    <p>Belum Mempunyai akun ? </p>
                    <p>Silahkan melakukan <a href='Registrasi.php'>Registrasi Terlebih dahulu</a> Or </p>
                    <p><a href='../index.php'>Silahkan Ke halaman Utama</a></p>
        <?php
            if(isset($_POST['login'])){
                // Buat Buka Session
                session_start();
                include 'db.php';
                $user = mysqli_real_escape_string($conn,$_POST['Username']);
                $pass = mysqli_real_escape_string($conn,$_POST['pass']);
                $cek_user = mysqli_query($conn,"SELECT * FROM tb_pelanggan WHERE Username ='".$user."' AND Password='".$pass."'");
                $cek_admin= mysqli_query($conn,"SELECT * FROM tb_admin WHERE nama ='".$user."' AND password='".$pass."'");
                if(mysqli_num_rows($cek_user)>0 || mysqli_num_rows($cek_admin)>0){
                    if(mysqli_num_rows($cek_user)>0){
                        $data=mysqli_fetch_object($cek_user);
                        $_SESSION['status_login']=true;
                        $_SESSION['a_global']=$data;
                        $_SESSION['id_user']=$data->id;
                        echo '<script>alert("Anda Berhasil Login")</script>';
                        echo '<script>window.location="index.php"</script>';
                    }
                    else if(mysqli_num_rows($cek_admin)>0){
                        $data_admin=mysqli_fetch_object($cek_admin);
                        $_SESSION['status_login']=true;
                        $_SESSION['a_global']=$data_admin;
                        $_SESSION['idm']=$data_admin->id_admin;
                        echo '<script>alert("Anda Berhasil Login")</script>';
                        echo '<script>window.location="mybook/MyBook/tampilDataBuku.php"</script>';
                    }
                }
                else{
                    if($user == '' or $pass == ''){
                        echo '<script>alert("Periksa Kembali Username atau Password")</script>';
                    }
                    else{
                        echo '<script>alert("Username atau Password Anda Salah!")</script>';
                    }                       
                }
            }
            if(isset($_POST['tb_pelanggan'])){
                echo '<script>window.location="Registrasi.php"</script>';
            }
               
        ?>
    </div>
</body>
</html>