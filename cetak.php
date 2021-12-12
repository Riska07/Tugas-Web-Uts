<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<table border= '1' cellspacing='0' cellpadding='10' >
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php
            include'db.php';
            session_start();
            $data = mysqli_query($conn, "SELECT * FROM tb_pesanan where kode='".$_SESSION['id_user']."'"); 
            $no = 1;
            $total_harga=0;
            if(mysqli_num_rows($data)>0){
            while ($buku = mysqli_fetch_array($data)){
            
                ?>
            <tr style="text-align:center">
                <td><?php echo $no++?></td>
                <td><?php echo $buku['judul']?></td>
                <td><img src="mybook/MyBook/buku/<?php echo $buku['gambar']?>" width="50px"></td>
                <td><?php echo $buku['harga']?></td>
                <td><?php echo $buku['jumlah']?></td>
                <td><?php echo $total=$buku['harga']*$buku['jumlah']?></td>

            </tr>
            	<?php
            	$total_harga+=$total;
             }}else{ ?>
            <tr>
                <td colspan="7" style="text-align:center">Tidak Ada Buku</td>
            </tr>
        <?php } ?>
         </table>
         <input type="submit" style="margin-left: 350px; margin-top: 25px;"name="" value="Total = Rp. <?php echo number_format($total_harga)?>">
	    <script>
	        window.print();
	        <?php mysqli_query($conn,"DELETE FROM tb_pesanan where kode='".$_SESSION['id_user']."'") ?>
	    </script>

</body>
</html>