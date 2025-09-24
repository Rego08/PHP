<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Iseseisevtöö</h1>

    <form action="" method="post">
    <input type="text" name="url" placeholder="Sisesta veebiaadress">
    <input type="submit" value="Ava">
</form>

<?php
if (isset($_POST['url'])) {
    $url = $_POST['url'];
    echo "<script>window.open('$url');</script>";
}
?>
<H2>Proovi seda:   https://metshein.com/courses/php-alused/lessons/php-sissejuhatus/</H2>
<h1>_____________________________</h1>
<br>
<?php
$initialAmount = 2000;
$interestRate = 0.02;
$years = 5;

$finalAmount = $initialAmount * pow((1 + $interestRate), $years);
echo "Intressiga: " . round($finalAmount, 2) . " €";
?>
<h1>_____________________________</h1>
<br>
<?php
for ($i = 0; $i < 100; $i++) {
    echo "* ";
    if (($i + 1) % 10 == 0) {
        echo "<br>";
    }
}
?>
<h1>_____________________________</h1>
<br>
<?php
$athletes = ["Jüri" => 11.5, "Mari" => 10.7, "Kati" => 9.5, "Mati" => 11.7, "Juuli" => 10.2, "Maali" => 9.4];
asort($athletes); // Sorteerime ajad kasvavas järjekorras

echo "Esikolmik:<br>";
$counter = 1;
foreach ($athletes as $name => $time) {
    if ($counter > 3) break;
    echo "$counter. $name - $time s<br>";
    $counter++;
}
?>
<h1>_____________________________</h1>

</body>
</html>