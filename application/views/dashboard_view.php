<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
  <link rel="stylesheet" href="<?php echo ASSETS.'css/dashboard.css';?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="<?php echo ASSETS.'js/orders_view.js';?>"></script>
  <title>Dashboard</title>
</head>
<body>
  <img src="<?php echo ASSETS.'/images/watermark.png';?>" alt="" class="watermark">
  <h1 class="welcome"><span class="welcome-text">Welcome,</span> <span class="name-text"><?php echo $_SESSION['user_info']['rank'].' '.$_SESSION['user_info']['User_name'];?></span></h1>

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
          <a href="<?php echo BASE_URL.'equipment';?>" class="armory">
            <img src="<?php echo ASSETS.'/images/armory.png';?>" alt="gun-img">
          </a>
          <a href="<?php echo BASE_URL.'logout';?>" class="logout">
            <img src="<?php echo ASSETS.'/images/logout.png';?>" alt="logout-img" class="logout-img">
          </a>
      </div>
    </div>
    <div class="div2 child"> 
      <a href="<?php echo BASE_URL.'create-operation';?>" class="content">
        <img src="<?php echo ASSETS.'/images/folder.png';?>" alt="folder-img">
        Create Operation
      </a>
    </div>
    <div class="div3 child">
      <a href="<?php echo BASE_URL.'equipment';?>" class="content">
      <img src="<?php echo ASSETS.'/images/armory.png';?>" alt="gun-img">
        Manage Equipments
      </a>
    </div>
    <div class="div4 child"> 
      <a href="<?php echo BASE_URL.'give-order';?>" class="content">
        <img src="<?php echo ASSETS.'/images/phone.png';?>" alt="order-img">
        Give Orders
      </a>
    </div>
    <div class="div5 child"> 
      <div class="order-container">
        <div class="orders-heading">
          <h2>Incoming <span>Orders</span></h2>
        </div>
        <div class="incoming-orders">
        <div class="orders">
          <?php
              foreach($in_orders as $order)
              {
                if($order['Order_status'] == 1)
                {
          ?>
            <a href="#" class="incoming-order-container" id="<?php echo $order['Order_id'];?>" status="unchecked">
              <img src="<?php echo ASSETS.'/images/bell.png';?>" alt="bell-img">
              <div class="order-text">
                <p class="order"><?php echo $order['Order_description'];?></p>
                <p class="order-date"><?php $date = new DateTime($order['Start_date']); echo $date->format('j M, Y');?></p>
              </div>
            </a>
            <?php
                }
              }
            ?>
        </div>
        </div>
        <div class="button" id="button">
          <button onclick="send_orders('<?php echo BASE_URL;?>');">Done</button>
        </div>
      </div>
      <div class="order-container">
        <div class="orders-heading">
          <h2>Outgoing <span>Orders</span></h2>
            </div>
        <div class="outgoing-orders">
        <div class="orders">
        <?php
              foreach($out_orders as $order)
              {
                if($order['Order_status'] == 1)
                {
          ?>
          <a href="#" class="outgoing-order-container">
          <img src="<?php echo ASSETS.'/images/bell.png';?>" alt="bell-img">
            <div class="order-text">
              <p class="order"><?php echo $order['Order_description'];?></p>
              <p class="order-date"><?php $date = new DateTime($order['Start_date']); echo $date->format('j M, Y');?></p>
            </div>
          </a>
          <?php
              }
            }
            ?>
        </div>
      </div>
    </div>
    </div>
    <div class="div6 child"> 
      <div class="counter">
        <p class="count-heading">Total Soldiers</p>
        <p class="count">2,38,450</p>
      </div>
    </div>
    <div class="div7 child"> 
      <div class="counter">
        <p class="count-heading">Deployed Soldiers</p>
        <p class="count">1,18,744</p>
      </div>
    </div>
    <div class="div8 child"> 
      <div class="top">
        <h2 class="recent-operation-heading">
          My <?php echo $subgroup;?>
        </h2>
      </div>
      <div class="table-container">
        <table class="my-battalion">
          <thead>
            <tr>
            <?php if ($_SESSION['user_info']['Rank_id'] == 5)
            {
              ?>
              <th>ID</th>
              <th>Name</th>
              <th>Squad Members</th>
            <?php
            }
            else
            {
              ?>
              <th>Name</th>
              <th>Commander</th>
              <th>Commander ID</th>
              <?php
            }
            ?>
            </tr>
          </thead>
          <?php if ($_SESSION['user_info']['Rank_id'] == 5)
          {
            ?>
          <tbody>
            <?php 
              $squads = array('Anti_Tank','Medical','Sniper','Assault','Signals','Infantry');
              $i=0;
              foreach($sub_list as $subs)
              {
            ?>
              <tr>
                <td><?php echo $subs['id'][0];?></td>
                <td>Sepoy <?php echo $subs['names'][0];?></td>
                <td><?php echo $squads[$i];?></td>
              </tr>
              <tr>
                <td><?php echo $subs['id'][1];?></td>
                <td><?php echo $subs['names'][1];?></td>
                <td><?php echo $squads[$i];?></td>
              </tr>
            <?php
                $i++;
              }
              ?>
          </tbody>
          <?php
          }
          else
          {
            ?>
            <tbody>
            <?php 
              foreach($sub_list as $subs)
              {
                ?>
                <tr>
                  <?php
                  if($subs === NULL)
                    break;
                foreach($subs as $sub)
                {
            ?>
                <td><?php echo $sub;?></td>
                
                <?php
              }
              ?>
              </tr>
              <?php
            }
              ?>
          </tbody>

          <?php 
        } ?>
        </table>
      </div>
    </div>
    <div class="div9 child">
      <div class="top">
        <h2 class="recent-operation-heading">
          Recent Operation
        </h2>
        <a href="<?php echo BASE_URL."recent-operations";?>">Manage Operations</a>
      </div>
      <div class="table-container">
        <table class="recent-operation">
          <thead>
            <tr>
              <th>Status</th>
              <th>Name</th>
              <th>Description</th>
              <th>Execution Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
                  foreach($ops as $op)
                  {
                    if($op['op_status'] == 1)
                     { $img = 'grey.png'; $status = 'Ongoing';}
                    else if ($op['op_status'] == 2)
                      { $img = 'green.png'; $status = 'Successful';}
                    else
                      { $img = 'red.png'; $status = 'Failed';}
                    ?>
                    <tr>
                      <td><img src="<?php echo ASSETS.'/images/'.$img;?>" alt="grey-light" class="lights"> <?php echo $status;?></td>
                      <td><?php echo $op['Op_name'];?></td>
                      <td><?php echo $op['Descriptions'];?></td>
                      <td><?php echo $op['start_date'];?></td>
                    </tr>
                    <?php
                  }
                
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
<script>
const orders = document.querySelectorAll(".incoming-order-container");
const order_button = document.getElementById("button");

orders.forEach((order) => {
  order.addEventListener("click", () => {
    // change status attribute of orders to checked if it is unchecked and vice versa
    var attr = order.getAttribute("status");
    if (attr === "unchecked") {
      order.setAttribute("status", "checked");
    } else {
      order.setAttribute("status", "unchecked");
    }
    const image = order.querySelector("img");
    if (image.getAttribute("src") === "<?php echo ASSETS.'/images/bell.png';?>") {
      order_button.style.display = "none";
      image.setAttribute("src", "<?php echo ASSETS.'/images/thumb.png';?>");
      order.style.background = "rgb(34, 73, 113)";
    } else {
      image.setAttribute("src", "<?php echo ASSETS.'/images/bell.png';?>");
      order.style.background = "";
    }
    if (document.querySelector(".incoming-order-container img[src='<?php echo ASSETS.'/images/thumb.png';?>']")) {
      order_button.style.display = "flex";
    } else {
      order_button.style.display = "none";
    }
  });
});

</script>
</html>