<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 <base href="<?php echo base_url(); ?>" />
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>
</head>
<body>
<div>
<base href="<?php echo base_url(); ?>" /> 
  <?php echo $output; 
  ?></div>
</body>
</html>
 