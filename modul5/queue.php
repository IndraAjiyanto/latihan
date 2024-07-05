<?php
session_start();
//QUEUE/ANTRIAN
define ("MAX",6);
//deklarasi queue/antrian
if(!isset($_SESSION['antrian'])) {
    $_SESSION['antrian'] = array (
        'head' => -1,
        'tail' => -1,
        'data' => array()
    );
}
$Q = $_SESSION['antrian'];

//prosedure untuk inisialisasi/memberikan nilai awal
//menyatakan bahwa antrian masih KOSONG
function inisialisais(){
    global $Q;
    $Q['head'] = $Q['tail'] = -1;
}

//preosedure untuk menambah/Enqueue isi antrian
function enqueue($d){
    global $Q;
    if (isFull() == 0){
        if (isEmpty() == 1){
            $Q['head'] = 0;
        }
            $Q['tail']++;
            $Q['data'][$Q['tail']] = $d;
            echo "<br>Data Telah Ditambahkan ke antrian.";
            $_SESSION['antrian'] = &$Q;
    }else{
        echo "<br> Maaf Antrian sudah penuh";
    }
}

//prosedur untuk menghapus/dequeue elemen antrian
function dequeue(){
    global $Q;
    if(isEmpty() !=1){
        echo "<br> Data yang keluar dari antrian : ", $Q['data'][$Q['head']];
        for ($i=$Q['head']; $i<$Q['tail']; $i++){
            $Q['data'][$i] = $Q['data'][$i + 1];
        }
        $Q['tail']--;
        $_SESSION['antrian'] = $Q;
    }else{
        echo "<br>Maaf, Antrian Kosong.";
    }
}

//fungsi untuk cek apakah antrian penuh/tidak
function isFull(){
    global $Q;
    if($Q['tail'] == MAX-1){
        return 1; //true/penuh
    } else{
        return 0; //false/ tidak penuh
    }
}

//fungsi untuk cek apakah antrian kosong/tidak
function isEmpty(){
    global $Q;
    if($Q['tail'] == -1){
        return 1;
    } else{
        return 0;
    }
}

//prosedure menghapus semua elemen antrian
function clear(){
    global $Q;
    $Q['head'] = $Q['tail'] = -1;
    $_SESSION['antrian'] = $Q;
}

//prosedure cetak elemen antrian
function cetak(){
    global $Q;
    if($Q['tail'] != -1){
        echo "<br>Antrian:";
        for($i=$Q['head']; $i <=$Q['tail'];$i++){
            echo "<br> Antrian ke ".($i+1). ": ", $Q['data'][$i], " ";
        }
    }else{
    echo "<br>Antrian Kosong !!!!!";}
}

$pilih = '';  //buat variabel untuk menampung pilihan select
if(isset($_POST['pilih'])){   //jika pilihan dipilih
    $pilih = $_POST['pilih'];  //maka pilihan tersebut diletakkan ke variabel yang menampung select
}else{
$pilih ='';  //jika tidak maka variabel yang meanmpung select dikosongkan
}

switch ($pilih){    //parameter switch diambil dari nilai variabel select yang tadi dipilih
    case 'tambah':  //jika yang dipilih tambah maka akan memproses menambah data
        echo '<h1>Tambah Data Antrian</h1>';
        echo '<form method="post">
                <label>nama :</label>
                <input type="text" name="nama"><br>
                <label>no.rekening :</label>
                <input type="text"  name="rekening"><br><br>
                <input type="submit" name="kirim" value="kirim">
                <input type="submit" name="kembali" value="kembali">
            </form>';
        break;


    case 'hapus': //jika yang dipilih hapus maka akan memproses menghapus data
        echo '<h1>Hapus Data Antrian</h1>';
        dequeue();
        echo '<form method="post">
                <input type="submit" value="kembali">
            </form>';
        break;


    case 'bersih': //jika yang dipilih bersih maka akan memproses membersihkan data
        echo '<h1>Bersihkan Data Antrian</h1>';
        clear();
        echo '<form method="post">
                <input type="submit" value="kembali">
            </form>';
        break;


    case 'cetak': //jika yang dipilih cetak maka akan memproses mmencetak data
        echo '<h1>Cetak Data Antrian</h1>';
        cetak();
        echo '<form method="post">
                <input type="submit" value="kembali">
            </form>';
        break;


    default:  //jika tidak ada pilihan maka secara otomatis memilih default 
        echo '<h1>Pilh Menu :<h1>';
        echo '<form method="post">
                <select name="pilih" >
                    <option value="tambah">Tambah Data Antrian</option>
                    <option value="hapus">Hapus Data Antrian</option>
                    <option value="bersih">Bersihkan Data Antrian</option>
                    <option value="cetak">Cetak Data Antrian</option>
                </select>
                <input type="submit" value="pilih">
            </form>';
        break;
}

if(isset($_POST['kirim'])){ //jika tombol kirim ditekan
    $nama = $_POST['nama'];    //variabel nama menapung data nama
    $rekening = $_POST['rekening'];     //variabel rekening menapung data rekening
    $jadi = 'nama :'.$nama.'- no.rekening :'.$rekening ;  //vaeriabel jadi menggabungkan dua variabel nama dan rekening
    enqueue($jadi);    //menjalankan fungsi enqueue dengan parameter jadi
}
?>