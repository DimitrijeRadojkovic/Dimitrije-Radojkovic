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
    $sql = "SELECT username FROM korisnici WHERE email='$email'";
    $res = $conn->query($sql);
    while($row = $res -> fetch_assoc()){
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
    ?>
</body>
</html>