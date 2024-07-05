<?php
session_start();
if(!isset($_SESSION['coba'])){
    $_SESSION['coba'] = 0;
}
//$_SESSION['coba'] = 0;
if(!isset($antrian)){
    $antrian = array (
        'head' => -1,
        'tail' => $_SESSION['coba'],
        'data' => array()
    );
}


$_SESSION['wadah'] = $antrian ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <form action="cetak.php"method="POST">
    <p>Menu Tambah Data Antrian</p>
    <label>Nama :</label>
    <input type="text" name="nama"><br>
    <label>Nomor Rekening :</label>
    <input type="number" name="rekening"><br>
    <input type="submit" name="submit" value="Tambah">
    </form>
    <p><a href="index.php">kembali ke menu utama</a></p>

    <?php

    // if(isset($_POST['submit'])){
    //     $_SESSION['antrian1']['nama']=$_POST['nama'];
    //     $_SESSION['antrian1']['rekening']=$_POST['rekening'];
    //     print_r( $_SESSION['antrian1']);
    // }


    if(isset($_POST['submit'])){
        enqueue($_POST['nama'], $_POST['rekening']);
}
function enqueue($nama,$rekening){
    if($_SESSION['wadah']['head'] >= -1){
        if($_SESSION['wadah']['head'] == -1){
            $_SESSION['coba'] = $_SESSION['wadah']['tail'] +1 ;
            $_SESSION['wadah']['head']++;
            $_SESSION['wadah']['data'][$_SESSION['wadah']['tail']]['nama'] = $nama;
            $_SESSION['wadah']['data'][$_SESSION['wadah']['tail']]['rekening'] = $rekening;
            print_r( $_SESSION['wadah']['data'][$_SESSION['wadah']['tail']]);
            $antrian = &$_SESSION['wadah'];
        }else {
            $_SESSION['coba'] = $_SESSION['wadah']['tail'] +1 ;
            $_SESSION['wadah']['data'][$_SESSION['wadah']['tail']]['nama'] = $nama;
            $_SESSION['wadah']['data'][$_SESSION['wadah']['tail']]['rekening'] = $rekening;
            $antrian = &$_SESSION['wadah'];
            print_r( $_SESSION['wadah']['data'][$_SESSION['wadah']['tail']]);
        }
    }
}

//print_r($_SESSION['wadah']['data']);

function cetak(){
    if($_SESSION['wadah']['tail'] != -1){
        for($i = 0 ;$i <= $_SESSION['wadah']['tail']; $i++){
            echo "<hr>antrian ke", $i+1, ":<br>
            Nama :",$_SESSION['wadah']['data'][$i]['nama'],"<br>
            Rekening :",$_SESSION['wadah']['data'][$i]['rekening'],"";
        }
    }
   // echo "<br>antrian kososng !!!!!";
}


cetak();
    ?>
</body>
</html>