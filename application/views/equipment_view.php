<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo ASSETS.'css/manage-equipment.css';?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="<?php echo ASSETS.'js/equipment.js';?>"></script>
		<title>Manage Equipment</title>
	</head>
	<body>
        <img src="<?php echo ASSETS.'/images/watermark.png';?>" alt="" class="watermark">
		<a href="<?php echo BASE_URL.'dashboard';?>" class="back-btn">Back</a>
		<div class="box">
			<div class="form-container">
				<div class="heading">
					<h2>Manage <span>Equipment</span></h2>
					<p>Add, Allocate, Retire equipments</p>
				</div>
				<form>
					<div class="input-container">
						<label for="equipment" class="input-heading">Select Equipment</label>
						<div class="checkboxes">
							<div>
								<input type="radio" id="firearms" name="equipment" value="Firearm" checked="checked">
								<span class="radio-box"></span>
								<label for="firearms" class="radio-label">Firearms</label>
							</div>
							<div>
								<input type="radio" id="vehicles" name="equipment" value="Vehicle">
								<span class="radio-box"></span>
								<label for="vehicles" class="radio-label">Vehicles</label>
							</div>
							<div>
								<input type="radio" id="medical" name="equipment" value="Medical">
								<span class="radio-box"></span>
								<label for="medical" class="radio-label">Medical Equipment</label>
							</div>
						</div>
					</div>

					<div class="input-container">
						<label for="action" class="input-heading">Select Action</label>
					  	<div class="checkboxes">
						  	<div>
							  <input type="radio" id="add" name="action" value="Add" checked="checked">
							  <span class="radio-box"></span>
							  <label for="add" class="radio-label" id="add-firearms">Add Firearms</label>
							</div>
							<div>
								<input type="radio" id="allocate" name="action" value="Allocate">
								<span class="radio-box"></span>
								<label for="allocate" class="radio-label" id="allocate-firearms">Allocate Firearms</label>
							</div>
							<div id="last-button-retire">
								<input type="radio" id="retire" name="action" value="De-allocate">
								<span class="radio-box"></span>
								<label for="retire" class="radio-label" id="retire-firearms">Retire Firearms</label>
							</div>
					  	</div>
					</div>

					<div class="fields">
						<div class="text-field">
							<label for="name" class="input-heading">Enter Name</label>
							<input type="text" id="name" name="name" autocomplete="off">
						</div>
						<div class="option-field">
							<label for="quantity" class="input-heading">Enter Quantity</label>
							<input type="number" id="quantity" name="name" autocomplete="off" min="1">
						</div>
					</div> 
					<div class="fields" id="assignee-box">
						<div class="text-field">
							<label for="allocate retire" class="input-heading">Select Assignee</label>
							<select id="assignee" name="quantity" class="quantity-list">
								<?php 
									if($_SESSION['user_info']['Rank_id'] == 5)
									{
									 $squads = array('Anti_Tank','Medical','Sniper','Assault','Signals','Infantry');
									 $i=0;
									 foreach($sub_list as $subs)
									 {
										echo '<option value="'.$subs['squad_id'].'">'.$squads[$i].'</option>';
										$i++;
									 }
									}
								?>
							  </select>
						</div>
					</div>
					<div class="button">
					  <input type="button" value="Confirm" onclick="manage_equipment('<?php echo BASE_URL;?>');">
					</div>
				  </form>
			</div>
		</div>
	</body>
	<script>		
		const firearmsCheckbox = document.getElementById("firearms");
		const vehiclesCheckbox = document.getElementById("vehicles");
		const medicalCheckbox = document.getElementById("medical");

		var add= document.getElementById("add");
		var allocate= document.getElementById("allocate");
		var retire= document.getElementById("retire");

		firearmsCheckbox.addEventListener("change", function() 
		{
			document.getElementById("add-firearms").innerHTML = "Add Firearms";
			document.getElementById("allocate-firearms").innerHTML = "Allocate Firearms";
			document.getElementById("retire-firearms").innerHTML = "Retire Firearms";
			document.getElementById("last-button-retire").style.display = "flex";	
		});

		vehiclesCheckbox.addEventListener("change", function() 
		{
			document.getElementById("add-firearms").innerHTML = "Add Vehicles";
			document.getElementById("allocate-firearms").innerHTML = "Allocate Vehicles";
			document.getElementById("retire-firearms").innerHTML = " Retire Vehicles";
			document.getElementById("last-button-retire").style.display = "flex";	
		});
						
		medicalCheckbox.addEventListener("change", function() 
		{
			document.getElementById("add-firearms").innerHTML = "Add Meds";
			document.getElementById("allocate-firearms").innerHTML = "Allocate Meds";
			document.getElementById("retire-firearms").innerHTML = " Retire Meds";
			document.getElementById("last-button-retire").style.display = "none";	
		});

		allocate.addEventListener("change", function() 
		{
			document.getElementById("assignee-box").style.display = "flex";
		});

		add.addEventListener("change", function() 
		{
			document.getElementById("assignee-box").style.display = "none";
		});

		retire.addEventListener("change", function() 
		{
			document.getElementById("assignee-box").style.display = "none";
		});
	</script>
</html>
