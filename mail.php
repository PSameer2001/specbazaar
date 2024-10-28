<?php     
$to_email = 'prashantpandu2001@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: osamap4026@gmail.com';
mail($to_email,$subject,$message,$headers);
?>