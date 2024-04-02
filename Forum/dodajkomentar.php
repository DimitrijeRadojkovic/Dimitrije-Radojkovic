<?php
    session_start();
    include "konekcija.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $opis = $opisgreska = "";
        $opis = $_POST["opis"];
        $id = $_POST["id_teme"];
        if(empty($opis)){
            $opisgreska = "Morate napisati nesto";
        }
        else{
            $opisgreska = "";
        }
        if(empty($opisgreska)){
            $date = date("Y-m-d H:i:s");
            $email_korisnika = $_SESSION["user"]["email"];
            $sql = "INSERT INTO komentari(opis, vreme_unosa, email_korisnika, id_teme) VALUES('$opis', '$date', '$email_korisnika', '$id')";
            if($conn->query($sql) === TRUE){
                header('Location:http://www.dimitrijeradojkovic.com/Forum/tema.php?id=' . $id);   
            }
            else{
                echo "Greska pri unosu u bazu";
            }
        }
    }
?>