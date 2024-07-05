<?php
$negara = array(                                                        //membuat array assosiatif negara
    "nama" => "Indonesia",                                              //input nilai indonesia dengan key nama
    "presiden" => "Prabowo",                                            //input nilai prabowo dengan key presiden
    "provinsi" => array(                                                //membuat array assosiatif provinsi
        "jawatengah" => array(                                          //membuat array assosiatif jawatengah
            "nama" => "Jawa tengah",                                    //input nilai jawa tengah dengan key nama
            "gurbernur" => "Ganjar Pranowo",                            //input nilai ganjar pranowo dengan key gurbernur
            "kota" => array(                                            //membuat array assosiatif kota
                "semarang" => array(                                    //membuat array assosiatif semarang
                    "nama" => "semarang",                               //input nilai semarang dengan key nama
                    "bupati" => "Ngesti Nugroho",                       //input nilai ngesti nugroho dengan key bupati
                ),
                "banyumas" => array(                                    //membuat array assosiatif banyumas
                    "nama" => "banyumas",                               //input nilai banyumas dengan key nama
                    "bupati" => "Husen Cahyo Saputro",                  //input nilai husen cahyo saputro dengan key bupati
                ),
            ),
        ),
       
        "jawabarat" => array (                                          //membuat array assosiatif jawabarat
            "nama" => "Jawa Barat",                                     //input nilai jawa barat dengan key nama
            "gurbernur" => "Bey Machmudin",                             //input nilai bey mechmudin dengan key gurbernur
            "kota" => array(                                            //membuat array assosiatif kota
                "bandung" => array(                                     //membuat array assosiatif bandung
                    "nama" => "Bandung",                                //input nilai bandung dengan key nama
                    "bupati" => "Dadang Supriatna",                     //input nilai dadang supriatna dengan key bupati
                ),
                "bogor" => array(                                       //membuat array assosiatif bogor
                    "nama" => "Bogor",                                  //input nilai bogor dengan key nama
                    "bupati" => "Asmawa Tosepu",                        //input nilai asmawa tosepu dengan key bupati
                ),
            ),
        ),
    ),
);
echo "Nama Negara : {$negara['nama']}</br>";                                                                //output indonesia
echo "Nama Presiden : {$negara['presiden']}</br>";                                                          //output prabowo
echo "Jumlah Provinsi : ".count($negara['provinsi'])."</br></br></br></br><hr>";                            //output 2
echo "Provinsi : {$negara['provinsi']['jawatengah']['nama']}</br>";                                         //output jawa tengah
echo "Gurbernur : {$negara['provinsi']['jawatengah']['gurbernur']}</br>";                                   //output ganjar pranowo
echo "Jumlah Kota :" .count($negara['provinsi']['jawatengah']['kota'])."</br><hr>";                         //output 2
echo "Kota : {$negara['provinsi']['jawatengah']['kota']['semarang']['nama']}</br>";                         //output semarang
echo "Bupati : {$negara['provinsi']['jawatengah']['kota']['semarang']['bupati']}</br><hr>";                 //output ngesti nugroho
echo "Kota : {$negara['provinsi']['jawatengah']['kota']['banyumas']['nama']}</br>";                         //output banyumas
echo "Bupati : {$negara['provinsi']['jawatengah']['kota']['banyumas']['bupati']}</br></br></br></br><hr>";  //output husen cahyo saputro
echo "Provinsi : {$negara['provinsi']['jawabarat']['nama']}</br>";                                          //output jawa barat
echo "Gurbernur : {$negara['provinsi']['jawabarat']['gurbernur']}</br>";                                    //output bey mechmudin
echo "Jumlah Kota :" .count($negara['provinsi']['jawabarat']['kota'])."</br><hr>";                          //output 2
echo "Kota : {$negara['provinsi']['jawabarat']['kota']['bandung']['nama']}</br>";                           //output bandung
echo "Bupati : {$negara['provinsi']['jawabarat']['kota']['bandung']['bupati']}</br><hr>";                   //output dadang supriatna
echo "Kota : {$negara['provinsi']['jawabarat']['kota']['bogor']['nama']}</br>";                             //output bogor
echo "Bupati : {$negara['provinsi']['jawabarat']['kota']['bogor']['bupati']}</br><hr>";                     //output asmawa tosepu
