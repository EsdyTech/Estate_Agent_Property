<?php 
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
?>
<!DOCTYPE html>
<html>
<?php include("includes/head.php"); ?>
<body class="">
<?php include("header.php");?>
<div class="page-container row"> 
  
      <?php include("leftbar.php");?>
    
      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
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
    <div class="content sm-gutter">
      <div class="page-title">
	  <h3>Agent Dashboard</h3>	
      </div>
	   <!-- BEGIN DASHBOARD TILES -->
	  <div class="row">	 
		<!-- <div class="col-md-3 col-vlg-3 col-sm-6">
			<div class="tiles green m-b-10">
              <div class="tiles-body">
			  <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black"> Agent </div>
			         <div class="widget-stats">
                      <div class="wrapper transparent"> 
                      <?php 
					  	$ov=mysqli_query($con,"select * from agent");
					 	 $num=mysqli_num_rows($ov);
					  ?>
						<span class="item-title">All Agents</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $num;?>" data-animation-duration="700">0</span>
					  </div>
                    </div>
                    <div class="widget-stats ">
                      <div class="wrapper last"> 
                        <?php
							$dateReg=date('Y-m-d');
							$tv1=mysqli_query($con,"select * from agent where dateRegistered='$dateReg'");
							$num11=mysqli_num_rows($tv1);
					  	?>
						<span class="item-title">Registered Today</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $num11;?>" data-animation-duration="700">0</span>
					 </div>
                    </div>
			  </div>			
			</div>	
	
		</div> -->
		<div class="col-md-3 col-vlg-3 col-sm-6">
			<div class="tiles blue m-b-10">
              <div class="tiles-body">
			  <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">Property Type</div>
			         <div class="widget-stats">
                      <div class="wrapper transparent">
                      <?php $rt=mysqli_query($con,"select * from property_type");
					 	 $rw=mysqli_num_rows($rt);?> 
						<span class="item-title">Registered Properties  Type</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $rw;?>" data-     animation-duration="700">0</span>
					  </div>
                    </div>
                    <div class="widget-stats ">
                      <div class="wrapper last"> 
                      <?php 
					  $dateReg=date('Y-m-d');
					  $rt1=mysqli_query($con,"select * from property_type where dateCreated='$dateReg'");
					  $rw1=mysqli_num_rows($rt1);?>
						<span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $rw1;?>" data-animation-duration="700">0</span> 
					 </div>
                    </div>
			  </div>			
			</div>	
		</div>
		
   	<div class="row">	 
		<div class="col-md-6 col-vlg-3 col-sm-6">
			<div class="tiles red m-b-10">
              <div class="tiles-body">
			  <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">Properties </div>
			         <div class="widget-stats">
                      <div class="wrapper transparent"> 
                      <?php 
					  	$vt=mysqli_query($con,"select * from properties");
					  	$ovt=mysqli_num_rows($vt);
					  ?>
						<span class="item-title">All Properties</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $ovt;?>" data-animation-duration="700">0</span>
					  </div>
                    </div>
					<div class="widget-stats ">
                      <div class="wrapper last"> 
                        <?php					  
							$dateReg=date('Y-m-d');
							$otv=mysqli_query($con,"select * from properties where dateCreated='$dateReg'");
							$otv1=mysqli_num_rows($otv);
						?>
						<span class="item-title">Todays Registered Properties</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $otv1;?>" data-animation-duration="700">0</span> <?php?>
					 </div>
                    </div>
                    <div class="widget-stats ">
                      <div class="wrapper last"> 
                        <?php					  
							$otv=mysqli_query($con,"select * from properties where availablility=0");
							$otv1=mysqli_num_rows($otv);
						?>
						<span class="item-title">Available Properties</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $otv1;?>" data-animation-duration="700">0</span> <?php?>
					 </div>
                    </div>

					<div class="widget-stats ">
                      <div class="wrapper last"> 
                        <?php					  
							$otv=mysqli_query($con,"select * from properties where availablility=1");
							$otv1=mysqli_num_rows($otv);
						?>
						<span class="item-title">UnAvailable Properties</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $otv1;?>" data-animation-duration="700">0</span> <?php?>
					 </div>
                    </div>
			  </div>			
			</div>	
		</div>
        </div>     
	 </div>
	  <!-- END DASHBOARD TILES -->
           <!-- START DASHBOARD CHART -->



                    <div class="col-lg-12" style="min-height:280px;">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <!-- <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> All User Visit </h3> -->
								
								<script type="text/javascript">
								var visitorsCount = [];
								var myCat =[];
								</script>
								<?php
								$totaldays = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")); 
								
								$month_array=array();
								for($i=1; $i<=$totaldays; $i++)
								{
									if(!array_key_exists($i,$month_array))
									{
										$key = '';
										if($i<10)
										{
											$key = '0'.$i;
											$month_array[$key] = 0;
										}
										else
										{
											$month_array[$i] = 0;
										}
										?>
										<script type="text/javascript">
										var myKey = "Day " + '<?php echo $i; ?>';
										
										myCat.push(myKey);
										</script>
										<?php
										
									}
									
									
								}
								//print_r($month_array);
								
									?>
									<script type="text/javascript">
									visitorsCount.push(<?php echo $value;?>);
									</script>
									<?php									
									
									?>
									
								
										
							
								<script type="text/javascript">
								var d = new Date();
								var month = new Array();
								month[0] = "January";
								month[1] = "February";
								month[2] = "March";
								month[3] = "April";
								month[4] = "May";
								month[5] = "June";
								month[6] = "July";
								month[7] = "August";
								month[8] = "September";
								month[9] = "October";
								month[10] = "November";
								month[11] = "December";
								var n = month[d.getMonth()];
								$(function () {
								$('#container').highcharts({
									title: {
										text: 'Daily Visitors Chart of ' + n,
										x: -20 //center
									},
									subtitle: {
										text: '',
										x: -20
									},
									xAxis: {
										categories: myCat
									},
									yAxis: {
										min:0,
										title: {
											text: 'Visitors Count'
										},
										plotLines: [{
											value: 0,
											width: 1,
											color: '#808080'
										}]
									},
									tooltip: {
										valueSuffix: ' Users'
									},
									legend: {
										layout: 'vertical',
										align: 'right',
										verticalAlign: 'middle',
										borderWidth: 0
									},
									series: [{
										name: 'visitorsCount',
										data: visitorsCount
									}]
								});
							});
								</script>
								<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
								
                            </div>
                            <div class="panel-body">
                                <div id="morris-line-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
             
                    <!-- END DASHBOARD CHART --> 
			
               
          
		  </div></div>
<!-- BEGIN CHAT --> 
	  
</div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
<script src="assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
<script src="assets/plugins/skycons/skycons.js"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="assets/plugins/jquery-gmap/gmaps.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/mapplic/mapplic.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript" ></script>
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script>
<script src="assets/js/demo.js" type="text/javascript"></script>
<script src="assets/js/dashboard_v2.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/highcharts.js"></script>
	<script type="text/javascript" src="js/exporting.js"></script>	
<script type="text/javascript">
        $(document).ready(function () {
            $(".live-tile,.flip-list").liveTile();
        });
</script>
</body>
</html>
