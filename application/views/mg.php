<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<script type="text/javascript" src="jquery-ui-1.8.21.custom/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.21.custom/js/jquery-ui-1.8.21.custom.min.js"></script>
<link href="jquery-ui-1.8.21.custom/css/cupertino/jquery-ui-1.8.21.custom.css" type="text/css" />
<link href="jquery-ui-1.8.21.custom/development-bundle/themes/cupertino/jquery.ui.all.css" type="text/css" rel="stylesheet"/>

</head>

<body>
<?php


echo "
<script>
  $(function() {
    $( '#dialog' ).dialog({ 
        width: 460,
        hide: 'slide',
        position: 'center',
        show: 'slide',
        close: function(event, ui) { location.href = '".$p."' }
    });
  });
  </script>";
  ?>

<div id="dialog" title="Basic dialog">
  <p><?php echo $m?></p>
</div>
</body>
</html>
