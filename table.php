<?php
	require_once("functions.php");
	
	//kas kustutame
	if(isset($_GET["delete"])){
		
		echo "Kustutame id"." ".$_GET["delete"];
		// käivitan funktsiooni, saadan kaasa id
		deleteCar($_GET["delete"]);
		
	}
	
	
	//salvestan ab'i
	if(isset($_POST["Save"])){
	
		updateCar($_POST["id"], $_POST["number_plate"], $_POST["color"]);
	
	}
	
	$array = getCarData();
	
?>
<h2>Tabel</h2>
<table border=1>
	<tr>
		<th>ID</th>
		<th>User ID</th>
		<th>Numbrimärk</th>
		<th>Värv</th>
		<th>Kustuta</th>
		<th>Muuda</th>
	</tr>
	
	<?php 
	for($i = 0; $i < count($array); $i++){
		
		//kasutaja tahab muuta
		if(isset($_GET["edit"]) && $array[$i]->id == $_GET["edit"]){
			
			echo "<tr>";
			echo "<form action='table.php' method='post'>";
			echo "<input type='hidden' name='id' value='".$array[$i]->id."'>";
			echo "<td>".$array[$i]->id."</td>";
			echo "<td>".$array[$i]->userid."</td>";
			echo "<td><input name='number_plate' value='".$array[$i]->plate."'></td>";
			echo "<td><input name='color' value='".$array[$i]->color."'></td>";
			echo "<td><a href='table.php'>Cancel</a></td>";
			echo "<td><input type='submit' name='Save' value='Salvesta'></td>";
			echo "</form>";
			echo "</tr>";
			
		}else{
			
			echo "<tr>";
			echo "<td>".$array[$i]->id."</td>";
			echo "<td>".$array[$i]->userid."</td>";
			echo "<td>".$array[$i]->plate."</td>";
			echo "<td>".$array[$i]->color."</td>";
			echo "<td><a href='?delete=".$array[$i]->id."'>X</a>";
			echo "<td><a href='?edit=".$array[$i]->id."'>Edit</a>";
			echo "<td><a href='edit.php?edit_id=".$array[$i]->id."'>Test</a>";
			echo "</tr>";
			
		}
		
	}
	?>
</table>