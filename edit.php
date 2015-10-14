<?php
	require_once("edit_functions.php");
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
	<label for="number_plate">Auto numbrimärk</label><br>
  	<input name="number_plate" id="number_plate" type="text" value=""><br><br>
	<label for="color">Auto värv</label><br>
  	<input name="color" id="color" type="text" value=""><br><br>
  	<input type="submit" name="add_plate" value="Salvesta">
 </form>