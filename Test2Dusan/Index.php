<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kupovina ulaznice test</title>
</head>
<body>
<?php
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $Ime = $Email = $Broj = $Poruka = "";
      $PrvoPolje = "";
      $DrugoPolje = "";
      $TrecePolje = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $Ime = test_input($_POST["Ime"]);
      $Email = test_input($_POST["Email"]);
      $Broj = test_input($_POST["Broj"]);
      }
      

      if (empty($_POST["Ime"])){
        $PrvoPolje = "Ime je obavezno polje";
      }
      else if (!(preg_match("/^[A-Za-z]*$/", $Ime))){
        $PrvoPolje = "Ime moze da sadrzi samo slova";
      }


      if (empty($_POST["Email"])) {
        $DrugoPolje = "Email adresa je obavezno polje"; 
      } else if (!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $Email))) {
        $DrugoPolje = "Email adresa nije pravilno uneta";
      }

      if (empty($_POST["Broj"])) {
        $TrecePolje = "Broj sedista je obavezno polje";
      }else if(($_POST["Broj"])>78){
        $TrecePolje = "Morate uneti broj od 1 do 78";
      }else if(($_POST["Broj"])<1){
        $TrecePolje = "Morate uneti broj od 1 do 78";
      }
      
      if(empty($PrvoPolje) && empty($DrugoPolje) && empty($TrecePolje)){
        $_SESSION["Ime"] = $Ime;
        $_SESSION["Broj"] = $Broj;
        $_SESSION["Email"] = $Email;
        $Poruka = "<a href='ulaznica.php'>Prosledi ulaznicu</a>";
    }
    ?>
    <h1>Kupovina ulaznice za pozoriste</h1>
    <form action = <?php echo $_SERVER['PHP_SELF'];?> method="post">
        Ime <input type="text" name="Ime"> <span><?php echo $PrvoPolje;?></span> <br><br>
        Email: <input type="text" name="Email"> <span><?php echo $DrugoPolje;?></span> <br><br>
        Broj sedista <input type="text" name="Broj"> <span><?php echo $TrecePolje;?></span> <br><br>
        <input type="submit" value="Potvrdi"><br><br>  
    </form>
    <p><?php echo $Poruka;?></p>
</body>
</html>