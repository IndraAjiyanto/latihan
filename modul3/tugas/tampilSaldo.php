<?php
session_start(); //membuka session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Saldo</title>
</head>
<body>
<p>Saldo rekening 1 : Rp
    <?php 
    if(!isset($_SESSION['saldo1'])){               //jika tidak ada nilai dari array session saldo1
        $_SESSION['saldo1'] = 0;            //array session saldo 1 diisi dengan nilai 0
        echo $_SESSION['saldo1'];           //menampilkan array session saldo1 yaitu 0
    }else {
        echo $_SESSION['saldo1'];           //menampilkan array session saldo1
    }
    ?></p>
<p>Saldo rekening 2 : Rp
    <?php 
    if(!isset($_SESSION['saldo2'])){               //jika tidak ada nilai dari array session saldo2
        $_SESSION['saldo2'] = 0;            //array session saldo2 diisi dengan nilai 0   
        echo $_SESSION['saldo2'];           //menampilkan array session saldo2 yaitu 0
    }else {
        echo $_SESSION['saldo2'];           //menampilkan array session saldo2
    }
    ?></p>
<p>Saldo rekening 3 : Rp
    <?php 
    if(!isset($_SESSION['saldo3'])){               //jika tidak ada nilai dari array session saldo3
        $_SESSION['saldo3'] = 0;            //array session saldo3 diisi dengan nilai 0 
        echo $_SESSION['saldo3'];           //menampilkan array session saldo3 yaitu 0
    }else {
        echo $_SESSION['saldo3'];           //menampilkan array session saldo3
    }
    ?></p>
<p>Saldo deposito : Rp
    <?php 
    if(!isset($_SESSION['deposit'])){              //jika tidak ada nilai dari array session deposit
        $_SESSION['deposit'] = 0;           //array session deposit diisi dengan nilai 0 
        echo $_SESSION['deposit'];          //menampilkan array session deposit yaitu 0
    }else {
        echo $_SESSION['deposit'];          //menampilkan array session deposit
    }?></p><br>
    <?php
    $jumlahSaldo = $_SESSION['saldo1']  + $_SESSION['saldo2'] + $_SESSION['saldo3'] + $_SESSION['deposit'];   //variabel yang menampung seluruh jumalh saldo
    echo "jumlah saldo :".$jumlahSaldo;   //menampilkan jumlah saldo
    ?>
<p><a href="index.php">Kembali ke menu</a></p>      <!--mengarahkan ke file index.php-->
</body>
</html>