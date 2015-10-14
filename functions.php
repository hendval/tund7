<?php
	require_once("../tund5/configGlobal.php");
	$database = "if15_hendval";
	
	
	function getCarData(){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
	
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color from car_plates WHERE deleted IS NULL");
		$stmt->bind_result($id, $user_id_from_database, $number_plate, $color);
		$stmt->execute();
		
		// tekitan tühja massiivi ,kus edaspidi hoian objekte
		$array = array();
		
		//tee midagi seni kuni saame ab'st ühe rea andmeid
		while($stmt->fetch()){
			//while statement yo
			// tekitan objekti kus hakkan hoidma väärtusi
			$car = new StdClass();
			$car->id = $id;
			$car->plate = $number_plate;
			$car->color = $color;
			$car->userid = $user_id_from_database;
			
			//lisan massiivi
			array_push($array, $car);
			//var dump ütleb muutuja tüübi ja sisu
			//echo "<pre>";
			//var_dump($array);
			//echo "</pre><br>";
			
		}
		
		//tagastn massiivi
		return $array;
		
		$stmt->close();
		$mysqli->close();
	}
	
	function deleteCar($id){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE car_plates SET deleted=NOW() WHERE id=?");
		$stmt->bind_param("i", $id);
		if($stmt->execute()){
			//sai kustutatud
			//kustutame aadressirea tühjaks
			header("Location: table.php");
		}
		
		$stmt->close();
		$mysqli->close();
		
	}
	
	function updateCar($id, $number_plate, $color){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE car_plates SET number_plate=?, color=? WHERE id=?");
		$stmt->bind_param("ssi", $number_plate, $color, $id);
		if($stmt->execute()){
			//sai kustutatud
			//kustutame aadressirea tühjaks
			header("Location: table.php");
		}
		
		$stmt->close();
		$mysqli->close();
		
	}
	//käivitan funktsiooni
	getCarData();
?>