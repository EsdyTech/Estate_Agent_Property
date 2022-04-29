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

  $r=mysqli_query($con,"select * from properties where property_title ='$property_title'");
  $rr=mysqli_fetch_array($r);
  if($rr > 0){
    echo "<script>alert('This Property Already exists!');</script>";
  }
  else{

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

    $a=mysqli_query($con,"insert into properties(property_title,property_details,delivery_type,availablility,price,property_address,property_img,bed_room,liv_room,parking,kitchen,utility,property_type,floor_space,agent_id,dateCreated)
    values('$property_title','$property_details','$delivery_type','$availablility','$price','$property_address','$propertyImage','$bed_room','$liv_room','$parking','$kitchen','$utility','$property_type','$floor_space','$_SESSION[id]','$dateReg')");
    if($a)
    {
      echo "<script>alert('Property Created Successfully!');</script>";
    }
  }
}

if(isset($_GET["delid"]))
{
	$delid = $_GET['delid'];
    $que=mysqli_query($con,"select * from properties where property_id ='$delid'");
    $rets=mysqli_fetch_array($que);
    if($rets > 0){

        $querys = mysqli_query($con,"DELETE FROM properties WHERE property_id ='$delid'");
        if ($querys) {
          echo "<script>alert('Agent Property Deleted Successfully!');</script>";
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
			<h3>Add New Property</h3>
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
                      <input type="text" name="property_title" id="" value="" placeholder="Property Name" required class="form-control"/>
                    </div>            
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <input type="text" name="property_details" id="" placeholder="Details/Description" value="" required class="form-control"/>
                    </div>            
                  </div>
                </div>

                <div class="form-group">                                        
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <select id="inputState" name="delivery_type" required class="form-control">
                        <option value="">--Select Delivery Type--</option>
                        <option value="Rent">Rent</option>
                        <option value="Sale">Sale</option>
                    </select>  
                    </div>            
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                      <select id="inputState" name="availablility" required class="form-control">
                        <option selected="selected">--Select Availability Status--</option>
                        <option value="0">Available</option>
                        <option value="1">Unavailable</option>
                    </select>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-money"></span></span>
                      <input type="text" name="price" id="" value="" placeholder="Price/Amount" required class="form-control"/>
                    </div>            
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-image"></span></span>
                      <input type="file" name="property_img" id="" value="" placeholder="Image of Property" required class="form-control"/>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <input type="number" name="bed_room" id="" value="" placeholder="No of Bed room" required class="form-control"/>
                    </div>            
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <input type="number" name="liv_room" id="" value="" placeholder="No of Living room" required class="form-control"/>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-car"></span></span>
                      <input type="number" name="parking" id="" placeholder="No of Parking Space" value="" required class="form-control"/>
                    </div>            
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <input type="number" name="kitchen" id="" value="" placeholder="No of Kitchen" required class="form-control"/>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-gear"></span></span>
                      <input type="text" name="utility" id="" value="" placeholder="List of Utilities" required class="form-control"/>
                    </div>            
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <?php 
                        $query=mysqli_query($con,"select * from property_type ORDER BY typeName ASC");                        
                        $count = mysqli_num_rows($query);
                        if($count > 0){                       
                            echo '<select required name="property_type" class="form-control">';
                            echo'<option value="">--Select Property Type--</option>';
                            while ($row = mysqli_fetch_array($query)) {
                                echo'<option value="'.$row['id'].'" >'.$row['typeName'].'</option>';
                            }
                            echo '</select>';
                        }
                      ?>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <input type="text" name="floor_space" id="" value="" placeholder="Floor Space" required class="form-control"/>
                    </div>            
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-home"></span></span>
                      <textarea name="property_address" required class="form-control" placeholder="Address" rows="5"></textarea>
                    </div>            
                  </div>
                </div>
              </div>
              </div>
              <div class="panel-footer">
              <input type="submit" value="Create" name="create" class="btn btn-primary pull-centre">
                <button disabled class="btn btn-default">Clear Form</button>                                    
              </div>
            </div>
          </form>
        </div>
      </div>                                                   	
		</div>

    <div class="content">  
		<div class="page-title">	
			<h3>All Properties</h3>
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
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
          <?php
              $cnt = 1;
              $que=mysqli_query($con,"SELECT * from properties where agent_id = '$_SESSION[id]'");
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
                  <td><a href="?delid=<?php echo $row['property_id'];?>" onclick="return confirm('Are you sure you want to delete this Property?');"><i class="fa fa-trash"></i></a></td>
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
                    <th>Delete</th>
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