<?php
//SINGGLE LINK LIST NON CIRCULAR DENGAN HEAD
//Deklarasi LINK LIST
$node = array(
    'data' => null,
    'next' => null
);

$head = null;

//prosedur inisialisasi
function inisialisasi(){
    global $head;
    $head = null;
}

//fungsi LEmpty
function LEmpty($head){
    if($head == null){
        return 1;
    }else{
        return 0;
    }
}
//procedure menyisipkan data ke dalam link list(depan)
function InsertD($d){
    global $head;
    $baru = array(
        'data' => $d,
        'next' => null
    );

    if(LEmpty($head) == 1){
        $head = $baru;
        $head['next'] = null;
    }else{
        $baru['next'] = $head;
        $head = $baru;
    }
}

//prosedur tambah data link list (belakang)
function InsertB($d){
    global $head;
    $baru = array(
        'data' => $d,
        'next' => null
    );

    if($head === null){
        $head = $baru;
    }else{
        $temp = $head;
        while($temp['next'] != null){
            $temp = $temp['next'];
        }
        $temp['next'] = $baru;
    }
}

//prosedur untuk melakukan hapus depan link list
function HapusD(){
    global $head;
    if(LEmpty($head) == 0){
        if($head['next'] != null){
            $temp = $head;
            $head = $head['next'];
            unset($temp);
        }else{
            $head = null;
        }
    }else{
        echo "<br>List kosong";
    }
}

//prosedur hapus belakang link list
function HapusB(){
    global $head;
    if(LEmpty($head) == 0){
        if($head['next']!=null){
            $temp = $head;
            while ($temp['next']['next'] != null){
                $temp = $temp['next'];
            }
            $temp['next'] = null;
            $hapus = $temp['next'];
            unset($hapus);
        }else{
            $head = null;
        }
    }else{
        echo "<br>List kosong";
    }
}


//prosedur hapus semua elemen link list
function clear(){
    global $head;
    $temp = $head;
    $del = null;
    while($temp != null){
        $del = $temp;
        $temp = $temp['next'];
        unset ($del);
    }
    $head = null;
}

//prosedur cetak elemen link list 
function cetak(){
    global $head;
    $temp = $head;
    if(LEmpty($head) == 0){
        echo "<hr>Cetak data </hr>";
        while($temp != null){
            echo $temp['data'],"";
            $temp = $temp['next'];
        }
    }else{
        echo "<br>list kosong";
    }
}

InsertB(44);
InsertD(55);
InsertD(66);
echo "isi link list :";
cetak();
HapusD();
echo "<p>setelah hapus</p>";
cetak();
HapusD();
cetak();
?>