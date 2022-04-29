<?php
error_reporting(0);
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");
include("checklogin.php");
check_login();

if(isset($_GET["property_id"]))
{
	$property_id = $_GET['property_id'];
  $r=mysqli_query($con,"select * from properties where property_id ='$property_id'");
  $rr=mysqli_fetch_array($r);
  if($rr > 0){
   
  }
  else{
    $extra = "properties.php";
    echo "<script>window.location.href='".$extra."'</script>";
  }
}
else{
    $extra = "properties.php";
    echo "<script>window.location.href='".$extra."'</script>";
}

if(isset($_GET["delid"]))
{
	$delid = $_GET['delid'];
    $que=mysqli_query($con,"select * from property_image where id ='$delid'");
    $rets=mysqli_fetch_array($que);
    if($rets > 0){

        $querys = mysqli_query($con,"DELETE FROM property_image WHERE id ='$delid'");
        if ($querys) {
          echo "<script>alert('Property Image Deleted Successfully!');</script>";
        }
    }
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
			<h3>Property Details</h3>
      <div class="row">
        <div class="col-lg-12">
          <form class="form-horizontal" name="form1" method="post" action="">
            <div class="panel panel-default">
              <div class="panel-body">                                                                        
                <p align="center" style="color:#FF0000"><?=$_SESSION['msg1'];?><?=$_SESSION['msg1']="";?></p>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label"><b>Property Title</b></label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <label class="col-lg-12"><?php echo $rr['property_title'];?></label>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label"><b>Property Details</b></label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <label class="col-lg-12"><?php echo $rr['property_details'];?></label>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label"><b>Delivery Type</b></label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <label class="col-lg-12"><?php echo $rr['delivery_type'];?></label>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label"><b>Status</b></label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <label class="col-lg-12"><?php if($rr['availablility'] == 1){echo "UnAvailable";}else{echo "Available";}?></label>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label"><b>Property Price</b></label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <label class="col-lg-12">N <?php echo $rr['price'];?></label>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label"><b>Property Utility</b></label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <label class="col-lg-12"><?php echo $rr['utility'];?></label>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label"><b>Property Floor Space</b></label>
                  <div class="col-md-6 col-xs-12">
                      <label class="col-2"><?php echo $rr['floor_space'];?></label>
                  </div>
                </div>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label"><b>Address</b></label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <label class="col-lg-12"><?php echo $rr['property_address'];?></label>
                    </div>            
                  </div>
                </div>
               
                <div class="form-group">                                        
                  <label class="col-md-2 "><b>Bed Room</b></label>
                  <div class="col-md-2 ">
                      <label class="col-2"><?php echo $rr['bed_room'];?></label>
                  </div>
                  <label class="col-md-2"><b>Living Room</b></label>
                  <div class="col-md-2 ">
                      <label class="col-2"><?php echo $rr['liv_room'];?></label>
                  </div>
                  <label class="col-md-2 "><b>Kitchen</b></label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <label class="col-lg-2"><?php echo $rr['kitchen'];?></label>
                    </div>            
                  </div>
                  <label class="col-md-2 "><b>Parking</b></label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <label class="col-lg-2"><?php echo $rr['parking'];?></label>
                    </div>            
                  </div>
                </div>

                <div class="panel-footer">
                <h4><b>Property Images</b></h4>         
                </div>
              <div class="row">
              <div class="col-md-12">
                <div class="col-md-3" style="margin-top:10px;">
                      <img src="../<?php echo $rr['property_img'];?>" width="200px" />><br><br>
                      <h6><b>Main Property Images</b></h6>
                  </div>  
                  <?php
              $cnt = 1;
              $que=mysqli_query($con,"SELECT * from property_image where property_id = '$property_id'");
              while ($row=mysqli_fetch_array($que)) {
              ?>
                <div class="col-md-3" style="margin-top:10px;">
                      <img src="../<?php echo $row['property_images'];?>" width="200px" /><br><br>
                      <a href="?property_id=<?php echo $property_id;?>&delid=<?php echo $row['id'];?>"  class="btn btn-primary pull-left" onclick="return confirm('Are you sure you want to delete this Property Image?');">Delete</a>
                  </div>
              <?php
                }
              ?>
                  </div>
                                        
              </div>
            </div>
          </form>
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