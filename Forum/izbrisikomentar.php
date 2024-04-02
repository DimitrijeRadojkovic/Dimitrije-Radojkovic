<?php
    include "konekcija.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["id_komentara"];
        $id_teme = $_POST["id_teme"];
        $sql = "DELETE FROM komentari WHERE id='$id'";
        if($conn -> query($sql) === TRUE){
            header('Location:http://www.dimitrijeradojkovic.com/Forum/tema.php?id=' . $id_teme);
        }
        else{
            echo "Greska pri unosu u bazu";
        }
    }
?>