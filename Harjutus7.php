<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Php7</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Harjutus7</h1>
        
        <?php
        function generateRange($start, $end, $step = 1) {
            $numbers = [];
            for ($i = $start; $i <= $end; $i += $step) {
                $numbers[] = $i;
            }
            return $numbers;
        }

        $start = 2;
        $end = 8;
        $step = 3;

        $result = generateRange($start, $end, $step);
        echo "<pre>";
        print_r($result);
        echo "</pre>";

        function tervita($nimi) {
            return "Tere $nimi";    
        }

        echo "<p>" . tervita("Päikesekene!") . "</p>";
        ?>

        <h2>Liitu meie uudiskirjaga</h2>
        <form method="POST">
            <div class="form-group">
                <label for="email">E-posti aadress:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Sisesta oma e-posti aadress" required>
            </div>
            <button type="submit" class="btn btn-primary">Liitu</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["email"])) {
            $email = htmlspecialchars(trim($_POST["email"]));
            
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<div class="mt-3 alert alert-success">Tänan, et liitusite!</div>';
            } else {
                echo '<div class="mt-3 alert alert-danger">Palun sisestage kehtiv e-posti aadress.</div>';
            }
        }
        ?>
    </div>
</body>
</html>
