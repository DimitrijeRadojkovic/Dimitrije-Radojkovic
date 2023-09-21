<?php
    $target_dir = "dokumenti/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 300000) {
      echo "Fajl je prevelik";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($FileType != "txt" && $FileType != "doc" && $FileType != "pdf") {
      echo "Samo .txt, .doc i .pdf su dozvoljeni!";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Greska";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Fajl ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " je uploadovan";
      } else {
        echo "Greska";
      }
    }
?>