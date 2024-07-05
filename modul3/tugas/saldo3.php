<?php
session_start();        //membuka session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo 3</title>
</head>
<body>
    <p>Pilih Menu : 3</p>
    <form method="POST">        <!--mengirim nilai dengan menggunakan metode post-->
        <label>Masukkan Saldo</label>
        <input type="number" name="saldo3"><br>      <!-- inputan untuk saldo3 -->
        <input type="submit" value="tambah" name="tambah"><br>          <!-- submit untuk mendapatkan nilai -->

    </form>
    <?php
    if(isset($_POST['tambah'])){                    //jika tombol tambah ditekan
        $_SESSION['saldo3']+=$_POST['saldo3'];          //array session saldo3 akan ditambah dengan nilai dari post saldo3 sekaligus menampung nilainya
        echo "Saldo tabungan rekening 3 telah ditambahkan";     //menampilkan teks
    }
    ?>
            <p><a href="index.php">Kembali ke menu</a></p>       <!--mengarahkan ke file index.php-->
</body>
</html>