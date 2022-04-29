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

  $r=mysqli_query($con,"select * from agent where agent_email ='$agent_email'");
  $rr=mysqli_fetch_array($r);
  if($rr > 0){
    echo "<script>alert('Agent With Email Address Already exists!');</script>";
  }
  else{
    $a=mysqli_query($con,"insert into agent(agent_name,agent_address,agent_contact,agent_email,agent_password,dateRegistered)
    values('$agent_name','$agent_address','$agent_contact','$agent_email','password','$dateReg')");
    if($a)
    {
      echo "<script>alert('Agent Record Created Successfully!');</script>";
    }
  }
}

if(isset($_GET["delid"]))
{
	$delid = $_GET['delid'];
    $que=mysqli_query($con,"select * from agent where agent_id ='$delid'");
    $rets=mysqli_fetch_array($que);
    if($rets > 0){

        $querys = mysqli_query($con,"DELETE FROM agent WHERE agent_id ='$delid'");
        if ($querys) {
          echo "<script>alert('Agent Record Deleted Successfully!');</script>";
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
			<h3>Add New Agent</h3>
      <div class="row">
        <div class="col-lg-12">
          <form class="form-horizontal" name="form1" method="post" action="">
            <div class="panel panel-default">
              <div class="panel-body">                                                                        
                <p align="center" style="color:#FF0000"><?=$_SESSION['msg1'];?><?=$_SESSION['msg1']="";?></p>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label">Agent FullName</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-user"></span></span>
                      <input type="text" name="agent_name" id="" value="" required class="form-control"/>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label">Email Address</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                      <input type="email" name="agent_email" id="" value="" required class="form-control"/>
                    </div>            
                  </div>
                </div>
                <div class="form-group">                                        
                  <label class="col-md-3 col-xs-12 control-label">Contact No</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                      <input type="text" name="agent_contact" id="" value="" required class="form-control"/>
                    </div>            
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Address</label>
                  <div class="col-md-6 col-xs-12">                                            
                    <textarea name="agent_address" required class="form-control" rows="5"></textarea>
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
			<h3>All Agents</h3>
      <div class="row">
        <div class="col-lg-12">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Email Address</th>
                  <th>Contact</th>
                  <th>Location</th>
                  <th>Date Registered</th>
                  <th>View Properties</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
          <?php
              $cnt = 1;
              $que=mysqli_query($con,"SELECT * from agent");
              while ($row=mysqli_fetch_array($que)) {
              ?>
              <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php echo $row['agent_name'];?></td>
                  <td><?php echo $row['agent_email'];?></td>
                  <td><?php echo $row['agent_contact'];?></td>
                  <td><?php echo $row['agent_address'];?></td>
                  <td><?php echo $row['dateRegistered'];?></td>
                  <td><a href="agentsProperty.php?agent_id=<?php echo $row['agent_id'];?>" ><i class="fa fa-eye"></i></a></td>
                  <td><a href="?delid=<?php echo $row['agent_id'];?>" onclick="return confirm('Are you sure you want to delete this Agent?');"><i class="fa fa-trash"></i></a></td>
              </tr>
              <?php
                  $cnt=$cnt+1;
              }
          ?>
          </tbody>
              <tfoot>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Contact</th>
                    <th>Location</th>
                    <th>Date Created</th>
                    <th>View Properties</th>
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