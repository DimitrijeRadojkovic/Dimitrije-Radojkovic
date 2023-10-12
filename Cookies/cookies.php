<?php
    setcookie("kolacic", "Dimitrije Radojkovic", time() + 3600);
    if(isset($_COOKIE["kolacic"])){
        echo "Zdravo " . $_COOKIE["kolacic"] . "!";
    }
    else{
        echo "Dobro dosao na nas sajt.";
    }
?>