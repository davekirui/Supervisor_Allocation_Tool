<?php
$name=$_POST['name'];
$email=$_POST['email'];
$msg=$_POST['msg'];

$to = "marian@gmail.com";
$from = $email;
$headers = "From:" . $from;

mail($to,"",$msg,$headers);
echo "Mail Sent.";
?>

