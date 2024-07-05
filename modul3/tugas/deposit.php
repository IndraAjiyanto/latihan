<?php
session_start();         //membuka session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit</title>
</head>
<body>
    <p>Pilih Menu : deposit</p>
    <form method="POST">                 <!--mengirim nilai dengan menggunakan metode post-->
        <label>Masukkan Saldo deposit</label>
        <input type="number" name="deposit"><br>        <!-- inputan untuk deposit -->
        <input type="submit" value="tambah" name="tambah"><br>      <!-- submit untuk mendapatkan nilai -->
    </form>

    <?php
    if(isset($_POST['tambah'])){                     //jika tombol tambah ditekan
        $_SESSION['deposit']+=$_POST['deposit'];        //array session deposit akan ditambah dengan nilai dari post deposit sekaligus menampung nilainya
        echo "Saldo tabungan deposit telah ditambahkan";  //menampilkan teks
    }
    ?>


    <p><a href="index.php">Kembali ke menu</a></p>      <!--mengarahkan ke file index.php-->
</body>
</html>