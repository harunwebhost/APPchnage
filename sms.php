<?php 
$to=7411033926;
$msg=urlencode("WELCOME ToO PROMOS INDIA");
$url="http://bsms.promosindia.com/api/v3/index.php?method=sms&api_key=A3377c69e7caf6354ee229c0fe5858fd0&to=$to&sender=PROMOS&message=$msg";
file_get_contents($url);



