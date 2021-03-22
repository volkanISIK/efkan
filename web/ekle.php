<!DOCTYPE html>
<html lang="tr">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <?php

        include 'database.php';

        if(isset($_POST["kitap_ekle"])){
            $kitap_eklenecek = $_POST["kitap_ekle"];
            $sql = "INSERT INTO kitaplar (kitap_adi) VALUES ('$kitap_eklenecek')";
            if(mysqli_query($conn,$sql)){
                
                echo "<script>alert('kitap eklendi');</script>";
            }else{
                $hata = mysqli_error($conn);
                echo "<script>alert('kitap eklenemedi');</script>";
                echo "<script>alert($hata);</script>";
                die();
            }
        }

        if(isset($_POST["kitap_secme"]) && isset($_POST["konusu"])  ){
            $kitap_secme = $_POST["kitap_secme"];
            $konusu = $_POST["konusu"];
            $soru_sayisi = $_POST["soru_sayisi"];
            $testin_adi = $_POST["testin_adi"];
            $sql = "INSERT INTO testler (test_adi,kitabi,konusu,soru_sayisi) 
                VALUES ('$testin_adi','$kitap_secme','$konusu',$soru_sayisi)";

            
            if(mysqli_query($conn,$sql)){
                            
                echo "<script>alert('test eklendi');</script>";
                $_POST = array();
            }else{
                $_POST = array();
                $hata = mysqli_error($conn);
                echo "<script>alert('test eklenemedi');</script>";
                echo "<script>alert($hata);</script>";
                die();
            }
            
        }

        if(isset($_POST["kitabi_sil"])){
            $kitabi_sil = $_POST["kitabi_sil"];
            $sql = "DELETE FROM kitaplar WHERE kitap_adi='$kitabi_sil'";

            if(mysqli_query($conn,$sql)){
                            
                echo "<script>alert('Kitap Silindi');</script>";
                $_POST = array();
            }else{
                $hata = mysqli_error($conn);
                echo "<script>alert('Kitap Silinemedi Hata!!!');</script>";
                echo "<script>alert($hata);</script>";
                $_POST = array();
                die();
            }
        }

        if(isset($_POST["test_sil"])){
            $testi_sil = $_POST["test_sil"];
            $sql = "DELETE FROM testler WHERE test_adi='$testi_sil' ";

            if(mysqli_query($conn,$sql)){
                            
                echo "<script>alert('Test Silindi');</script>";
                $_POST = array();
            }else{
                $hata = mysqli_error($conn);
                echo "<script>alert('Test Silinemedi Hata!!!');</script>";
                echo "<script>alert($hata);</script>";
                $_POST = array();
                die();
            }
        }
    
    ?>
    <title>Ekle</title>
</head>
<body>
    <div class="container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="row">
                <div class="col-md-5">
                    <h3>Kitap Ekle</h3>
                    
                </div>
                </div>
                


                <div class="row">
                    <div class="col-md-5">
                        <input name="kitap_ekle" type="text" class="form-control" placeholder="Kitap Adı" aria-label="Kitap Ekle">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-5">
                        <button class="btn btn-primary" type="submit">Kitap Ekle</button>
                    </div>
                </div>
        </form>
        <br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="row">
                <div class="col-md-5">
                    <h3>Test Ekle</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Kitap Seç</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <select name="kitap_secme" id="kitap"  class="form-select" aria-label="Default select example">
                        <option value="yok"  selected>-------</option>
                        
                        <?php  
                            
                            $myArray = array();
                            if(mysqli_num_rows($result_kitaplar) > 0){
                            
                                while($row = mysqli_fetch_assoc($result_kitaplar)){
                                    array_push($myArray,$row["kitap_adi"]);
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
                    <p>Konusu</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <input name="konusu" type="text" class="form-control" placeholder="Konusu" aria-label="Konusu">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>Soru Sayisi</p>
                </div>
            </div>

            <div class="row">
                    <div class="col-md-5">
                        <input name="soru_sayisi" type="text" class="form-control" placeholder="Soru Sayisi" aria-label="Soru Sayisi">
                    </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>Testin Adı</p>
                </div>
            </div>

            <div class="row">
                    <div class="col-md-5">
                        <input name="testin_adi" type="text" class="form-control" placeholder="Testin Adi" aria-label="Testin Adi">
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <button class="btn btn-primary" type="submit">Test Ekle</button>
                </div>
            </div>
        </form>


            
        
        
        </form>
        <br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="row">
                    <div class="col-md-5">
                        <h3>Kitap Sil</h3>
                    </div>
            </div>
            <div class="row">
                        <div class="col-md-5">
                            <p>Silinecek Kitabı Seç</p>
                        </div>
                    
                </div>
            <div class="row">
                
                <div class="col-md-5">
                    <select name="kitabi_sil"  id="kitabi_sil" class="form-select" aria-label="Default select example">
                        <option value="yok"  selected>-------</option>
                        
                        <?php  
                        
                        foreach($myArray as $myrow){
                            $html = "<option value='".$myrow."'>".$myrow."</option>";
                            echo htmlspecialchars_decode($html);  
                        }
                        
                        ?>
                        
                    </select>

                </div>
            </div>
            
            <br>
            <div class="row">
                <div class="col-md-5">
                    <button class="btn btn-primary" type="submit">Testi Sil</button>
                </div>
            </div>
        </form>
        <br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="row">
                    <div class="col-md-5">
                        <h3>Test Sil</h3>
                    </div>
            </div>
            <div class="row">
                    <col-md-5>
                        <p>Silinecek Testi Seç</p>
                    </col-md-5>
                </div>
            <div class="row">
                <div class="col-md-5">
                    <select name="test_sil" id="test_sil" class="form-select" aria-label="Default select example">
                        <option value="yok"  selected>-------</option>
                        
                        <?php  
                        
                            
                            if(mysqli_num_rows($result_testler) > 0){
                            
                                while($row = mysqli_fetch_assoc($result_testler)){
                                    $html = "<option value='".$row["test_adi"]."'>".$row["test_adi"]."</option>";
                                    echo htmlspecialchars_decode($html);
                                }
                            }
                        ?>
                        
                    </select>

                </div>
            </div>
            
            <br>


            <br>
            <div class="row">
                <div class="col-md-5">
                    <button class="btn btn-primary" type="submit">Testi Sil</button>
                </div>
            </div>
        </form>

        <br>
        <br>
    </div>
    
    <?php 
            mysqli_close($conn);
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>