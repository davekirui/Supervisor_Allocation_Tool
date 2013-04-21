<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/tem.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Supervisors System</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>

<script type="text/javascript" src="Templates/jquery-ui-1.8.21.custom/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="Templates/jquery-ui-1.8.21.custom/js/jquery-ui-1.8.21.custom.min.js"></script>
<link href="Templates/jquery-ui-1.8.21.custom/css/cupertino/jquery-ui-1.8.21.custom.css" type="text/css" />
<link href="Templates/jquery-ui-1.8.21.custom/development-bundle/themes/cupertino/jquery.ui.all.css" type="text/css" rel="stylesheet"/>

<style type="text/css">

body { padding:50px 100px; font:13px/150% Verdana, Tahoma, sans-serif; }

/* tutorial */

input, textarea,select { 
	padding: 9px;
	border: solid 1px #E5E5E5;
	outline: 0;
	font: normal 13px/100% Verdana, Tahoma, sans-serif;
	width: 300px;
	background: #FFFFFF url(bg_form.png) left top repeat-x;
	background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #EEEEEE), to(#FFFFFF));
	background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE 1px, #FFFFFF 25px);
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	border-radius:3px;
	}

textarea { 
	width: 400px;
	max-width: 400px;
	height: 150px;
	line-height: 150%;
	}

input:hover, textarea:hover,
input:focus, textarea:focus { 
	border-color:#0099FF;
	-webkit-box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 8px;
	}

.form label { 
	margin-left: 10px; 
	color: #999999; 
	}

.submit input {
	width: auto;
	padding: 9px 15px;
	background: #617798;
	border: 0;
	font-size: 14px;
	color: #FFFFFF;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	}

</style>
</head>
<body>

<div id="main_container">
  <div id="main_content"> 
   
            <div id="menu_tab">
            <div class="left_menu_corner"></div>
                    <ul class="menu">
                         <li><a href="<?php echo site_url('')?>" class="nav1">  Home </a></li>
                         <li class="divider"></li>
                         <li><a href="<?php echo site_url('redirect/details')?>" class="nav2">Submit Application </a></li>
                         <li class="divider"></li>
                         <li><a href="<?php echo site_url('redirect/check_v')?>" class="nav3">Check  </a></li>
                         <li class="divider"></li>
                         <li><a href="<?php echo site_url('redirect/report_view')?>" class="nav6">Allocation</a></li>
                         <li class="divider"></li>
                         <li><a href="<?php echo site_url('redirect/graphing')?>" class="nav5">Graphing</a></li>
                         <li class="divider"></li>                         
                         <li><a href="<?php echo site_url('Supervisors/log')?>" class="nav4">Supervisors site </a></li>
                         <li class="divider"></li>
                         <li><a href="<?php echo site_url('redirect/admin_home')?>" class="nav4">Admin site </a></li>
                         <li class="divider"></li>
                    </ul>

             <div class="right_menu_corner"></div>
            </div><!-- end of menu tab -->
        
    
    
    <!-- end of left content --><!-- end of center content -->
    <!-- end of right content -->
  </div>
	<!-- end of main content -->
	<!-- InstanceBeginEditable name="EditRegion2" -->
	<div>
	<br />
  <?php
  	session_start();
	
	if($this->session->userdata('adm_logged')==true)
	{
	echo "Aministrator : ".$this->session->userdata('sur_name')?>
&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('Supervisors/logout') ?>">Logout</a>
<?php
	}
	else
	{
	redirect('Supervisors/log');
	}
	?>
	</div>
	<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="EditRegion1" -->
	<div>
	  <div>
        <?php
include "connect.php";
$sql=mysql_query("SELECT * FROM supervisors");
$sql1=mysql_query("SELECT * FROM projects");
echo form_open('Supervisors/timelines') ?>
        <fieldset style=" border-color:#617798; border-style:solid; border-radius:6px">
        <legend style="color:#617798; font-weight:bold">Set/Edit Project Timelines</legend>
          <pre>
	  	  
      <span>Academic year:</span>  	  
    <select name="acad_yr"> 
	                         <option>2012/2013</option>
	                         <option>2013/2014</option>
	                         <option>2014/2015</option>
	                         <option>2015/2016</option>
	                         <option>2016/2017</option>
	                         </select>
							 
    <span>Project Category     :</span>    	
    <select name="category">
	<?php while($row=mysql_fetch_array($sql1)) {?>  
	 <option><?php echo $row['name']?></option>
	 <?php }?>
	 </select>	 
	  <span>Opening date for proposals:</span>  	  
    <input type="date" name="start" required/>
	   <span>Closing date for proposals:</span>  	  
    <input type="date" name="end" required/>
	  </pre>
        </fieldset>
	    <p class="submit">
      <input name="submit" type="submit" value="Set Timelines" />
        </p>
	    <?php echo form_close();?> </div>
	</div>
	<!-- InstanceEndEditable -->
	
        
      <p class="footer" style="text-align:right">&copy; DAVID KIRUI COM/0025/10    : Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        
  </div>
</div>
<!-- end of main_container -->
</body>
<!-- InstanceEnd --></html>