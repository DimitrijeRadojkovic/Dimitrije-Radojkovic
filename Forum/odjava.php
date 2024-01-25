<?php
    session_start();
    session_destroy();
    header('Location:http://www.dimitrijeradojkovic.com/Forum/index.php');
?>