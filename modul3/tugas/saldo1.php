<?php
session_start(); //membuka session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo 1</title>
</head>
<body>
    <p>Pilih Menu : 1</p>
    <form method="POST">        <!--mengirim nilai dengan menggunakan metode post-->
        <label>Masukkan Saldo</label>
        <input type="number" name="saldo1"><br>         <!-- inputan untuk saldo1 -->
        <input type="submit" value="tambah" name="tambah"><br> <!-- submit untuk mendapatkan nilai -->
    </form>

    <?php
    if(isset($_POST['tambah'])){                 //jika tombol tambah ditekan
        $_SESSION['saldo1']+=$_POST['saldo1'];        //array session saldo1 akan ditambah dengan nilai dari post saldo1 sekaligus menampung nilainya
        echo "Saldo tabungan rekening 1 telah ditambahkan";      //menampilkan teks
    }
    ?>


    <p><a href="index.php">Kembali ke menu</a></p>      <!--mengarahkan ke file index.php-->
</body>
</html>