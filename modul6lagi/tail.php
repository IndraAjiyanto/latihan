<?php
$head = $tail = null;
// Fungsi LEmpty
function LEmpty($head, $tail){
    //global $head, $tail
    if ($head == null && $tail == null) {
        return 1;
    }else {
        return 0;
    }
}

//fungsi untuk menambahkan data didepan
function InsertD($d){
    global $head, $tail;
    $baru = array(
        'data' => $d,
        'next' => null
    );

    if (LEmpty($head, $tail) == 1) {
        $head = $tail = $baru;
        $tail['next'] = null;
    }else {
        $baru['next'] = $head;
        $head = $baru;
    }
}

//fungsi yang menambahkan data di belakang
function InsertB($d){
    global $head, $tail;
    $baru = array(
        'data' => $d,
        'next' => null
    );

    if (LEmpty($head, $tail) == 1) {
        $head = $tail = $baru;
        $tail['next'] = null;
    }else {
        $tail['next'] = $baru;
        $tail = $baru;
        $temp = &$head;
        while($temp['next'] != null){
            $temp = &$temp['next'];
        }
        $temp['next'] = $tail;
    }
}

//fungsi yang menghapus data di depan
function HapusD(){
    global $head, $tail;
    if (LEmpty($head, $tail) == 0) {
        if ($head['next'] != null) {
            $temp = $head;
            $head = $head['next'];
            unset($temp);
        }else {
            $head = $tail = null;
        }
    }else {
        echo "<br>List Kosong";
    }
}

//fungsi untuk menghapus data dibelakang
function HapusB(){
    global $head, $tail;
    if (LEmpty($head,$tail) == 0) {
        //jika linked list hanya memiliki satu elemen 
        if ($head['next']!= null) {
            $temp = &$head;
            while($temp['next']['next'] != null){
                $temp = &$temp['next'];
            }
            $temp['next'] = null;
            $hapus = &$temp['next'];
            unset($hapus);
        }else {
            $head = $tail = null;
        }
    }else {
        echo "<br>List Kosong";
    }
}

//fungsi untuk menghapus semua data
function clear(){
    global $head, $tail;
    $temp = $head;
    $del = null;
    while($temp != null){
        $del = $temp;
        $temp = $temp['next'];
        unset($del);
    }
    $head = $tail = null;
}

//fungsi untuk mencetak data 
function cetak(){
    global $head, $tail;
    $temp = $head;
    if (LEmpty($head, $tail) == 0) {
        echo "<hr>Cetak data</hr>";
        while ($temp != null) {
            echo $temp['data'], " ";
            $temp = $temp['next'];
        }
    }else {
        echo "<br>List kosong";
    }
}
//deklarasi
InsertD (11);
InsertB(12);
InsertB(13);
Cetak();
HapusD();
Cetak();
HapusB();
Cetak();
?>