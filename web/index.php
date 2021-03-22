<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Efkan Hoca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <?php

        include 'database.php';
    ?>
    <?php 
        //echo "<option value='deneme'>".."</option>";
        echo "<script>";
        echo "var allTests = [];";
        if(mysqli_num_rows($result_kitaplar) > 0){
            
            while($row = mysqli_fetch_assoc($result_testler)){
                echo "allTests.push({test_adi:'".$row["test_adi"]."',kitabi:'".$row["kitabi"]."',soru_sayisi:'".$row["soru_sayisi"]."',konusu:'".$row["konusu"]."'});";
                
            }
        }
        
        echo "</script>";
    ?>

</head>
<body>
    <div class="container">
        <form method="post" action="anket.php">

        <div class="row">
            <div class="col-md-5">
            <h1>Test Değerlendirme</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Kitap Seç</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <select name="kitap_secme" id="kitap" onchange="addTestOption()" class="form-select" aria-label="Default select example">
                    <option value="yok"  selected>-------</option>
                    
                    <?php  
                    
                        
                        if(mysqli_num_rows($result_kitaplar) > 0){
                        
                            while($row = mysqli_fetch_assoc($result_kitaplar)){
                                $html = "<option value='".$row["kitap_adi"]."'>".$row["kitap_adi"]."</option>";
                                echo htmlspecialchars_decode($html);
                            }
                        }
                    ?>
                    
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Test Seç</p>
            </div>
        </div>
        <div class="row" id="testSelect">
            <div class="col-md-5">

                <select name="test_secme" id="select_test" class="form-select" aria-label="Default select example">


                </select>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-5">
                <p>Sınıf Seç</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
            <select name="sinif_secme" class="form-select" aria-label="Default select example">
                <option value = "9.Sinif">9.Sınıf</option>
                <option value="10.Sinif">10.Sınıf</option>
                <option value="11.Sinif">11.Sınıf</option>
                <option value="12.Sinif">12.Sınıf</option>
                <option value="Mezun">Mezun</option>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <p>Ad</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <input name="ad" type="text" class="form-control" placeholder="Ad" aria-label="ad">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <p>Soyad</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <input name="soyad" type="text" class="form-control" placeholder="soyad" aria-label="soyad">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <p>Onayla</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <button class="btn btn-primary" type="submit">Tamam</button>
            </div>
        </div>

        
        <script>
            function addTestOption(){
            
                var test_select = document.getElementById("testSelect");
                var select_test = document.getElementById("select_test");
                var kitap = document.getElementById("kitap").value;
                test_select.style.visibility = "visible";   
                var len1 = select_test.options.length;
                
                
                clearAlloption(select_test);
                for(i = 0; i < allTests.length; i++){
                    var opt = document.createElement('option');
                    
                    if(allTests[i]["kitabi"] == kitap){
                        // alert(allTests[i]["kitabi"]);
                        opt.value = allTests[i]["test_adi"]+"-"+allTests[i]["soru_sayisi"]+"-"+allTests[i]["konusu"];
                        opt.innerHTML = allTests[i]["test_adi"];
                        select_test.appendChild(opt);
                    }
                }
                //clearAlloption(select_test);
                
            }

            function clearAlloption(opt){
                for(i = 0;i <= opt.length; i++){
                    opt.remove(opt.options[i])
                }
            }
        </script>
        
        </form>
        
        <?php 
            mysqli_close($conn);
        ?>

    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>