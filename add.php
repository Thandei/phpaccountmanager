<?php 

    $hesapAdı = $hesapŞifre = "";

    $errors = array("hesap_adi"=>"","hesap_şifre"=>"");



    if(isset($_POST["submit"])){

        if(empty($_POST["A_name"])){
            $errors["hesap_adi"] =  "Hesap adı boş bırakılamaz... ";

        }else {
            $hesapAdı = $_POST["A_name"];
             
            
             
        }

        if(empty($_POST["A_password"])){
            $errors["hesap_şifre"] = "Hesap şifresi boş bırakılamaz... ";

        }else {
            $hesapŞifre= $_POST["A_password"];
             
        }

        if($errors["hesap_şifre"]== null && $errors["hesap_adi"]== null ){
            $conn = mysqli_connect("localhost","root","2xrAm9Gft3yZq4EX","valorant_hesap");
            
            $hesapAdi = mysqli_real_escape_string($conn, $_POST["A_name"]);
            $hesapŞifre = mysqli_real_escape_string($conn, $_POST["A_password"]);



            $sql = "INSERT INTO hesaplar(hesapAdı,hesapŞifre) VALUES('$hesapAdi','$hesapŞifre') ";

            if(mysqli_query($conn, $sql)){


                // success
                header("Location: index.php");
            }else{
                // error
                echo "query error " . mysqli_error($conn);
            }
            
        }
        
    }

?>




<!DOCTYPE html>
<html lang="en">
 
    <?php     include("header.php"); ?>

    <section class="container">
        <h4 class="center">Hesap Ekle</h4>

        <form action="add.php" method="POST" class="white">
            <label for="A_name">Hesap Kullanıcı Adı :</label>
            <input type="text" name="A_name" value="<?php   echo htmlspecialchars($hesapAdı )   ?>">
            <div class="red-text"><?php echo $errors["hesap_adi"]; ?></div>
            <label for="A_password">Hesap Şifre :</label>
            <input type="text" name="A_password" value="<?php   echo htmlspecialchars($hesapŞifre )    ?>">
            <div class="red-text"><?php echo $errors["hesap_şifre"]; ?></div>
            
             
            <div class="center">
                <input type="submit" name="submit" value="ekle" class="btn brand z-depth-0">
            </div>



        </form>
    </section>


    <?php     include("footer.php"); ?>
    
</body>
</html>
 