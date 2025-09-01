<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <h1>Hatjutus4</h1>
  <h2>2.6juubel
    <form action="#" method="get">
    synniaasta <input type="number" name="synniaasta" required value="2000"><br>
    <input type="submit" value="Leia juubel">

    </form>
    <?php
    if(isset($_GET["synniaasta"])) {
        $vanus = 2025 - $_GET["synniaasta"];
        if ($vanus = 0) {
            echo "juubel: ";
        }else {
            echo "Pole juubel";
        }
    }
    ?>
  </h2>
  <form action="#" method="get">
    arv1 <input type="number" name="arv1" required><br>
    arv2 <input type="number" name="arv2" required><br>
    <input type="submit" value="jaga">
   </form>
<?php
if(isset($_GET["arv1"]) && isset($_GET["arv2"])){
    $arv1 = $_GET["arv1"];
    $arv2 = $_GET["arv2"];
    if ($arv2 = 0) {
        echo "nulliga ei saa jagada!";
    }else{
        echo $arv1 /  $arv2;
    }
}
?>
<h1>Harjutus3</h1>
    
<form action="#" method= "get">

a <input type="number" name="a" required><br>
b <input type="number" name="b" required><br>
h <input type="number" name="h" required><br>
<input type="submit" value="arvuta" class="btn btn-danger">
</form>
<?php
    $a = $_GET["a"];
    $b = $_GET["b"];
?>




<h1>Harjutus2</h1>
<?php


//tehted arvudega
    $a1 = 6;
    $a2 = 5;

    printf("%d + %d = %d <br>", $a1, $a2, $a1+$a2);
    printf("%d - %d = %d <br>", $a1, $a2, $a1-$a2);
    printf("%d * %d = %d <br>", $a1, $a2, $a1*$a2);
    printf("%d / %d = %d <br>", $a1, $a2, $a1/$a2);
    printf("%d jääk %d = %d <br>", $a1, $a2, $a1%$a2);

    //täisnurkne kolmnurk

    $a3 = 8;
    $p = $a1+$a2+$a3;
    $s = $a1*$a2/ 2;
    echo "Ümbermõõt: ".$p."<br>";
    echo "pindala: " .$s."<br>";


?>












    <h1>Harjutus1</h1>
    <?php
    // Rego Märk 01
    // 01.09.25

    $nimi = "Rego";
    $aasta  = 1980;
    $sodiac = "vahk";

    echo $nimi."<br>".$aasta."<br>".$sodiac;
    echo "<br>";
    echo '"it\'s My Life" - Dr.Alan';
    echo "<br>";
    echo "(\(\ <br>";
    echo "(-.-) <br>";
    echo "o_(\)(\) <br>";

    
    
    
    
    ?>

    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>