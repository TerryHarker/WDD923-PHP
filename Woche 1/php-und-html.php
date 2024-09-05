<?php
// Variable definieren
$name = "Terry";

// Nach dem PHP Script kommt das HTML Output
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP und HTML</title>
</head>
<body>
    <h1>Das ist die Seite von <?php $name ?></h1>
    Der Name kommt aus einer Variable.
    <br>
    Kurzschreibweise: <?= $name ?>
</body>
</html>