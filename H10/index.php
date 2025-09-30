<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>PHP10</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include('pais.php'); ?>
    <?php
        if (!empty($_GET['leht'])) {
            $leht = $_GET['leht'];

            if (is_numeric($leht)) {
                $fail = 'leht' . $leht . '.php';

                if (is_file($fail)) {
                    include($fail);
                } else {
                    echo "<p>Valitud lehte ei eksisteeri!</p>";
                }
            } else {
                echo "<p>Vigane väärtus!</p>";
            }
        } else {
            echo "<h2>Tere tulemast!</h2><p>Vali leht menüüst.</p>";
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>