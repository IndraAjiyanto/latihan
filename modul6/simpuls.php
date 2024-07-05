<?php
session_start(); //membuka session
if(!isset($_SESSION['coba']) ){   //jika session coba tidak ada maka default
$_SESSION['coba'] = array(
    'data' => null,
    'harga' => null,
    'next' => null
);
}
$head = $_SESSION['coba'];  //variabel head menampung session coba

// fungsi untuk mengetahui apakah variabel head kosong atau tidak
function LEmpty($head){
    if($head == null){
        return 1;    //true
    }else{
        return 0;    //false
    }
}

//fungsi untuk menyimpan perubahan
function simpan($heads){
    $_SESSION['coba'] = $heads;
}

//fungsi untuk menambahkan dat dari depan
function InsertD($d, $i){
    global $head;  //variabel head di globalkan
    $baru = array(
        'data' => $d,
        'harga' => $i,
        'next' => null
    );
    if(LEmpty($head) == 1){
        $head = $baru;
        $head['next'] = null;
    }else{
        $baru['next'] = $head;
        $head = $baru;
    }
    simpan($head);
    echo "judul buku berhasil di tambahkan dibagian depan <br>";
}

//fungsi untuk menambahkan data dari belakang
function InsertB($d, $i){
    global $head;   //variabel head di globalkan
    $baru = array(
        'data' => $d,
        'harga' => $i,
        'next' => null
    );
    if($head === null){
        $head = $baru;
    }else{
        $temp = &$head;
        while($temp['next'] != null){
            $temp = &$temp['next'];
        }
        $temp['next'] = $baru;
    }
    simpan($head);
    echo "judul buku berhasil di tambahkan di bagian belakang <br>";
}

//fungsi untuk menghapus data dari depan
function HapusD(){
    global $head;   //variabel head di globalkan
    if(LEmpty($head) == 0){
        if($head['next'] != null){
            $temp = $head;
            $head = $head['next'];
            unset($temp);
        }else{
            $head = null;
        }
        simpan($head);
        echo "judul buku depan berhasil dihapus<br>";
    }else{
        echo "<br>List kosong";
    }
   
}

//fungsi untuk menghapus data dari belakang
function HapusB(){
    global $head;    //variabel head di globalkan
    if(LEmpty($head) == 0){
        if($head['next']!=null){
            $temp = &$head;
            while ($temp['next']['next'] != null){
                $temp = &$temp['next'];
            }
            $temp['next'] = null;
            $hapus = &$temp['next'];
            unset($hapus);
            
        }else{
            $head = null;
        }
        simpan($head);
        echo "judul buku belakang berhasil dihapus<br>";
    }else{
        echo "<br>List kosong";
    }
   
}

//fungsi untuk mencetak data
function cetak($head){
    $temp = $head;   //variabel head di globalkan
    if(LEmpty($head) == 0){
        while($temp != null){
            echo "judul buku :".$temp['data']," -      ";
            echo "harga buku :".$temp['harga'],"<br>";
            $temp = $temp['next'];
        }
    }else{
        echo "<br>list kosong";
    }
}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Data Buku</title>
</head>
<body>
    <h1>Menu Data Buku</h1>
    <ol>
        <li> Tambah data buku didepan</li>
        <li> Tambah data buku dibelakang</li>
        <li> Hapus data buku didepan</li>
        <li> Hapus data buku dibelakang</li>
        <li> Tampil data buku</li>
    </ol>
    <label>Pilih Menu : </label>
    <form method="post">
    <select name="pilih">
        <option value="tambahD">1</option>
        <option value="tambahB">2</option>
        <option value="hapusD">3</option>
        <option value="hapusB">4</option>
        <option value="tampil">5</option>
    </select>
    <input type="submit" value="pilih">
    </form>


    <?php
    if(isset($_POST['pilih'])){   
        $pilih = $_POST['pilih'];
        switch($pilih){
            case 'tambahD' : 
                echo "<form method='post'>
                <h4>Masukkan data buku dari depan :</h4>
                <label>Judul :</label>
                <input type='text' name='judul1'><br>
                <label>Harga :</label>
                <input type='number' name='harga1'><br>
                <input type='submit' name='kirim1'>
            </form>";
            break;
    
            case 'tambahB' :
                echo "<form method='post'>
                <h4>Masukkan data buku dari belakang :</h4>
                <label>Judul :</label>
                <input type='text' name='judul2'><br>
                <label>Harga :</label>
                <input type='number' name='harga2'><br>
                <input type='submit' name='kirim2'>
            </form>";
            break;
    
            case 'hapusD' :
                echo "<form method='post'>
                <h4>Hapus data buku dari depan :</h4>
                <input type='submit' name='kirim3' value='hapus'>
            </form>";
            break;

            case 'hapusB':
                echo "<form method='post'>
                <h4>Hapus data buku dari belakang:</h4>
                <input type='submit' name='kirim4' value='hapus'>
            </form>";
                break;
            default :
            cetak($head);
        }
    }?>
  
  <h4>Daftar Buku </h4>
        <?php 
        if(isset($_POST['kirim1'])){
        echo "<td>".InsertD($_POST['judul1'],$_POST['harga1']). "</td><hr>";
    }
?>
  <?php 
        if(isset($_POST['kirim2'])){
        echo "<td>".InsertB($_POST['judul2'],$_POST['harga2']). "</td><hr>";
    }
?>
 <?php 
        if(isset($_POST['kirim3'])){
        echo "<td>".HapusD(). "</td><hr>";
    }
?>
 <?php 
        if(isset($_POST['kirim4'])){
        echo "<td>".HapusB(). "</td><hr>";
    }
?>
 <?php 
        if(isset($_POST['kembali'])){
        echo "<td>".cetak($head). "</td><hr>";
    } else{
        echo "<td>".cetak($head). "</td><hr>";
    }
?>
<form method="post">
<input type="submit" name="kembali" value="kembali">
</form>
</body>
</html>