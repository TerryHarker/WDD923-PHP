<?php
$img_path = 'media'; // Ordner, in dem die Bilder liegen

// manuelles Array mit Dateinamen und Titeln der Projekte Mehrdimensional, da zu jedem der Projekte mehrere Werte gehören.
$imageFiles = array(
    array(
        "url" => "Business-20.png",
        "titel" => "Business Template"
    ),
    array(
        "url" => "Donerun-402x.jpg",
        "titel" => "Donerun"
    ),
    array(
        "url" => "Magnetic-402x.jpg",
        "titel" => "Magnetic Project"
    ),
    array(
        "url" => "Pompeo.jpg",
        "titel" => "Pompeo"
    ),
    array(
        "url" => "biznus.jpg",
        "titel" => "Biz Webseite"
    ),
    array(
        "url" => "eaef_Blurr-402x.jpg",
        "titel" => "Blurr App"
    ),
    array(
        "url" => "incredible-402x.jpg",
        "titel" => "Incredible Project"
    )
);

// Array Monitor:
echo '<pre>';
print_r( $imageFiles );
echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bildergalerie</title>
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3>Bildergalerie</h3>
        <div class="row">
            
            <!-- HTML innerhalb der Kontrollstruktur wird so oft ausgegeben, wie der loop durchläuft -->
            <?php foreach($imageFiles as $image ) { // durch das Haupt-Array loopen, um für jeden Eintrag eine Kachel auszugeben ?>
            
            <div class="col-md-3">
                <div class="card mb-3 shadow-sm">
                    <img src="media/<?php echo $image['url'] ?>" class="card-img-top" alt="Pompeo.jpg">
                    <strong style="padding:5px 10px"><?php echo $image['titel'] ?></strong>
                </div>
            </div>
            
            <?php } ?>

        </div>
    </div>
    <br>
    <footer>
        <p>&copy; Terry Harker, image credit: webflow.io </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>