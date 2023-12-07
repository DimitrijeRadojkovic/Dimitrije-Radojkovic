<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Postovani <?php echo $_SESSION["Ime"] ?>, kupili ste kartu za pozoriste.<br>Broj sedista je <?php echo $_SESSION["Broj"] ?> </p>
<?php
    $Ime =  $_SESSION['Ime'];
    $Broj =  $_SESSION['Broj'];
    $receiver = $_SESSION["Email"];
    $subject = "Karta";
    $body = "Postovani " .$Ime .", kupili ste kartu za pozoriste.<br>Broj sedista je ".$Broj;
    $sender = "dukamitic10@gmail.com";
    
    if(mail($receiver, $subject, $body, $sender)){
        echo 'Mejl poslat na '.$receiver;
    }
    else{
        echo 'Greska';
    }
?>
</body>
</html>