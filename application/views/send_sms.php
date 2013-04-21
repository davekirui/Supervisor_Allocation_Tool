<?php
  $gatewayURL  =   'http://localhost:9333/ozeki?'; 
  $request = 'login=admin'; 
  $request .= '&password=abc123'; 
  $request .= '&action=sendMessage'; 
  $request .= '&messageType=SMS:TEXT'; 
  $request .= '&recepient='.urlencode('+254715684054'); 
  $request .= '&messageData='.urlencode("Try");

  $url =  $gatewayURL . $request;  

  //Open the URL to send the message 
   file($url); 
?>