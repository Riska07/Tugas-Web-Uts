<?php


    $conn = mysqli_connect("localhost", "root", "", "consumen");

    if(isset($_POST['login'])){

        $username = $_POST["nama"];
        $password = $_POST["pass"];

        $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE
            nama = '$username'");
        

        if(mysqli_num_rows($result) === 1){
            // cek password
            $row = mysqli_fetch_assoc($result);
            if($password === $row["password"]){
                // set session
                $_SESSION["login"] = true;
                header("location: tampilDataBuku.php");
                exit;
            }
        }

        $error = true;
    }
   


?>
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
    <div class="main"><form action="" method="post">
    <table>
            <tr><td>admin</td><td><input type='text' name='nama' size='35' placeholder='Masukkan Nama Admin' autocomplete="off"></td></tr>
            <tr><td>Password</td><td><input type='password' name='pass' size='35' placeholder='Masukkan Password' id="password"><br><input type="checkbox" onclick="myFunction()">Show Password</td></tr>
            <tr><td colspan=2><button class="tombol" type="submit" name="login">Login</button></td></tr>
    </table></form></div>
    
</body>
</html>