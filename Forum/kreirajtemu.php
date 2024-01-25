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
        $opis = $naziv = $opisgreska = $nazivgreska = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include "konekcija.php";
            $naziv = $_POST["naziv"];
            $opis = $_POST["opis"];
            if(empty($naziv)){
                $nazivgreska = "Morate uneti naziv!";
            }
            else{
                $nazivgreska = "";
            }
            
            if(empty($opis)){
                $opisgreska = "Morate uneti opis!";
            }
            else{
                $opisgreska = "";
            }

            if(empty($opisgreska) && empty($nazivgreska)){
                $date = date("Y-m-d H:i:s");
                $email_korisnika = $_SESSION['user']['email'];
                $sql = "INSERT INTO teme(naziv, opis, vreme_unosa, email_korisnika) VALUES('$naziv', '$opis', '$date', '$email_korisnika')";
                if($conn -> query($sql) === TRUE){
                    echo "Uneto u bazu";
                    header('Location:http://www.dimitrijeradojkovic.com/Forum/index.php');
                }
                else{
                    echo "Greska pri unosu u bazu";
                }
            }
        } 
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="naziv">Naziv:</label>
        <input type="text" name="naziv" value="<?php echo $naziv; ?>">
        <p><?php echo $nazivgreska ?></p><br><br>

        <label for="opis">Opis:</label>
        <textarea name="opis" value="<?php echo $opis; ?>"></textarea>
        <p><?php echo $opisgreska ?></p><br><br>

        <input type="submit" value="Kreiraj temu">
    </form>
</body>
</html>