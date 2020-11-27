<?php 

	$conn = mysqli_connect("localhost","root","2xrAm9Gft3yZq4EX","valorant_hesap");

	$sql = "SELECT * FROM hesaplar ORDER BY tarih";

	$result = mysqli_query($conn,$sql);

	$hesaplar = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
	
	 
?>


<!DOCTYPE html>
<html lang="en">
 
<?php include("header.php")  ?>

<h4 class="center grey-text">- Hesaplar -</h4>
<div class="container">
	<div class="row">
	
		<?php foreach($hesaplar as $hesap){ ?>
			<div class="col s6 md3">
				<div class="card z-depth-0">
					<img class="image" src="1.png">
					<div class="card-content center">
					
						<div class="card-text margin"><span>Hesap adı =  </span> <?php echo htmlspecialchars($hesap["hesapAdı"]) ?> </div>
						<div class="card-text margin"> <span>Hesap şifresi =  </span> <?php echo htmlspecialchars($hesap["hesapŞifre"]) ?> </div>
						<div class="card-text margin"> <span>Kaç maç kaldı  =  </span> <?php echo htmlspecialchars($hesap["kalanMaç"]) ?> </div>

					</div>
					<div class="card-action center bg-grey">
						<a class="a-text" href="details.php?id=<?php echo htmlspecialchars($hesap["id"]) ?>"  >Hesap Bilgisi</a>
					
					</div>
				</div>	
			
			
			</div>
		<?php } ?>
	
	
	</div>


</div>

<?php include("footer.php")  ?>
</html>
