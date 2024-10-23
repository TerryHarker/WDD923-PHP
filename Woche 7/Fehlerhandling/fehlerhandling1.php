<?php
$starttime = time()+microtime(true); // script timer

$debug= isset($_GET['debug']) && $_GET['debug']=='true' ? true:false;

$debugState = $debug ? 'checked':'';
if($debug) {
    echo '<pre>script startzeit: ';
    var_dump($starttime); 
    echo '</pre>';
}

// DB credentials
$dbName = 'nico_db';
$dbUser = 'root';
$dbPassword = '';
$db = new PDO("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPassword);

// Demo Login Daten (statt Login Formular)
$demo_username = 'nico@gmail.com';
$demo_password = 'test1234';

// Login Check Query
$query = 'SELECT * FROM `users` WHERE useremail = :email';
echo $debug==true? "<pre>Query: $query\nE-Mail: $demo_username</pre>":'';
                
$statement = $db->prepare($query);
$values = array('email' => $demo_username );
$success = $statement->execute($values);

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        if ($success) {
            // Check if any rows were returned
            if ($statement->rowCount() > 0) {
                echo $debug==true? '<pre>Query war erfolgreich und gibt Daten zurück.</pre>':'';
                // Fetch the results if needed
                $user = $statement->fetch(PDO::FETCH_ASSOC);
                // Process the user data
                
                if($user && $debug==true){
                    echo '<pre>Daten: ';
                    print_r($user);
                    echo '</pre>';
                }
            } else {
                echo $debug==true? '<pre>Query was erfolgreich aber gibt keine Daten zurück.</pre>':'';
            }
        } else {
            echo $debug==true? '<pre>Query konnte nicht ausgeführt werden.</pre>':'';
        }
        ?>

        <div>
            <h3>Hallo, <?php echo $user!==false ? $user['username']:'Gast'; ?>!</h3>
            <p>
                Du kannst dieses Script nutzen, um dich mit Debugging-Methoden und Fehlerausgabe vertraut zu machen
                Der Debug-Switch muss natürlich nicht mit einem Formular verbunden sein, du kannst auch einfach eine Variable $debug in deinem Code erstellen, die du manuell ein und ausschaltest.
            </p>
            
            <div class="toggle">
                <form action="" method="GET">
                    <input type="checkbox" <?=$debugState ?> id="dbg" name="debug" value="true" onchange="submit()">
                    <label for="dbg">Debug-Schalter</label>
                </form>
            </div>
           
        </div>

        <?php
        $endtime = time()+microtime(true); // script timer
        $duration = round($endtime-$starttime, 5);
        
        echo $debug==true ? '<pre>Script ende - '.$duration.' sek </pre>':'';
        ?>

</body>
</html>