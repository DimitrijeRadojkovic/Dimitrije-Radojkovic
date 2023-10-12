<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija</title>
</head>
<body>
    <?php
        $ime = $email = $broj = $reci = $poruka = $film = $termin = $ime_greska = $email_greska = $broj_greska = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ime = $_POST["ime"];
            $email = $_POST["email"];
            $broj = $_POST["broj"];
            $film = $_POST["film"];
            $termin = $_POST["termin"];

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
                $poruka = "Izvrsena je rezervacija na ime " . $ime . ", za film " . $film . " u terminu " . $termin . ". Broj sedista je " . $broj;
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

        <label for="film">Film:</label>
        <input type="radio" name="film" value="Film 1"><label for="film">Film 1:</label><br>
        <input type="radio" name="film" value="Film 2"><label for="film">Film 2:</label><br>
        <input type="radio" name="film" value="Film 3"><label for="film">Film 3:</label><br><br>

        <label for="termin">Termin:</label>
        <input type="radio" name="termin" value="18:00"><label for="termin">18:00</label><br>
        <input type="radio" name="termin" value="20:00"><label for="film">20:00</label><br>
        <input type="radio" name="termin" value="22:00"><label for="film">22:00</label><br><br>

        <label for="broj">Broj sedista:</label>
        <input type="text" name="broj" value="<?php echo $broj; ?>">
        <p><?php echo $broj_greska; ?></p><br><br>

        <input type="submit" value="Rezervisi">
    </form><br><br>
    <p><?php echo $poruka; ?></p><br><br>
</body>
</html>