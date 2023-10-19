<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
     }
     $p1_greska = $p2_greska = $p3_greska = $odgovori = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $br = 0;
            $arr = array();
            if(empty($_POST['p1'])){
                $p1_greska = "Morate izabrati pitanje 1";
            }
            else{
                if($_POST["p1"] == "Miksa"){
                    $br++;
                    $arr = array_push_assoc($arr, "1", 1);
                }
                else{
                    $arr = array_push_assoc($arr, "1", 0);
                }
                
            }
            if(empty($_POST['p2'])){
                $p2_greska = "Morate izabrati pitanje 2";
            }
            else{
                if($_POST["p2"] == "Dimi"){
                    $br++;
                    $arr = array_push_assoc($arr, "2", 1);
                }
                else{
                    $arr = array_push_assoc($arr, "2", 0);
                }
                
            }
            if(empty($_POST['p3'])){
                $p3_greska = "Morate izabrati pitanje 3";
            }
            else{
                if(in_array("Djole", $_POST["p3"]) && in_array("Jovan", $_POST["p3"])){
                    $br++;
                    $arr = array_push_assoc($arr, "3", 1);
                }
                else{
                    $arr = array_push_assoc($arr, "3", 0);
                }
                
            }
            $_SESSION["br"] = $br;
            $_SESSION["arr"] = $arr;
            if(empty($p1_greska) && empty($p2_greska) && empty($p3_greska)){
                 $odgovori = "<a href=rezultati.php>Odgovori</a>";
            }
        }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="p11">Ko nije podigo rucnu kad ga je zaustavio pandur</label><br>
        <?php global $p1_greska; echo $p1_greska; ?><br>
        <input type="radio" name="p1" id="p11" value="Dimi">
        <label for="p11">Dimi</label><br>

        <input type="radio" name="p1" id="p12" value="Djole">
        <label for="p12">Djole</label><br>

        <input type="radio" name="p1" id="p13" value="Miksa">
        <label for="p13">Miksa</label><br>

        <label for="p21">Ko je hteo da prevari miru pa zamalo dobio keca prvi cas</label><br>
        <?php global $p2_greska; echo $p2_greska; ?><br>
        <input type="radio" name="p2" id="p21" value="Dimi">
        <label for="p21">Dimi</label><br>

        <input type="radio" name="p2" id="p22" value="Jovan">
        <label for="p22">Jovan</label><br>

        <input type="radio" name="p2" id="p23" value="Mali">
        <label for="p23">Mali</label><br>

        <label for="p3">Ko je imao vise od 10 minusa kod verke</label><br>
        <?php global $p3_greska; echo $p3_greska; ?><br>
        <input type="checkbox" name="p3[]" id="p31" value="Djole">
        <label for="p31">Djole</label><br>

        <input type="checkbox" name="p3[]" id="p32" value="Jovan">
        <label for="p32">Jovan</label><br>

        <input type="checkbox" name="p3[]" id="p33" value="Mali">
        <label for="p33">Mali</label><br>

        <input type="submit" value="Posalji">
    </form>
    <p><?php echo $odgovori; ?></p>
</body>
</html>