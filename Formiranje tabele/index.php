<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr, td{
            width: 50px;
            height: 50px;
            
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="br_r" placeholder="Broj redova"><br>
        <input type="text" name="br_k" placeholder="Broj kolona"><br>
        <input type="submit" value="Napravi">
    </form>
    <table>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $br_r = $_POST['br_r'];
            $br_k = $_POST['br_k'];
            
            for($i = 0; $i < $br_r; $i++){
                if($i % 2 != 0){
                    echo "<tr class='neparni'>";
                }
                else{
                    echo "<tr style='background-color: gray;'>";
                }
                for($j = 0; $j < $br_k; $j++){
                    echo "<td>" . $j . "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>