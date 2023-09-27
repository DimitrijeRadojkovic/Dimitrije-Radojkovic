<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija</title>
</head>
<body>
    <?php
        $ime = $email = $broj = $reci = $poruka = $ime_greska = $email_greska = $broj_greska = "";
        $recenica = "Sada pocinjemo da ucimo PHP skriptni serverski jezik.";
        $reci = count(explode(" ", $recenica));
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ime = $_POST["ime"];
            $email = $_POST["email"];
            $broj = $_POST["broj"];

            if(empty($ime)){
                $ime_greska = "Morate uneti ime!";
            }
            else{
                if(preg_match("/[A-Z][a-z]{1,} [A-Z][a-z]{1,}/", $ime) == 0){
                    $ime_greska = "Nepravilno uneto ime!";
                }
                else{
                    $ime_greska = "";
                }
            }

            if(empty($email)){
                $email_greska = "Morate uneti email!";
            }
            else{
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_greska = "Nepravilan email!";
                }
                else{
                    $email_greska = "";
                }
            }

            if(empty($broj)){
                $broj_greska = "Morate uneti broj sedista!";
            }
            else{
                if(preg_match("/^\d{1,2}$/", $broj) == 0 || (int)$broj < 1 || (int)$broj > 78){
                    $broj_greska = "Morate uneti broj izmedju 1 i 78!";
                }
                else{
                    $broj_greska = "";
                }
            }

            if(empty($ime_greska) && empty($email_greska) && empty($broj_greska)){
                $poruka = "Postovani " . $ime . " uspesno ste rezervisali ulaznicu za bioskop. Ulaznica ce stici na Vas email: " . $email . ". Datum i vreme rezervacije: " . date("d.m.Y.") . " - " . date("H:i");
            }
        }
    ?>

    <h1>Rezervacija bioskopske ulaznice</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="ime">Ime:</label>
        <input type="text" name="ime" value="<?php echo $ime; ?>">
        <p><?php echo $ime_greska; ?></p><br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <p><?php echo $email_greska; ?></p><br><br>

        <label for="broj">Broj sedista:</label>
        <input type="text" name="broj" value="<?php echo $broj; ?>">
        <p><?php echo $broj_greska; ?></p><br><br>

        <input type="submit" value="Registruj se">
    </form><br><br>
    <p><?php echo $poruka; ?></p><br><br>
    <p><?php echo "Recenica ima " . $reci . " reci."; ?></p>
</body>
</html>