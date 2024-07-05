<!-- Dalam PHP, data struktur lebih umum diwakili menggunakan array 
atau objek -->

<?php
//membuat array homogen
$larik = array("satu","sdua","tiga","empat",);

//membuat array heterogen
$data = array(5,"enam",7.0,"delapan",);

//membuat array asosiatif sebagai struktur data
$person = array(
    "name" => "John",
    "age" => 30,
    "gender" => "Male",
    "contact" => array(
        "phone" => "0812221110",
        "email" => "indra3@gmail.com",
    )
);


//menampilkan data array homogen
echo "<p><b>Array homogen</b><hr>";
echo "<pre>";
print_r ($larik);
echo "</pre>";
echo "</p>";


//menampilkan data array heterogen
echo "<p><b>Array heterogen</b><hr>";
echo "<pre>";
print_r ($data);
echo "</pre>";
echo "</p>";

//menampilkan data array assosiatif
echo "<p><b>Array asosiatif</b><hr>";
echo "person 1: {$person['name']}, {$person['age']}, 
{$person['gender']}, {$person['contact']['email']},
{$person['contact']['phone']}<br>";
echo "</p>";