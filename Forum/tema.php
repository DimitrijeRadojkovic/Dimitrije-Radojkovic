<?php
    session_start();
    include "konekcija.php";
    $id = $_GET["id"];
    $sql = "SELECT * FROM teme WHERE id='$id'";
    $res = $conn->query($sql);
    $tema;
    while($row = $res -> fetch_assoc()){
        $tema = $row;
    }
    $email = $tema["email_korisnika"];
    $sql2 = "SELECT username FROM korisnici WHERE email='$email'";
    $res2 = $conn->query($sql2);
    while($row = $res2 -> fetch_assoc()){
        $username = $row["username"];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tema["naziv"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function prikaziFormuZaIzmenu(id) {
            // Pronađi formu za izmenu komentara sa odgovarajućim ID-om
            var formaZaIzmenu = document.getElementById('formaIzmeni_' + id);
            // Prikazivanje forme za izmenu
            formaZaIzmenu.style.display = 'block';
        }
        function sakrijFormuZaIzmenu(id) {
            // Pronađi formu za izmenu komentara sa odgovarajućim ID-om
            var formaZaIzmenu = document.getElementById('formaIzmeni_' + id);
            // Prikazivanje forme za izmenu
            formaZaIzmenu.style.display = 'none';
        }
    </script>
</head>
<style>
    nav{
        width: 100%;
        height: 40px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    a{
        padding: 10px;
    }
</style>
<body>
    <nav class="bg-success">
        <a href="index.php" class="text-light">Pocetna</a>
        <?php
            if(!isset($_SESSION["user"]))
                echo "<a href=registracija.php class='text-light'>Registracija</a>";
            else{
                echo "<a href=kreirajtemu.php class='text-light'>Kreiraj temu</a>";
                echo "<a href=odjava.php class='text-light'>Odjavi se</a>";
                echo "<a href=profil.php class='text-light'>Profil</a>";
            }
        ?>
    </nav>
    <?php
        echo "<div class='d-flex flex-column align-items-start m-3 bg-success rounded text-light'>";
        echo "<h1>" . $tema["naziv"] . "</h1>";
        echo "<p style='font-size:15px'>" . $username . "<br>" . $tema["vreme_unosa"] . "</p>";
        echo "<p>" . $tema["opis"] . "</p>";
        echo "</div>";
        
        if(isset($_SESSION["user"])){
            echo "<div class='d-flex flex-column align-items-start m-3 bg-success rounded text-light'>";
            echo "<h1>Komentari:</h1>";
            echo "<form method='post' action='dodajkomentar.php'>";
            echo "<input type='text' class='d-none' name='id_teme' value='" . $id . "' ><br>";
            echo "<textarea name='opis' rows='4' cols='50'></textarea><br>";
            echo "<input type='submit' name='submit' value='Posalji'>";
            echo "</form></div>";
        }
        else{
            echo "<h2 class='text-center'>Prijavite se da biste ostavili komentar</h2>";
        }

        $sql = "SELECT * FROM komentari WHERE id_teme='$id'";
        $res = $conn->query($sql);
        while($row = $res -> fetch_assoc()){
            $email = $row["email_korisnika"];
            $sql3 = "SELECT username FROM korisnici WHERE email='$email'";
            $res3 = $conn->query($sql3);
            while($row3 = $res3 -> fetch_assoc()){
                $username = $row3["username"];
            }
            echo "<div class='bg-success m-3 text-white d-flex flex-column align-items-start rounded'>";
            echo "<p>" . $username . "</p>";
            echo "<p>" . $row["vreme_unosa"] . "</p>";
            echo "<p>" . $row["opis"] . "</p>";
            if(isset($_SESSION["user"])){
            if($row["email_korisnika"] == $_SESSION["user"]["email"]){
                echo "<button onclick='prikaziFormuZaIzmenu(" . $row["id"] . ")'>Izmeni</button>";

                echo "<div id='formaIzmeni_" . $row["id"] . "' style='display: none;'>";
                echo "<form  method='post' action='izmenikomentar.php'>";
                echo "<input type='text' class='d-none' name='id_komentara' value='" . $row["id"] . "' >";
                echo "<input type='text' class='d-none' name='id_teme' value='" . $id . "' >";
                echo "<textarea name='opis' rows='4' cols='50'>" . $row["opis"] . "</textarea><br>";
                echo "<input type='submit' name='submit' value='Potvrdi'>";
                echo "</form>";
                echo "<button onclick='sakrijFormuZaIzmenu(" . $row["id"] . ")'>Odustani</button>";
                echo "</div>";

                echo "<form method='post' action='izbrisikomentar.php'>";
                echo "<input type='text' class='d-none' name='id_komentara' value='" . $row["id"] . "' >";
                echo "<input type='text' class='d-none' name='id_teme' value='" . $id . "' >";
                echo "<input type='submit' name='submit' value='Izbrisi'>";
                echo "</form>";
            }
            }
            echo "</div>";
        }
    ?>
</body>
</html>