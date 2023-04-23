<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo ASSETS.'css/dashboard.css';?>">
  <title>Dashboard</title>
</head>
<body>
  <img src="<?php echo ASSETS.'/images/watermark.png';?>" alt="" class="watermark">
  <h1 class="welcome"><span class="welcome-text">Welcome,</span> <span class="name-text">Sergeant Smith!</span></h1>

  <div class="parent">
    <div class="div1 child">
       <div class="menu">
        <a href="profile.html" class="profile">
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
        <a href="#" class="logout">
          <img src="<?php echo ASSETS.'/images/logout.png';?>" alt="logout-img" class="logout-img">
        </a>
       </div>
    </div>
    <div class="div2 child"> 
      <a href="create-operation.html" class="content">
        <img src="<?php echo ASSETS.'/images/folder.png';?>" alt="folder-img">
        Create Operation
      </a>
    </div>
    <div class="div3 child">
      <a href="manage-armory.html" class="content">
        <img src="<?php echo ASSETS.'/images/armory.png';?>" alt="gun-img">
        Manage Armory
      </a>
    </div>
    <div class="div4 child"> 
      <a href="give-orders.html" class="content">
        <img src="<?php echo ASSETS.'/images/orders.png';?>" alt="order-img">
        Manage Armory
      </a>
    </div>
    <div class="div5 child"> 
      <div class="orders-heading">
        <h2>Orders</h2>
      </div>
      <div class="orders">
        <a href="#" class="order-container">
          <img src="<?php echo ASSETS.'/images/bell.png';?>" alt="bell-img">
          <div class="order-text">
            <p class="order">Prepare for War</p>
            <p class="order-date">April 20<sup>th</sup></p>
          </div>
        </a>
        <a href="#" class="order-container">
          <img src="<?php echo ASSETS.'/images/bell.png';?>" alt="bell-img">
          <div class="order-text">
            <p class="order">Prepare for War</p>
            <p class="order-date">April 20<sup>th</sup></p>
          </div>
        </a>
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
          My Battalion
        </h2>
      </div>
      <div class="table-container">
        <table class="my-battalion">
          <thead>
            <tr>
              <th>Camps</th>
              <th>Headquarters</th>
              <th>Total Soldiers</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>North Campus</td>
              <td>Russia</td>
              <td>1353</td>
            </tr>
            <tr>
              <td>West Campus</td>
              <td>California</td>
              <td>1531</td>
            </tr>
            <tr>
              <td>East Campus</td>
              <td>Delhi</td>
              <td>2735</td>
            </tr>
            <tr>
              <td>East Campus</td>
              <td>Delhi</td>
              <td>2735</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="div9 child">
      <div class="top">
        <h2 class="recent-operation-heading">
          Recent Operation
        </h2>
        <a href="recent-operation.html">View all</a>
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
            <tr>
              <td><img src="<?php echo ASSETS.'/images/green.png';?>" alt="green-light" class="lights"> Successful</td>
              <td>Operation Jeet</td>
              <td>Carried out in J&amp;K ...</td>
              <td>March 20<sup>th</sup></td>
            </tr>
            <tr>
              <td><img src="<?php echo ASSETS.'/images/red.png';?>" alt="red-light" class="lights"> Failed</td>
              <td>Operation D.M.E</td>
              <td>Encountered an error during execution</td>
              <td>March 3<sup>rd</sup></td>
            </tr>
            <tr>
              <td><img src="<?php echo ASSETS.'/images/grey.png';?>" alt="grey-light" class="lights"> Ongoing</td>
              <td>Operation D.C.E</td>
              <td>In Process</td>
              <td>March 18<sup>th</sup></td>
            </tr>
            <tr>
              <td><img src="<?php echo ASSETS.'/images/grey.png';?>" alt="grey-light" class="lights"> Ongoing</td>
              <td>Operation D.C.E</td>
              <td>In Process</td>
              <td>March 18<sup>th</sup></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>