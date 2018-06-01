<?php session_start();
ob_start();

if(!isset($_SESSION['patientuserid']))
{
    header("Location: index.php");
}

include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Video Chat</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar" style="min-height: 750px;">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo-txt" style="font-size:20px;">
                        <a href="dashboard.php" style="font-size:20px;background: chocolate;">VIDEO CHAT APP</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/no-image.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/no-image.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $_SESSION['patientusername']; ?></div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <!--
					<li class="active">
                        <a href="dashboard.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>  
					-->
                     <li class="">
					 <a href="dashboard.php"><span class="fa fa-stethoscope"></span>Appointments</a>
                     </li>    
					<li class="">
                        <a href="logout.php"><span class="fa fa-desktop"></span> <span class="xn-text">Logout</span></a>                        
                    </li>  					 
                    
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    
                    <!-- END SEARCH -->                    
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="logout.php"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            
                            <li><a href="logout.php"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    
                    
                    <!-- END LANG BAR -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
					
                   
                     <div class="row">                        
                        <div class="col-md-12">
						<?php
						$patient_id=$_SESSION['patientuserid'];
						$appointment_date=date('Y-m-d');
						$patient_appointment_sql="SELECT * FROM `doctor_appointment` AS da
						INNER JOIN `patient` AS pa ON da.patient_id=pa.patient_id 
						WHERE da.`patient_id`='$patient_id' AND da.`appointment_date`='$appointment_date'";
						$patient_appointment_exe=mysql_query($patient_appointment_sql);
						$patient_appointment_cnt=mysql_num_rows($patient_appointment_exe);
						?>
        
						<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Appointment Category</th>
				<th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		
		<?php
		if($patient_appointment_cnt>0)
		{
			while($patient_appointment_fet=mysql_fetch_array($patient_appointment_exe)) 
			{
		?>
			<tr>
                <td><?php echo $patient_appointment_fet['pid']; ?></td>
                <td><?php echo $patient_appointment_fet['name']; ?></td>
				<td><?php echo $patient_appointment_fet['appointment_category']; ?></td>
                <td><?php echo $patient_appointment_fet['appointment_date']; ?></td>
                <td><?php echo $patient_appointment_fet['appointment_time']; ?></td>
                <td><a href="onlinechat.php?room=<?php echo $patient_appointment_fet['pid']; ?>&<?php echo time(); ?>">ONLINE CHAT</a></td>
            </tr>
        <?php 
			}
		}
		else
		{
			
		}
		?>
		 </tbody>
       
    </table>
		                     
                            
                        </div>
                    </div>
                    
                     
					<?php /* ?>
                    <!-- START WIDGETS -->  
                    <div class="row">
                        <div class="col-md-3">
                            
                            <!-- START WIDGET SLIDER -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title">Treatment</div>                                                                        
                                        <div class="widget-subtitle">Countdown</div>
                                        <div class="widget-int">45 days</div>
                                    </div>
                                </div>                            
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>         
                            <!-- END WIDGET SLIDER -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onClick="location.href='pages-messages.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-envelope"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">48</div>
                                    <div class="widget-title">New messages</div>
                                    <div class="widget-subtitle">In your mailbox</div>
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title"></br>Know more from others on the treatment</div>                                                                        
                                       
                                        
                                    </div>
                                </div>                            
                                                            
                            </div>                                
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title"></br>share your experience with others</div>                                                                        
                                        
                                    </div>
                                </div>                            
                                                           
                            </div>                   
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
                    
                    
                     <div class="row">
                        <div class="col-md-8">
                            
                            <!-- START SALES BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Articles</h3>  
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                 <div class="panel-body list-group list-group-contacts scroll" style="height:326px;" >  
                                	<div class="list-group-item">   
                                        <h6>Lorem ipsum dolor</h6>
                                        <p>
                                           Should morcellation be allowed to continue, without patient consent, with the current known risks?
                                        </p>
                                        <div class="col-lg-10">
                                            <span class="text-muted"><i class="fa fa-clock-o"></i> 14:15 10/2/2015</span> <button type="button" class="btn btn-default btn-xs">Related Article</button>
                                         </div>
                                         <div class="col-lg-1">
                                            <button type="button" class="btn btn-warning btn-xs">View Article</button>
                                        </div><br/>
                                    </div>
                                    <div class="list-group-item">   
                                        <h6>Lorem ipsum dolor</h6>
                                        <p>
                                          Reduction of adhesions after uterine myomectomy by Seprafilm membrane (HAL-F): a blinded, prospective, randomized, multicenter clinical study. <br/>
                                        </p><br/>
                                        <div class="col-lg-10">
                                            <span class="text-muted"><i class="fa fa-clock-o"></i> 14:15 10/2/2015</span> <button type="button" class="btn btn-default btn-xs">Related Article</button>
                                         </div>
                                         <div class="col-lg-1">
                                            <button type="button" class="btn btn-warning btn-xs">View Article</button>
                                        </div><br/>
                                    </div>
									
                                    
									
                                </div>
                            </div>
                            <!-- END SALES BLOCK -->
                            
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START PROJECTS BLOCK -->
                            
                            
                            <!-- END PROJECTS BLOCK -->
                             <div class="panel panel-colorful">
                                <div class="panel-body">
                                    <h2>Quick Contact</h2>
                                    <p>Feel free to contact us for any issues you might have with our products.</p>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" placeholder="youremail@domain.com"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="email" class="form-control" placeholder="Message subject"/>
                                    </div>                                
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" placeholder="Your message" rows="3"></textarea>
                                    </div>                                
                                </div>
                                <div class="panel-footer"> 
                                    <button class="btn btn-success pull-right">Send</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    <!-- START DASHBOARD CHART -->
                                    
                    <!-- END DASHBOARD CHART -->
                    
					<?php */ ?>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>  
        
        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/rangeslider/jQAllRangeSliders-min.js"></script>       
        <script type="text/javascript" src="js/plugins/knob/jquery.knob.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/ion/ion.rangeSlider.min.js"></script>  
        <script type="text/javascript" src="js/demo_sliders.js"></script>             
        
        
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
				<link rel="stylesheet" type="text/css" id="theme" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		
		<script>
		$(document).ready(function() {
    $('#example').DataTable();
} );
		</script>
    <!-- END SCRIPTS -->         
    </body>
</html>






