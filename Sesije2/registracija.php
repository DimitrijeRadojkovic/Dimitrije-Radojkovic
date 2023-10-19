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
    <?php
        $ime = $email = $p_email = $ime_greska = $poruka = $email_greska = $p_email_greska = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ime = $_POST["ime"];
            $email = $_POST["email"];
            $p_email = $_POST["p_email"];

            if(empty($ime)){
                $ime_greska = "Morate uneti ime";
            }
            else{
                if(preg_match("/^[A-Z][a-z]{1,} [A-z][a-z]{1,}$/", $ime) == 0){
                    $ime_greska = "Nepravilno uneto ime";
                }
                else{
                    $ime_greska = "";
                }
            }

            if(empty($email)){
                $email_greska = "Morate uneti email";
            }
            else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $email_greska = "Nepravilno unet email";
                }
                else{
                    $email_greska = "";
                }
            }

            if(empty($p_email)){
                $p_email_greska = "Morate ponoviti email";
            }
            else{
                if($email != $p_email){
                    $p_email_greska = "Ponovljeni email nije isti";
                }
                else{
                    $p_email_greska = "";
                }
            }

            if(empty($ime_greska) && empty($email_greska) && empty($p_email_greska)){
                $_SESSION["ime"] = $ime;
                $poruka = "Podaci o registraciji stici ce vam na mejl " . $email . ".<br><br><a href=registracijaSesija.php>Pocetna</a>";
            }
        } 
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="ime">Ime:</label>
        <input type="text" name="ime" value="<?php echo $ime; ?>">
        <p><?php echo $ime_greska; ?></p><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <p><?php echo $email_greska; ?></p><br>

        <label for="p_email">Ponovljeni email:</label>
        <input type="text" name="p_email" value="<?php echo $p_email; ?>">
        <p><?php echo $p_email_greska; ?></p><br>

        <input type="submit" value="Registruj se">
    </form>
    <p><?php echo $poruka; ?></p>
</body>
</html>