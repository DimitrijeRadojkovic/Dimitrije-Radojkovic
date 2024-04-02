<?php
    include "konekcija.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["id_komentara"];
        $id_teme = $_POST["id_teme"];
        $opis = $_POST["opis"];
        $opis_greska = "";
        if(empty($opis)){
            $opis_greska = "Morate napisati nesto";
        }
        else{
            $opis_greska = "";
        }
        if(empty($opis_greska)){
            $sql = "UPDATE komentari SET opis='$opis' WHERE id='$id'";
            if($conn -> query($sql) === TRUE){
                header('Location:http://www.dimitrijeradojkovic.com/Forum/tema.php?id=' . $id_teme);
            }
            else{
                echo "Greska pri unosu u bazu";
            }
        }
    }
?>