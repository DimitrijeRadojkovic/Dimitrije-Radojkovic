<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $ime = $mobilni = $email = $p_email = $ime_greska = $mobilni_greska = $email_greska = $p_email_greska = $poruka ="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ime = $_POST["ime"];
            $mobilni = $_POST["mobilni"];
            $email = $_POST["email"];
            $p_email = $_POST["p_email"];

            if($ime == ""){
                $ime_greska = "Morate uneti ime i prezime!";
            }
            else{
                if(preg_match("/[A-Z][a-z]{1,} [A-Z][a-z]{1,}/", $ime) == 0){
                    $ime_greska = "Nepravilno uneto ime!";
                }
                else{
                    $ime_greska = "";
                }
            }

            if($mobilni != ""){
                if(preg_match("/[0-9]{3}\s[0-9]{3}\s[0-9]{3}/", $mobilni) == 0){
                    $mobilni_greska = "Nepravilno unet mobilni!";
                }
                else{
                    $mobilni_greska = "";
                }
            }

            if($email == ""){
                $email_greska = "Morate uneti email!";
            }
            else{
                if(preg_match("/[a-z]{1,}@[a-z]{2,}.[a-z]{3,}/", $email) == 0){
                    $email_greska = "Nepravilno uneti email!";
                }
                else{
                    $email_greska = "";
                }
            }

            if($p_email == ""){
                $p_email_greska = "Morate ponoviti email!";
            }
            else{
                if($p_email != $email){
                    $p_email_greska = "Emailovi nisu isti!";
                }
                else{
                    $p_email_greska = "";
                }
            }

            if($ime_greska == "" && $mobilni_greska == "" && $email_greska == "" && $p_email_greska == ""){
                $poruka = "Korisnik " . $ime . " je uspesno registrovan sa emailom " . $email;
            }
        } 
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1>Registrovanje na forum</h1><br>

        <label for="ime">Ime i prezime:</label>
        <input type="text" name="ime" value="<?php echo $ime; ?>">
        <p style="color: red;"><?php echo $ime_greska; ?></p><br>

        <label for="mobilni">Mobilni:</label>
        <input type="text" name="mobilni" value="<?php echo $mobilni; ?>">
        <p style="color: red;"><?php echo $mobilni_greska; ?></p><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <p style="color: red;"><?php echo $email_greska; ?></p><br>

        <label for="p_email">Ponovljeni email:</label>
        <input type="text" name="p_email" value="<?php echo $p_email; ?>">
        <p style="color: red;"><?php echo $p_email_greska; ?></p><br>

        <input type="submit" value="Registruj se">

    </form>

    <p><?php echo $poruka; ?></p>

</body>
</html>