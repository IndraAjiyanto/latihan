<!-- Dalam PHP, tipe data variabel ditentukan secara
dinamis dan tidak memerlukan deklarasi tipe data
eksplisit.
PHP secara otomatis menyesuaikan tipe data variabel berdasarkan
nilai yang diberikan -->
<?php

$angka = 15;            //integer
$teks = "Hello";        //string
$angka_desimal = 3.14;  //float

//membuat nama alias
$ak = $angka;


//menampilkan nilai variabel
echo $angka;            //output : 15
echo $teks;             //output : Hello
echo $angka_desimal;    //output : 3.14