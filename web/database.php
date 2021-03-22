

<?php

$conn = mysqli_connect("us-cdbr-east-03.cleardb.com", "b303edd4bedefc", "03f6cefd", "heroku_0b7fb97e408f8c6");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT kitap_adi FROM kitaplar";
$result_kitaplar = mysqli_query($conn, $sql);

$sql = "SELECT test_adi,kitabi,soru_sayisi,konusu FROM testler";
$result_testler = mysqli_query($conn,$sql);

?>