 <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper">
        <div class="profile-wrapper"> <img src="assets/img/others/avatarF.png"  alt=""  width="69" height="69" /> </div>
        <div class="user-info">
          <div class="greeting">Welcome</div>
          <div class="username">&nbsp;&nbsp;Agent</div><br>
          <?php
            $qer=mysqli_query($con,"SELECT * FROM agent WHERE agent_id='".$_SESSION['id']."'");
            $cnt=mysqli_fetch_array($qer);
            if($cnt>0)
            {
              echo $cnt['agent_name'];
            }
          ?>
        </div>
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      <p class="menu-title"> <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>

    <ul>	
      <li class="start"> <a href="home.php"><i class="icon-custom-home"></i> <span class="title">Dashboard</span></a> 
      </li>
      <!-- <li><a href="agents.php"><span class="fa fa-users"></span> Agents</a></li> -->
      <li><a href="propertyType.php"><span class="fa fa-home"></span> Property Type</a></li>
      <li><a href="properties.php"><span class="fa fa-home"></span> Properties</a></li>
      <li><a href="property-images.php"><span class="fa fa-home"></span> Property Images</a></li>
      <!-- <li><a href="manage-ticket-category.php"><span class="fa fa-ticket"></span>Manage Ticket Category</a></li>
      <li><a href="manage-tickets.php"><span class="fa fa-ticket"></span> Manage Tickets</a></li>
      <li><a href="view-tickets.php"><span class="fa fa-ticket"></span> View Tickets</a></li>
      <li ><a href="manage-quotes.php"> <span class="fa fa-tasks"></span> Manage Quotes</a></li> 
      <li><a href="user-access-log.php"><span class="fa fa-users"></span>&nbsp;&nbsp;User Access Log</a></li> -->
      <li><a href="change-password.php"><span class="fa fa-lock"></span> Change Password</a></li>
    </ul>