<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
</head>
<body>

<?php
        include "konekcija.php";
        $email = $emailgreska = $password = $passwordgreska = $button = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST["email"];
            $password = $_POST["password"];

            if(empty($email)){
                $emailgreska = "Morate uneti email!";
            }
            else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailgreska = "Email nije validan!";
                }
                else{
                    $emailgreska = "";
                }
            }

            if (empty($password)) {
                $passwordgreska = "Morate uneti lozinku!";
            } else {
                // Provera dužine, velikog slova i broja
                if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
                    $passwordgreska = "Lozinka mora sadržati bar 8 karaktera, bar jedno veliko slovo i bar jedan broj!";
                } else {
                    $passwordgreska = "";
                }
            }

            if(empty($emailgreska) && empty($passwordgreska)){
                $sql = "SELECT * FROM korisnici WHERE email = '$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if(password_verify($password, $row["password"])){
                            $_SESSION["user"] = array(
                                "email" => $row["email"],
                                "username" => $row["username"],
                            );
                            header('Location:http://www.dimitrijeradojkovic.com/Forum/index.php');
                        }
                        else{
                            $passwordgreska = "Lozinka nije tacna!";
                        }
                    }
                  } else {
                    $button = "<a href=registracija.php>Registruj se</a>";
                    $passwordgreska = "Nalog sa ovim mejlom ne postoji";
                }
            }
        } 
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <p><?php echo $emailgreska ?></p><br><br>

        <label for="password">Lozinka:</label>
        <input type="password" name="password" value="<?php echo $password; ?>">
        <p><?php echo $passwordgreska ?></p><br><br>

        <input type="submit" value="Uloguj se">
        <?php echo $button; ?>
    </form>
</body>
</html>