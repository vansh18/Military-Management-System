<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo ASSETS.'css/recent-operation.css';?>">
		<title>Profile</title>
	</head>
    <style>
        .accordian_label::after
        {
            content: "";
            position: absolute;
            top: 50%;
            right: 20px;
            width: 12px;
            height: 15%;
            transform: translateY(-50%);
            background: url(<?php echo ASSETS.'/images/down.png';?>);
            background-size: contain;
            background-repeat: no-repeat;
            transition: transform 0.5s ease-in-out;
            transform-origin: center center; 
        }
    </style>
	<body>
        <img src="<?php echo ASSETS.'/images/watermark.png';?>" alt="" class="watermark">
        <a href="dashboard.html" class="back-btn">Back</a>
		<h3 class="welcome">My <span>Profile</span></h3>
		<div class="parent">
			<div class="div1 child">
				<div class="menu">
                    <a href="<?php echo BASE_URL.'profile';?>" class="profile">
                        <img src="<?php echo ASSETS.'/images/profile.jpg';?>" alt="profile-img" class="profile-img">
                    </a>
                    <a href="<?php echo BASE_URL.'dashboard';?>" class="home">
                        <img src="<?php echo ASSETS.'/images/home.png';?>" alt="home-img" class="home-img">
                    </a>
                    <a href="<?php echo BASE_URL.'give-order';?>" class="give-order">
                        <img src="<?php echo ASSETS.'/images/phone.png';?>" alt="phone-img">
                    </a>
                    <a href="<?php echo BASE_URL.'create-operation';?>" class="folder">
                        <img src="<?php echo ASSETS.'/images/folder.png';?>" alt="folder-img">
                    </a>
                    <a href="armory.html" class="armory">
                        <img src="<?php echo ASSETS.'/images/armory.png';?>" alt="gun-img">
                    </a>
                    <a href="<?php echo BASE_URL.'logout';?>" class="logout">
                        <img src="<?php echo ASSETS.'/images/logout.png';?>" alt="logout-img" class="logout-img">
                    </a>
				</div>
			</div>
			<div class="div2 child" id="div2id">
                <?php 
                $i=1;
                foreach ($ops as $op)
                {
                    if($op['op_status'] == 1)
                     { $status = 'Ongoing';}
                    else if ($op['op_status'] == 2)
                      { $status = 'Successful';}
                    else
                      { $status = 'Failed';}
                ?>
                <div class="accordian">
                    <div class="accordian<?php echo $i;?>">
                        <input type="checkbox" name="example_accordian" id="<?php echo $i;?>"
                        class="accordian__input">
                        <label for="<?php echo $i;?>" class="accordian_label"><?php echo $op['Op_name'];?></label>
                        <div class="accordian_content">
                            <span>Batallion: <?php echo $op['Batallion_name'];?></span><br>
                            <?php echo "Start-Date: ".$op['start_date'];?><br>
                            <?php echo "End-Date: ".$op['end_date'];?><br>
                            <?php echo "Status: ".$status;?><br>
                            <?php echo $op['Descriptions'];?>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
                    }
                ?>
            </div>
			</div>
	</body>
</html>
