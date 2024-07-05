<?php
session_start();

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