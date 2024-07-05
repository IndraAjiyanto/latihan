<?php
$person = array(
    "name" => $_POST['name'],
    "age" => $_POST['age'],
    "city" => $_POST['city'],
    "contacs" => array(
        "phone" => $_POST['contacs']['phone'],
        "email" => $_POST['contacs']['email'],
    )
);

echo 'Name : '.$person["name"].'<br>';
echo 'Age : '.$person["age"].'<br>';
echo 'City : '.$person["city"].'<br>';
echo 'Email : '.$person["contacs"]["email"].'<br>';
echo 'Phone : '.$person["contacs"]["phone"].'<br>';