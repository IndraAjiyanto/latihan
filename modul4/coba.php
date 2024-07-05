<?php
echo "STACK/TUMPUKAN";
//Deklarasi stack
$tumpukan = array(
    'top' => -1,   //  top dengan nilai -1
    'data' => array()   //array untuk menampung data
);

$A = $tumpukan;
define("max",10);

//prosedur inisialisasi stack
function inisial(){
    global $A;
    $A['top'] = -1;
}

//fungsi push/menambah data dalam stack
function push($d){
    global $A;   //menggunakan variabel global $A
    if($A['top'] != max - 1){
        $A['top'] = $A['top'] + 1;
        $A['data'][$A['top']] = $d; //menambahkan data ke dalam stack
        echo "</br>Nilai", $d, "sudah ditambahkan"; //pesan konfirmasi penambahan
    }else{
        echo "</br>maaf elemen stack sudah penuh";  //pesan jika stack penuh 
    }
}

//prosedur pop/mengambil data diri stack
function pop(){
    global $A; //menggunakan variabel global $A
    if($A['top'] != -1){
        echo "</br> data yang di pop adalah", $A['data'][$A['top']];
        $A['top']--;
    }else{
        echo "</br> maaf stack kosong";   //pesan jika stack kosong
    }
}

//mengecek apakah data ada atau tidak
function ada($data){
    global $A; //menggunakan variabel global $A
    for($i=0;$i<count($A['data']);$i++){  //perulangan
        if($A['data'][$i] == $data){     //mengecek jika ada data yang sama dengan parameter yang di masukkan 
            return true;                  //maka tampilkan true
        }
    }
    return false; //jika tidak ada yang sama maka tampilkan false
}


//mengecek indeks ke berapa data tersebut
function indeks($data){
    global $A;  //menggunakan variabel global $A
    for($i=0;$i<count($A['data']);$i++){    //perulangan
        if($A['data'][$i] == $data){   //mengecek jika ada data yang sama dengan parameter yang di masukkan 
            return $i;              //maka tampilkan indeksnya
        }
    }
    return false;
}

//menukar data yang diinput tersebut dengan data yanng paling atas
function swap($data){
    global $A;  //menggunakan variabel global $A

    $data1 = indeks($data);  
    $temp = $A['data'][$data1];  //mengisikan variabel kososng dengan indeks data yang ingin ditukar
    $A['data'][$data1] = $A['data'][$A['top']];  //posisi awal data tadi di ganti dengan data urutan paling atas
    $A['data'][$A['top']] = $temp;      //posisi data yang paling awal itu diisi oleh isi dari variabel kososng tadi
        echo "<br>".$A['data'][$A['top']];      //tampilkan hasil pertukaran

}

//fungsi menampilkan data teratas/PEAK
function peak(){
    global $A;  
    return $A['data'][$A['top']];
}

//prosedure cetak isi stack
function cetak(){
    global $A;
    if($A['top'] != -1){
        echo "<br>Data pada stack = ";
        for($i=$A['top'];$i>=0;$i--){
            echo "<br>".$A['data'][$i];
        }
    }else{
        echo "stack kosong";
    }
}



// //memanggil/menjalankan prosedur dan fungsi
// push(10); //contoh penambahan angka 10 ke dalam stack
 push(5); //contoh penambahan angka 5 ke dalam stack
 push(4); //contoh penambahan angka 5 ke dalam stack
// push(3); //contoh penambahan angka 3 ke dalam stack
// push(4); //contoh penambahan angka 4 ke dalam stack
// pop();  //melakukan penghapusan dari stack

//indeks(5);
//ada(5);
cetak();
swap(5);
cetak();
// echo "<br> data teratas =", peak(); //menampilkan data teratas
// cetak();