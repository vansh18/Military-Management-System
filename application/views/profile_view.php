<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <link rel="stylesheet" href="<?php echo ASSETS.'css/profile.css';?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<title>Profile</title>
	</head>
	<body>
		<img src="<?php echo ASSETS.'/images/watermark.png';?>" alt="" class="watermark" />
		<h3 class="welcome">My <span>Profile</span></h3>
		<div class="parent">
            <div class="div1 child">
                <div class="menu">
                    <a href="<?php echo BASE_URL.'profile';?>" class="profile">
                        <img src="<?php echo ASSETS.'/images/profile.jpg';?>" alt="profile-img" class="profile-img">
                    </a>
                    <a href="dashboard.html" class="home">
                        <img src="<?php echo ASSETS.'/images/home.png';?>" alt="home-img" class="home-img">
                    </a>
                    <a href="give-order.html" class="give-order">
                        <img src="<?php echo ASSETS.'/images/phone.png';?>" alt="phone-img">
                    </a>
                    <a href="create-operation.html" class="folder">
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
			<div class="div2 child">
				<div class="heading-container">
					<h2><?php echo $_SESSION['user_info']['User_name'];?></h2>
					<p class="rank"><?php echo $_SESSION['user_info']['rank'];?></p>
					<p class="service-id">Service ID: <?php echo $_SESSION['userid'];?></p>
				</div>
			</div>
			<div class="div3 child">
				<div class="info">
					<div class="info-text">
						<p class="title branch">Branch: <span>Army</span></p>
						<p class="title unit">
							Military Unit: <span>1<sup>st</sup> Division</span>
						</p>
						<p class="title rec-date">
						  Recruitment Date: <span id="join-date"><?php echo $_SESSION['user_info']['Joining_date'];?></span>
						</p>
						<p class="title ret-date">
                            Retirement Date: <span id="retire-date"><?php echo $_SESSION['user_info']['Retirement_date'];?></span>
                        </p>
						<p class="title phone">Phone Number: <span><?php echo $_SESSION['user_info']['Contact'];?></span></p>
						<p class="title blood">Blood Group: <span><?php echo $_SESSION['user_info']['Blood_group'];?></span></p>
						<p class="title status">Current Status: 
                            <img src="<?php 
                            $status = $_SESSION['user_info']['Cur_Status'];
                            if($status == 'Deployed')
                                echo ASSETS.'/images/green.png';
                            else if ($status == 'retired')
                                echo ASSETS.'/images/red.png';
                            else    
                                echo ASSETS.'/images/grey.png';

                            ?>" alt="green-light"><span> <?php echo $status;?></span>
                        </p>
						<p class="title address">
                            Post: <span><?php echo $_SESSION['user_info']['post'];?></span>
                        </p>
					</div>
				</div>
        <div class="edit">
          <button><img src="<?php echo ASSETS.'/images/edit.png';?>" alt="edit-image"> Edit</button>
        </div>
				<div class="achievements">
					<div class="top">
						<h3>
							Achievements <img src="<?php echo ASSETS.'/images/medal.png';?>" alt="medal-img" />
						</h3>
					</div>
					<div class="achievements-container">
						<div class="achievements-text">
							<ul>
								<li>
									Respected leader and promoted to Sergeant after leading a
									platoon through difficult terrain.
								</li>
								<li>
									Completed grueling training courses like "Hell Week" and
									"Spartan Death Race" with flying colors.
								</li>
								<li>
									Respected leader and promoted to Sergeant after leading a
									platoon through difficult terrain.
								</li>
								<li>
									Completed grueling training courses like "Hell Week" and
									"Spartan Death Race" with flying colors.
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
    <script>
        var joinDate = new Date($('#join-date').text());
        var retireDate = new Date($('#retire-date').html());
        $('#join-date').text(joinDate.toDateString());
        $('#retire-date').text(retireDate.toDateString());
    </script>
</html>
