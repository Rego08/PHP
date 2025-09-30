<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus 8</title>
</head>
<body>
    <h2>Harjutus8.2</h2>
    
    
    
    
    
    <h2>Harjutus8.1</h2>
    <?php
    date_default_timezone_set('Europe/Tallinn');
    // $eesti_kuud = array(1=>'jaanuar', 'veebruar', 'märts', 'aprill', 'mai', 'juuni', 'juuli', 'august', 'september', 'oktoober', 'november', 'detsember');

    // $paev = date('d');
    // $kuu = $eesti_kuud[date('n')];
    // $aasta = date('Y');

    // echo $paev.'.'.$kuu.' '.$aasta. "<br>";
    // echo time();
    echo date('d.m.Y ')."<br>";
    echo time('G:i')



    ?>
</body>
</html>