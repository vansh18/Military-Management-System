<?php
defined ('BASEPATH') or exit('No direct script access allowed');
$subgroup = "";
if($_SESSION['user_info']['Rank_id'] == 1)
    $subgroup =  'Batallion';
else if ($_SESSION['user_info']['Rank_id'] == 2 || $_SESSION['user_info']['Rank_id'] == 3)
    $subgroup =  'Company';
else if ($_SESSION['user_info']['Rank_id'] == 4)
    $subgroup =  'Platoon';
else if ($_SESSION['user_info']['Rank_id'] == 5)
    $subgroup =  'Squad';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS.'css/give-orders.css';?>">
    <!-- add jquery and orders.js scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="<?php echo ASSETS.'js/orders.js';?>"></script>
    <title>Give Orders</title>
</head>
<body>
    <img src="<?php echo ASSETS.'/images/watermark.png';?>" alt="" class="watermark">
	<a href="<?php echo BASE_URL.'dashboard';?>" class="back-btn">Back</a>
    <div class="box">
        <div class="form-container">
            <div class="heading">
                <h2>Give <span>Order</span></h2>
                <p>Give new orders to your <?php echo $subgroup?></p>
            </div>
            <form>
                <input type="hidden" name="Rank-id" id="Rank-id" value="<?php echo $rank;?>">
                <div class="input-container">
                    <div class="order-type">
                        <label for="equipment" class="input-heading">Select Order Type</label>
                        <div class="checkboxes">
                            <div>
                                <input type="radio" id="firearms" name="equipment" value="Firearms" checked="checked">
                                <span class="radio-box"></span>
                                <label for="firearms" class="radio-label">Predefined Order</label>
                            </div>
                            <div>
                                <input type="radio" id="vehicles" name="equipment" value="Vehicles">
                                <span class="radio-box"></span>
                                <label for="vehicles" class="radio-label">Custom Order</label>
                            </div>
                        </div>
                    </div>
                    <div class="fields" id="predefined-order-type">
						<div class="text-field">
							<label for="allocate retire" class="input-heading">Select Order</label>
							<select id="order-type" name="quantity" class="quantity-list" onchange="check()" required>
								<option value="1">Promote</option>
								<option value="2">Demote</option>
								<option value="3">Dismiss</option>
								<option value="4">Create <?php echo $subgroup;?></option>
								<option value="5">Remove <?php echo $subgroup;?></option>
							  </select>
						</div>
					</div>
                    <div class="custom-order-container" id="custom-order-container">
                        <label for="custom-order" class="input-heading">Write your Order</label>
                        <textarea name="custom-order" id="custom-order" required> </textarea>
                    </div>
                    <div class="soldier-info" id="soldier-info">
                        <div class="text-field">
							<label for="name" class="input-heading">Select Soldier Rank</label>
							<select id="rank" name="quantity" class="quantity-list" required>
                                <option value="1">Rank 1</option>
                                <option value="2">Rank 2</option>
                                <option value="3">Rank 3</option>
                                <option value="4">Rank 4</option>
                                <option value="5">Rank 5</option>
                              </select>
						</div>
						<div class="option-field" id="option-field">
							<label for="quantity" class="input-heading">Select Soldier Name</label>
							<select id="soldier-name" name="quantity" class="quantity-list" required>
							  <option value="1">Sepoy Alan</option>
							  <option value="2">Sepoy Ameya</option>
							  <option value="3">Sepoy Hrishikesh</option>
							  <option value="4">Sepoy Tanish</option>
							</select>
						  </div>
                    </div>
                    <div class="subgroup-action" id="subgroup-action">
                        <div class="text-field">
							<label for="name" class="input-heading">Select Commander Name</label>
							<select id="leader_name" name="quantity" class="quantity-list" required>
                                <?php 
                                    foreach($subordinates as $sub)
                                    {
                                        echo '<option value="'.$sub['User_id'].'">'.$sub['User_name'].'</option>';
                                    }
                                ?>
                              </select>
						</div>
						<div class="subgroup_name" id="subgroup_name">
							<label for="quantity" class="input-heading"><?php echo $subgroup;?> Name</label>
                            <input type="text" name="subgrp_name" id="subgrp_name" required>
						  </div>
                    </div>


                    <div class="button">
                        <input type="button" value="Confirm" onclick = "passOrder('<?php echo BASE_URL;?>');">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    const predefined = document.getElementById("firearms");
    const custom = document.getElementById("vehicles");
    const custom_order_container = document.getElementById("custom-order-container");

    custom.addEventListener("change", function() 
    {
		document.getElementById("custom-order-container").style.display = "flex";
		document.getElementById("soldier-info").style.display = "none";
		document.getElementById("predefined-order-type").style.display = "none";
		document.getElementById("subgroup-action").style.display = "none";
	});

    predefined.addEventListener("change", function() 
    {
		document.getElementById("custom-order-container").style.display = "none";
        document.getElementById("soldier-info").style.display = "flex";
		document.getElementById("predefined-order-type").style.display = "flex";
	});

    function check() 
    {
        var order_type = document.getElementById("order-type").value;
        if(order_type == 4 || order_type == 5 )
        {
            console.log("Create subgroup");
            document.getElementById("soldier-info").style.display = "none";
            document.getElementById("subgroup-action").style.display = "flex";

        }
        else
        {
            document.getElementById("soldier-info").style.display = "flex";
            document.getElementById("subgroup-action").style.display = "none";
        }
    }
    
</script>
</html>