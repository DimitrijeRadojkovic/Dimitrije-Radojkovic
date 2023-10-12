<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $filmErr = $vremeErr = "";
$name = $email = $film = $vreme = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Morate uneti Ime i prezime";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z]+[ ][a-zA-z]/", $name))
    $nameErr = "Niste pravilno uneli Ime i prezime";
  }

  if (empty($_POST["email"])) {
    $emailErr = "Morate uneti email";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $emailErr = "Niste pravilno uneli email";
  }
  $film = $_POST["film"];
  $vreme = $_POST["vreme"];
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Rezervacija bioskopske karte</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Ime: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Email: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Film:<span class="error">* <?php echo $filmErr;?></span><br>
  <input type="radio" name="film" value="Star Wars" />Star Wars<br>
  <input type="radio" name="film" value="Indiana Jones" />Indiana Jones<br>
  <input type="radio" name="film" value="Oppenheimer" />Oppenheimer
  <span class="error">* <?php echo $filmErr;?></span>
  <br><br>
  Termin: <span class="error">* <?php echo $vremeErr;?></span><br>
  <input type="radio" name="vreme" value="18:00" />18:00<br>
  <input type="radio" name="vreme" value="20:00" />20:00<br>
  <input type="radio" name="vreme" value="22:00" />22:00
  <br><br>
  <input type="submit" name="submit" value="Rezervisi">  
</form>

<?php
  if (isset($_POST['submit']) && empty($nameErr) && empty($colorErr) && empty($robotErr)){
    $receiver = $email;
    $subject = "Bioskop";
    $body = "Postovani " . $name . " rezervali ste kartu za film " . $film . " u " . $vreme . ".";
    $sender = "From: dimitrijeradojkovic8@gmail.com";
    
    if(mail($receiver, $subject, $body, $sender)){
        echo 'mejl poslat na ' . $receiver;
    }
    else{
        echo 'ne radi';
    }
  }
  
?>

</body>
</html>