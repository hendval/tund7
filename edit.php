<?php
	require_once("edit_functions.php");
	
	if(isset($_POST["update_plate"])){
		// vajutas salvesta nuppu
		
		updateCar($_POST["id"], $_POST["number_plate"], $_POST["color"]);
		
	}
	
	// edit
	// aadressireal on ?edit_id siis trükin välja selle väärtuse
	if(isset($_GET["edit_id"])){
		echo $_GET["edit_id"];
		
		// id oli aadressireal
		// tahaks ühte rida kõige uuemaid aindmeid kus id on $_GET["edit_id"]
		
		$car = getEditData($_GET["edit_id"]);
		var_dump($car);
	} else {
		// die teeb lehe katki
		// die();
		header("Location: table.php");
	}

	
	
?>

<h2>Muuda autonumbrimärki</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
	<input type="hidden" name="id" value="<?=$_GET["edit_id"]?>">
	<label for="number_plate">Auto numbrimärk</label><br>
  	<input name="number_plate" id="number_plate" type="text" value="<?=$car->number_plate;?>"><br><br>
	<label for="color">Auto värv</label><br>
  	<input name="color" id="color" type="text" value="<?=$car->color;?>"><br><br>
  	<input type="submit" name="update_plate" value="Salvesta">
 </form>