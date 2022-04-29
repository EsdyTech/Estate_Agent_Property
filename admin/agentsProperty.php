<?php
error_reporting(0);
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");
include("checklogin.php");
check_login();

if(isset($_GET["agent_id"]))
{
	$agent_id = $_GET['agent_id'];
}
else{
    $extra = "agents.php";
    echo "<script>window.location.href='".$extra."'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Real Estate Management | Agents </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row-fluid">	
	<?php include("leftbar.php");?>
	<div class="clearfix"></div>
    <!-- END SIDEBAR MENU --> 
  </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-radius no-margin">
		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		
	</div>
	<div class="pull-right">
	</div>
  </div>
  <!-- END SIDEBAR --> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
		<div class="page-title">	
			<h3>All Estate and Property Agents</h3>
      <div class="row">
        <div class="col-lg-12">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>S/N</th>
                  <th>Title</th>
                  <th>Decription</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Price</th>
                  <th>Address</th>
                  <th>View Full Details</th>
              </tr>
          </thead>
          <tbody>
          <?php
              $cnt = 1;
              $que=mysqli_query($con,"SELECT * from properties where agent_id = '$agent_id'");
              while ($row=mysqli_fetch_array($que)) {
              ?>
              <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php echo $row['property_title'];?></td>
                  <td><?php echo $row['property_details'];?></td>
                  <td><?php echo $row['delivery_type'];?></td>
                  <td><?php if($row['availablility'] == 1){echo "UnAvailable";}else{echo "Available";}?></td>
                  <td><?php echo $row['price'];?></td>
                  <td><?php echo $row['property_address'];?></td>
                  <td><a href="viewPropDetails.php?property_id=<?php echo $row['property_id'];?>" ><i class="fa fa-eye"></i></a></td>
              </tr>
              <?php
                  $cnt=$cnt+1;
              }
          ?>
          </tbody>
              <tfoot>
                  <tr>
                     <th>S/N</th>
                    <th>Title</th>
                    <th>Decription</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>View Full Details</th>
                  </tr>
          </tfoot>
      </table>

          
        </div>
      </div>                                                   	
		</div>
    </div>
  </div>

 </div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 

<script src="assets/js/datatable.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>

</body>
</html>