<?php 

$to=7411033926;
$url="http://bsms.promosindia.com/api/v3/index.php?method=sms&api_key=A3377c69e7caf6354ee229c0fe5858fd0&to=$to&sender=PROMOS&message=WELCOME TO PROMOS INDIA";
//$lines=file_get_contents($get);
echo get_content($url);
function get_content($URL){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $URL);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
}


