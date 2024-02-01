<?php
    session_start();
    include "konekcija.php";
    
    if (isset($_POST['delete_topic'])) {
        $poruka = "";
        $email = $_SESSION['user']['email'];
        $vreme_unosa = $_POST['vreme_unosa'];

        $sql = "DELETE FROM teme WHERE email_korisnika = '$email' AND vreme_unosa = '$vreme_unosa'";
        if ($conn->query($sql) === TRUE) {
            $poruka = "Tema uspesno izbrisana";
        } else {
            $poruka = "Greska prilikom brisanja " . $conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["user"]["username"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
            include "konekcija.php";
            if(!isset($_SESSION["user"]))
                echo "<a href=registracija.php class='text-light'>Registracija</a>";
            else{
                echo "<a href=kreirajtemu.php class='text-light'>Kreiraj temu</a>";
                echo "<a href=odjava.php class='text-light'>Odjavi se</a>";
                echo "<a href=profil.php class='text-light'>Profil</a>";
            }
        ?>
    </nav>
    <h1>Vase teme:</h1>
    <?php
        $poruka = "";
        $email = $_SESSION['user']['email'];
        $sql = "SELECT * FROM teme WHERE email_korisnika = '$email'";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<div class='d-flex flex-column align-items-start m-3 bg-success rounded text-light'>";
                echo "<h1>" . $row["naziv"] . "</h1>";
                echo "<p style='font-size:15px'>" . $_SESSION["user"]["username"] . "<br>" . $row["vreme_unosa"] . "</p>";
                echo "<p>" . $row["opis"] . "</p>";
                echo "<form method='post' action=''>
                        <input type='hidden' name='vreme_unosa' value='" . $row["vreme_unosa"] . "'>
                        <input type='submit' name='delete_topic' value='Obrisi temu'>
                      </form>";
                echo "<button><a href=tema.php?id=" . $row["id"] . ">Otvori temu</a></button>";
                echo "</div>";
            }
        }
        else{
            $poruka = "Niste kreirali nijednu temu";
        }
        echo $poruka; 
    ?>
</body>
</html>
