<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülesanne 12</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ülesanne 12</h1>

        <!-- 1. Sõiduaeg -->
        <h2>Sõiduaeg</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="start">Stardiaeg (hh:mm):</label>
                <input type="text" name="start" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end">Lõppaeg (hh:mm):</label>
                <input type="text" name="end" class="form-control" required>
            </div>
            <button type="submit" name="arvutaAeg" class="btn btn-primary">Arvuta sõiduaeg</button>
        </form>
        <?php
        if (isset($_POST['arvutaAeg'])) {
            function arvutaSoiduaeg($start, $end) {
                if (strlen($start) < 5 || strlen($end) < 5) {
                    return "Sisend peab olema vähemalt 5 sümbolit pikk!";
                }

                list($startH, $startM) = explode(":", $start);
                list($endH, $endM) = explode(":", $end);

                $startTotal = $startH * 60 + $startM;
                $endTotal = $endH * 60 + $endM;

                if ($endTotal < $startTotal) {
                    return "Lõppaeg peab olema stardiajast hilisem!";
                }

                $diff = $endTotal - $startTotal;
                $hours = intdiv($diff, 60);
                $minutes = $diff % 60;

                return "Sõiduaeg: $hours tundi ja $minutes minutit";
            }

            $start = $_POST['start'];
            $end = $_POST['end'];
            echo "<p>" . arvutaSoiduaeg($start, $end) . "</p>";
        }
        ?>

        <h2>Palkade võrdlus</h2>
        <?php
        function analüüsiPalku() {
            $fail = 'tootajad.csv';
            if (!file_exists($fail)) {
                return "Faili $fail ei leitud!";
            }

            $mehed = [];
            $naised = [];

            $handle = fopen($fail, 'r');
            if ($handle === false) {
                return "Faili avamine ebaõnnestus!";
            }

            fgetcsv($handle);

            while (($row = fgetcsv($handle)) !== false) {
                $nimi = $row[0];
                $sugu = $row[1];
                $palk = (float)$row[2];

                if ($sugu == 'M') {
                    $mehed[] = $palk;
                } elseif ($sugu == 'N') {
                    $naised[] = $palk;
                }
            }
            fclose($handle);
            
            $keskmineMehed = count($mehed) > 0 ? array_sum($mehed) / count($mehed) : 0;
            $keskmineNaised = count($naised) > 0 ? array_sum($naised) / count($naised) : 0;
            $maxMehed = count($mehed) > 0 ? max($mehed) : 0;
            $maxNaised = count($naised) > 0 ? max($naised) : 0;

            return [
                'keskmineMehed' => $keskmineMehed,
                'keskmineNaised' => $keskmineNaised,
                'maxMehed' => $maxMehed,
                'maxNaised' => $maxNaised
            ];
        }

        $tulemused = analüüsiPalku();
        if (is_array($tulemused)) {
            echo "<p>Meeste keskmine palk: " . round($tulemused['keskmineMehed'], 2) . " €</p>";
            echo "<p>Naiste keskmine palk: " . round($tulemused['keskmineNaised'], 2) . " €</p>";
            echo "<p>Meeste kõrgeim palk: " . round($tulemused['maxMehed'], 2) . " €</p>";
            echo "<p>Naiste kõrgeim palk: " . round($tulemused['maxNaised'], 2) . " €</p>";
        } else {
            echo "<p>$tulemused</p>";
        }
        ?>
    </div>
</body>
</html>