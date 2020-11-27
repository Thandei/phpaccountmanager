<?php 
    $conn = mysqli_connect("localhost","root","2xrAm9Gft3yZq4EX","valorant_hesap");

    if(isset($_POST["put"])){
        $maçsayısı = mysqli_real_escape_string($conn, $_POST["putphp"]);
        $id_to_change = mysqli_real_escape_string($conn, $_POST["id_to_delete"]);

        $sql ="UPDATE hesaplar SET kalanMaç= $maçsayısı WHERE id = $id_to_change ";

        if(mysqli_query($conn , $sql)){
            header("Location: index.php");
        } {
            echo "query error: " . mysqli_error($conn);
        }
    }
   
    if(isset($_POST["delete"])){

        $id_to_delete = mysqli_real_escape_string($conn, $_POST["id_to_delete"]);

        $sql = "DELETE  FROM hesaplar WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            header("Location: index.php");
        } {

            echo "query error: " . mysqli_error($conn);

        }

    }
    // Check if there is a id param in URL 
    if(isset($_GET["id"])){
        $id = mysqli_real_escape_string($conn, $_GET["id"]);
        
        
        //make sql 
        $sql = "SELECT * FROM hesaplar WHERE id = $id";

        //get the query result

        $result = mysqli_query($conn, $sql);

        // fetch result in the array format 

        $hesap = mysqli_fetch_assoc($result);

         mysqli_free_result($result);
         mysqli_close($conn);

        
    }



 
?>


<!DOCTYPE html>
<html lang="en">
 <?php   include("header.php")    ?>

<h4 class="center">Details </h4>

<div class="center container">

    <h5>Kullanıcı Adı : <?php echo htmlspecialchars($hesap['hesapAdı']); ?></h5>
    <p>Şifre : <?php  echo htmlspecialchars($hesap['hesapŞifre']); ?> </p> </br>
    <p>Kalan maç :  <?php  echo htmlspecialchars($hesap['kalanMaç']);  ?></p>


    <form action="details.php" method="POST">
        <label for="putphp"> kalan maç sayısı : </label>
        <input type="text" name="putphp" value="">
        <input type="hidden" name="id_to_delete" value="<?php  echo $hesap["id"]  ?>">
        <input type="submit" name="put" value="Maç Sayısı Ekle" class="btn btn-danger">
        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
  
    </form>
</div>

 <?php   include("footer.php")    ?>
</html>