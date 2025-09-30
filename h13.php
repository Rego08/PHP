<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülesanne 13</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .thumbnail {
            max-width: 150px;
            max-height: 150px;
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
        <h1>Ülesanne 13</h1>

        <h2>Laadi üles pildid (ainult JPG/JPEG)</h2>
        <form method="post" enctype="multipart/form-data" class="mb-4">
            <div class="form-group">
                <input type="file" name="pilt[]" multiple accept="image/jpeg" class="form-control-file" required>
            </div>
            <button type="submit" name="upload" class="btn btn-primary">Laadi üles</button>
        </form>

        <?php
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (isset($_POST['upload'])) {
            foreach ($_FILES['pilt']['tmp_name'] as $key => $tmpName) {
                $fileName = basename($_FILES['pilt']['name'][$key]);
                $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $targetFile = $uploadDir . $fileName;

                if ($fileType == "jpg" || $fileType == "jpeg") {
                    if (move_uploaded_file($tmpName, $targetFile)) {
                        echo "<p>Fail $fileName laeti edukalt üles.</p>";
                    } else {
                        echo "<p>Faili $fileName üleslaadimine ebaõnnestus.</p>";
                    }
                } else {
                    echo "<p>Fail $fileName pole JPG/JPEG formaadis.</p>";
                }
            }
        }
        ?>

        <h2>Üleslaetud pildid</h2>
        <div class="row">
            <?php
            $pildid = glob($uploadDir . "*.{jpg,jpeg}", GLOB_BRACE);
            foreach ($pildid as $pilt) {
                $piltNimi = basename($pilt);
                echo '
                <div class="col-md-3">
                    <img src="' . $pilt . '" alt="' . $piltNimi . '" class="thumbnail" data-toggle="modal" data-target="#piltModal" data-pilt="' . $pilt . '">
                </div>';
            }
            ?>
        </div>

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