<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proba";

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

    $sql = "CREATE TABLE tabela1 (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
      
      if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
      
    $conn->close();
?>