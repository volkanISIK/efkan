





<?php 
    echo "<h2>Gönderiliyor....</h2>";
    
    $counter = (int)$_POST["soru_sayisi"];
    $kitabi = $_POST["kitap_secme"];
    $konusu = $_POST["konusu"];
    $ad = $_POST["ad"];
    $soyad = $_POST["soyad"];
    $testi = $_POST["test_secme"];
    $sinifi = $_POST["sinif_secme"];
    include "database.php";

    for($i=1;$i<$counter;$i++){
        if(isset($_POST[$i])){
            $sql = "INSERT INTO sorular (kitabi,testi,konusu,soru_no,ogrenci_adi,ogrenci_soyadi,sinifi,zorluk)
            VALUES ('$kitabi','$testi','$konusu','$i','$ad','$soyad','$sinifi','$_POST[$i]')";
            
            // $sql = sprintf($sql,$kitabi,$testi,$konusu,$i,$ad,$_POST[$i]);
        
            if (mysqli_query($conn, $sql)) {
                echo "<h4>Anket Gönderildi</h4><br>";
                
                
            }
              else {
                echo mysqli_error($conn);
                echo "<br>";
                echo $sql;
                die();
              
              }
            
        }else{
            continue;
        }
    }
    sleep(5);
    mysqli_close($conn);

    
?>




<?php
header('Location: https://efkanhoca.herokuapp.com/');
exit;
?>




