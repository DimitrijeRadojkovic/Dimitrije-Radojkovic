<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bioskop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    else{
      echo "Uspesno povezano<br><br>";
    }

    /*$sql = "CREATE DATABASE proba";
    if ($conn->query($sql) === TRUE) {
      echo "Baza uspesno napravljena<br><br>";
    } else {
      echo "Greska prilikom kreiranja: " . $conn->error . "<br><br>";
    }*/

    /*$sql = "CREATE TABLE rezervacije (
      email VARCHAR(50) NOT NULL PRIMARY KEY,
      name VARCHAR(30) NOT NULL,
      film VARCHAR(50) NOT NULL,
      vreme VARCHAR(10) NOT NULL
      )";
      
      if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
      */
?>