<?php
error_reporting(0);
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");
include("checklogin.php");
check_login();


if(isset($_POST['create']))
{
  extract($_POST);
  $dateReg=date('Y-m-d');

    $property_imgTmpPath = $_FILES['property_img']['tmp_name'];
    $property_imgName = $_FILES['property_img']['name'];
    $property_imgSize = $_FILES['property_img']['size'];
    $property_imgType = $_FILES['property_img']['type'];
    $property_imgNameCmps = explode(".", $property_imgName);
    $property_imgExtension = strtolower(end($property_imgNameCmps));

    //gives the fileupoladed a unique Identifier
    $property_imgnewFileName = md5(time().$property_imgName).'.'.$property_imgExtension;

    $uploadFileDir = '../images/properties/';
    $dest_path = $uploadFileDir . $property_imgnewFileName;
    move_uploaded_file($property_imgTmpPath, $dest_path);

    $propertyImage = str_replace("../","",$uploadFileDir);
    $propertyImage = $propertyImage.$property_imgnewFileName;

    $a=mysqli_query($con,"insert into property_image(property_images,property_id)
    values('$propertyImage','$property_id')");
    if($a)
    {
      echo "<script>alert('Property Image Added Successfully!');</script>";
      $extra = "viewPropDetails.php?property_id=".$property_id."";
        echo "<script>window.location.href='".$extra."'</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Real Estate Management | Properties </title>
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
			<h3>Add Property Images</h3>
      <div class="row">
        <div class="col-lg-12">
          <form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
            <div class="panel panel-default">
              <div class="panel-body">                                                                        
                <p align="center" style="color:#FF0000"><?=$_SESSION['msg1'];?><?=$_SESSION['msg1']="";?></p>
               
                <div class="form-group">                                        
                  <div class="col-md-3">
                  <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <?php 
                        $query=mysqli_query($con,"select * from properties where agent_id = '$_SESSION[id]' ORDER BY property_id ASC");                        
                        $count = mysqli_num_rows($query);
                        if($count > 0){                       
                            echo '<select required name="property_id" class="form-control">';
                            echo'<option value="">--Select Property--</option>';
                            while ($row = mysqli_fetch_array($query)) {
                                echo'<option value="'.$row['property_id'].'" >'.$row['property_title'].'</option>';
                            }
                            echo '</select>';
                        }
                      ?>
                    </div>              
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                    <input type="file" name="property_img" id="" value="" placeholder="Image of Property" required class="form-control"/>
                    </div>            
                  </div>
                </div>
                
              </div>
              </div>
              <div class="panel-footer">
              <input type="submit" value="Add" name="create" class="btn btn-primary pull-centre">
                <button disabled class="btn btn-default">Clear Form</button>                                    
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