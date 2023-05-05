<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS."css/create-operation.css"?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="<?php echo ASSETS."js/create_op.js"?>"></script>
    <title>Create Operation</title>
</head>
<body>
    <img src="<?php echo ASSETS.'/images/watermark.png';?>" alt="" class="watermark">
    <a href="<?php echo BASE_URL.'dashboard';?>" class="back-btn">Back</a>
    <div class="box">
        <div class="form-container">
            <div class="heading">
                <h2>Create <span>Operation</span></h2>
                <p>Create new operation for battalion under you</p>
            </div>
            <form class = "create-op-form">
                <div class="input-container">
                    <label for="operation-name" class="input-heading">Operation Name</label>
                    <div class="input-field">
                        <input type="text" id="op-name" name="operation-name" autocomplete="off" required>
                    </div>
                </div>

                <div class="input-container">
                    <label for="description" class="input-heading">Operation Description</label>
                    <div class="input-field">
                        <textarea name="description" id="description-field"></textarea>
                    </div>
                </div>

                <div class="option-field">
                    <label for="battalion" class="input-heading">Select Battalion</label>
                    <select id="battalion" class="battalion-list">
                        <?php
                            $i=1;
                            foreach($battalion_list as $battalion){
                                if(isset($battalion))
                                echo "<option value='".$battalion."'>".'Batallion '.$i."</option>";
                                $i++;
                            }
                        ?>
                    </select>
                  </div>

                <div class="fields">
                    <div class="date-field">
                        <label for="name" class="input-heading">Start Date</label>
                        <input type="date" id="start-date" name="name" autocomplete="off" required>
                    </div>
                    <div class="date-field">
                        <label for="quantity" class="input-heading">End Date</label>
                        <input type="date" id="end-date" name="name" autocomplete="off" required>
                    </div>
                </div> 
                <div class="button">
                  <input type="button" value="Confirm" onclick="create_op('<?php echo BASE_URL;?>')">
                </div>
              </form>
        </div>
    </div>
</body>
</html>

