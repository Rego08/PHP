<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülesanne 14</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .thumbnail {
            max-width: 100%;
            height: auto;
            margin: 10px;
            cursor: pointer;
        }
        .modal-img {
            max-width: 100%;
            max-height: 80vh;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Ülesanne 14</h1>

        <h2>Suvaline pilt</h2>
        <?php
        $pildiKaust = 'img/';
        $pildid = glob($pildiKaust . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

        if (count($pildid) > 0) {
            $suvalinePilt = $pildid[array_rand($pildid)];
            echo '<img src="' . $suvalinePilt . '" alt="Suvaline pilt" class="img-fluid">';
        } else {
            echo "<p>Pildid puuduvad!</p>";
        }
        ?>

        <h2 class="mt-4">Pisipildid veergudes</h2>
        <?php
        $veergudeArv = 3;
        if (count($pildid) > 0) {
            echo '<div class="row">';
            foreach ($pildid as $index => $pilt) {
                if ($index % $veergudeArv == 0 && $index != 0) {
                    echo '</div><div class="row">';
                }
                echo '
                <div class="col-md-' . (12 / $veergudeArv) . '">
                    <img src="' . $pilt . '" alt="Pisipilt" class="thumbnail" data-toggle="modal" data-target="#piltModal" data-pilt="' . $pilt . '">
                </div>';
            }
            echo '</div>';
        } else {
            echo "<p>Pildid puuduvad!</p>";
        }
        ?>

        <div class="modal fade" id="piltModal" tabindex="-1" aria-labelledby="piltModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="piltModalLabel">Pilt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="" alt="Suur pilt" class="modal-img" id="modalPilt">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#piltModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var pilt = button.data('pilt');
            var modal = $(this);
            modal.find('.modal-img').attr('src', pilt);
        });
    </script>
</body>
</html>