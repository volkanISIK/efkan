<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Anket</title>
</head>
<body>
    <div class="container">

    <form method="post" action="anket_sonucu_servera.php">
    <?php

        include "database.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
            $count = 1;
            $kitap_secme = $_POST['kitap_secme'];
            $test_secme_ve_sayi = $_POST["test_secme"];
            $sinif_secme = $_POST["sinif_secme"];
            $ad = $_POST["ad"];
            $soyad = $_POST["soyad"];
            $test_secme_ve_sayi_array = explode("-",$test_secme_ve_sayi);
            $test_secme = $test_secme_ve_sayi_array[0];
            $soru_sayisi = $test_secme_ve_sayi_array[1];
            $konusu = $test_secme_ve_sayi_array[2];

            session_start();
            $_SESSION["soru_sayisi"] = $soru_sayisi;
                       
            for($count;$count <= $soru_sayisi;$count++){
                echo '

                <div class="row">
                <div class="col-md-5">
                    <h3>Soru '.$count.'</h3>
                </div>
                </div>
                
                ';

                echo '
            
                <div class="row">
                    <div class="col-md-5">
                        <input type="radio" value="cok_kolay" class="btn-check" name="'.$count.'" id="option1'.$count.'" autocomplete="off" >
                        <label class="btn btn-outline-secondary" for="option1'.$count.'">Çok Kolay</label>
                        <input type="radio" value="kolay"class="btn-check" name="'.$count.'" id="option2'.$count.'" autocomplete="off" >
                        <label class="btn btn-outline-secondary" for="option2'.$count.'">Kolay</label>
                        <input type="radio" value="orta_zorluk" class="btn-check" name="'.$count.'" id="option3'.$count.'" autocomplete="off" >
                        <label class="btn btn-outline-secondary" for="option3'.$count.'">Orta Zorluk</label>
                        <input type="radio" value="zor" class="btn-check" name="'.$count.'" id="option4'.$count.'" autocomplete="off" >
                        <label class="btn btn-outline-secondary" for="option4'.$count.'">Zor</label>
                        <input type="radio" value="cok_zor" class="btn-check" name="'.$count.'" id="option5'.$count.'" autocomplete="off" >
                        <label class="btn btn-outline-secondary" for="option5'.$count.'">Çok Zor</label>
                    </div>
                </div>
                
                ';
            }

            echo '

            <div class="row" style="visibility:hidden">
            <div class="col-md-5">
                <input name="soru_sayisi" value='.$count.' type="text" class="form-control" placeholder="Ad Soyad" aria-label="ad-soyad">
            </div>
            </div>
            
            ';

            echo '
            
            <div class="row">
                <div class="col-md-5">
                    <button class="btn btn-primary" type="submit">Gönder</button>
                </div>
            </div>
            
            ';

            echo '

            <div class="row" style="visibility:hidden">
            <div class="col-md-5">
                <input name="sinif_secme" value='.$sinif_secme.' type="text" class="form-control" placeholder="Ad Soyad" aria-label="ad-soyad">
            </div>
            </div>
            
            ';

            

            echo '

            <div class="row" style="visibility:hidden">
            <div class="col-md-5">
                <input name="ad" value='.$ad.' type="text" class="form-control" placeholder="Ad Soyad" aria-label="ad-soyad">
            </div>
            </div>
            
            ';
            echo '

            <div class="row" style="visibility:hidden">
            <div class="col-md-5">
                <input name="kitap_secme" value='.$kitap_secme.' type="text" class="form-control" placeholder="Ad Soyad" aria-label="ad-soyad">
            </div>
            </div>
            
            ';

            echo '

            <div class="row" style="visibility:hidden">
            <div class="col-md-5">
                <input name="soyad" value='.$soyad.' type="text" class="form-control" placeholder="Ad Soyad" aria-label="ad-soyad">
            </div>
            </div>
            
            ';

            echo '

            <div class="row" style="visibility:hidden">
            <div class="col-md-5">
                <input name="konusu" value='.$konusu.' type="text" class="form-control" placeholder="Ad Soyad" aria-label="ad-soyad">
            </div>
            </div>
            
            ';

            echo '

            <div class="row" style="visibility:hidden">
            <div class="col-md-5">
                <input name="test_secme" value='.$test_secme.' type="text" class="form-control" placeholder="Ad Soyad" aria-label="ad-soyad">
            </div>
            </div>
            
            ';
        }
    ?>
        
       
            
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>