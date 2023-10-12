<?php
    $receiver = "";
    $subject = "naslov";
    $body = "alo";
    $sender = "From: dimitrijeradojkovic8@gmail.com";
    
    if(mail($receiver, $subject, $body, $sender)){
        echo 'mejl poslat na ' . $receiver;
    }
    else{
        echo 'ne radi';
    }
?>