<?php

$a= 10;
$b= &$a; //$b adalah referensi ke $a


echo "Nilai awal A = 10<br>";
echo "A = ",$a; //output 10
echo "<br>";
echo "B = ",$b; //output 10
echo "<br>";


$b = 20; //mengubah nilai melalui referensi

echo "mengubah nilai A melalui B = 20<br>";
echo "A = ",$a; //output 20
echo "<br>";
echo "B = ",$b; //output 20