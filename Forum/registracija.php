<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        include "konekcija.php";
        $email = $emailgreska = $username = $usernamegreska = $password = $passwordgreska = $repeat_password = $repeat_passwordgreska = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $repeat_password = $_POST["repeat_password"];

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

            if(empty($username)){
                $usernamegreska = "Morate uneti korisnicko ime!";
            }
            else{
                $usernamegreska = "";
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

            if (empty($repeat_password)) {
                $repeat_passwordgreska = "Morate ponoviti lozinku!";
            } else {
                // Provera dužine, velikog slova i broja
                if ($repeat_password != $password) {
                    $repeat_passwordgreska = "Ponovljena lozinka i lozinka nisu iste!";
                } else {
                    $repeat_passwordgreska = "";
                }
            }

            if(empty($emailgreska) && empty($usernamegreska) && empty($passwordgreska) && empty($repeat_passwordgreska)){
                $date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO korisnici
                        VALUES('$email', '$username', '$password', '$date')";
                if($conn->query($sql) === TRUE){
                    echo "Uneto u bazu";
                }
                else{
                    echo "Greska pri unosu u bazu";
                }
            }
        } 
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <p><?php echo $emailgreska ?></p><br><br>

        <label for="username">Korisnicko ime:</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
        <p><?php echo $usernamegreska ?></p><br><br>

        <label for="password">Lozinka:</label>
        <input type="password" name="password" value="<?php echo $password; ?>">
        <p><?php echo $passwordgreska ?></p><br><br>

        <label for="repeat_password">Ponovljena lozinka:</label>
        <input type="password" name="repeat_password" value="<?php echo $repeat_password; ?>">
        <p><?php echo $repeat_passwordgreska ?></p><br><br>

        <input type="submit" value="Registruj se">
    </form>
</body>
</html>