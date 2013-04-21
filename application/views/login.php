<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Electronix Store</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
<style type="text/css">

body { padding:50px 100px; font:13px/150% Verdana, Tahoma, sans-serif; }

/* tutorial */

input, textarea,select { 
	padding: 9px;
	border: solid 1px #E5E5E5;
	outline: 0;
	font: normal 13px/100% Verdana, Tahoma, sans-serif;
	width: 220px;
	background: #FFFFFF url(../bg_form.png) left top repeat-x;
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
  <!-- end of main content -->
<div id="body">

            <div align="center" >	
		<?php
		echo form_open('xcoder_auth/xcoder_login');		
        ?>
		<fieldset style=" border-color:#617798; border-style:solid; border-radius:6px; width:600px" align="center" >
<legend style="color:#FFFFFF;font-weight:bold" align="left">Login with Student credentials</legend>
		<pre>	
Registration Number   : <input type="text" name="reg_no">  
Password              : <input type="password" name="password">  
		<x class="submit">
		          <input type="submit" value="login">
						  </x>
		</pre>
	</fieldset>	
		
				<?php echo form_error('user');	?>
		<?php echo form_error('password');	?>
		<?php echo form_close()?>
            </div>
  </div>   
   <div class="footer">
   

        <div class="left_footer"></div>
        
     <div class="center_footer">
        COM/0025/10 <br />
        <a href="http://csscreme.com/freecsstemplates/" title="free templates"></a><br />
     </div>
        
  </div>
</div>
<!-- end of main_container -->
</body>
</html>