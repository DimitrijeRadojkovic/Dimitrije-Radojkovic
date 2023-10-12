<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $ime = $broj = $poruka = $poruka1 = $poruka2 = $ime_greska = $broj_greska = "";
        define("crvena", "red");
        define("plava", "blue");
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ime = $_POST["ime"];
            $broj = $_POST["broj"];

            if(empty($ime)){
                $ime_greska = "Morate uneti ime!";
            }
            else{
                if(preg_match("/^[A-Z][a-z]{1,} [A-Z][a-z]{1,}$/", $ime) == 0){
                    $ime_greska = "Nepravilno uneto ime!";
                }
                else{
                    $ime_greska = "";
                }
            }

            if($broj == ""){
                $broj_greska = "Morate uneti broj!";
            }
            else{
                //provera da li vrednost sadrzi samo cifre i da li je veca od 0
                if(preg_match("/^\d{1,}$/", $broj) == 0 || (int)$broj <= 0){
                    $broj_greska = "Vrednost moze sadrzati samo cifre i broj mora biti veci od 0!";
                }
                else{
                    $broj_greska = "";
                }
            }

            if(empty($ime_greska) && empty($broj_greska)){
                $poruka = "Poštovani " . $ime . ", uneli ste broj " . $broj . " dana " . date("j. F Y. - l") . ".";

                $deljivi_sa_5 = array();
                $deljivi_sa_3 = array();

                for($i = 1; $i <= $broj; $i++){
                    if($i % 5 == 0){
                        array_push($deljivi_sa_5, $i);
                    }
                }
                //ispisivanje brojeva deljivih sa 5
                for($i = 0; $i < count($deljivi_sa_5); $i++){
                    if($i == count($deljivi_sa_5) - 1){
                        $poruka1 .= "<span style=color:" .  crvena . ">" . $deljivi_sa_5[$i] . "</span>";
                    }
                    else{
                        $poruka1 .= "<span style=color:" .  crvena . ">" . $deljivi_sa_5[$i] . "</span>, ";
                    }
                }
                $poruka1 = "Brojevi deljivi sa 5 su: " . $poruka1 . ".";

                for($i = 1; $i <= $broj; $i++){
                    if($i % 3 == 0){
                        array_push($deljivi_sa_3, $i);
                    }
                }
                //ispisivanje brojeva deljivih sa 3
                for($i = 0; $i < count($deljivi_sa_3); $i++){
                    if($i == count($deljivi_sa_3) - 1){
                        $poruka2 .= "<span style=color:" .  plava . ">" . $deljivi_sa_3[$i] . "</span>";
                    }
                    else{
                        $poruka2 .= "<span style=color:" .  plava . ">" . $deljivi_sa_3[$i] . "</span>, ";
                    }
                }
                $poruka2 = "Brojevi deljivi sa 3 su: " . $poruka2 . ".";
            }
        } 
    ?>
    <h1>Brojevi i boje</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="ime">Vase ime:</label>
        <input type="text" name="ime" value="<?php echo $ime; ?>">
        <p style="color:red; display:inline;"><?php echo $ime_greska; ?></p><br><br>

        <label for="broj">Unesite broj:</label>
        <input type="text" name="broj" value="<?php echo $broj; ?>">
        <p style="color:red; display:inline;"><?php echo $broj_greska; ?></p><br><br>

        <input type="submit" value="Posalji">
    </form>
    <p><?php echo $poruka; ?></p><br>
    <p><?php echo $poruka1; ?></p><br>
    <p><?php echo $poruka2; ?></p><br>
</body>
</html>