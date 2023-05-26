<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Galgje | Willekeurig</title>
</head>

<body>
    <div class="head">
        <h1>Galgje</h1>
    </div>
    
    <div class="text">
        <h3>Je hebt gekozen voor een willekeurig woord!</h3>
    </div>
    <?php
    $randomwoorden = array(
    "academy",
    "system",
    "grip",
    "shake",
    "attack",
    "number",
    "angle",
    "orange",
    "tacky",
    "rely",
    "jar",
    "touch",
    "train",
    "array",
    );
    $kiezen = array_rand($randomwoorden);
    setcookie('Woord' , $randomwoorden [$kiezen]);
    ?>
    <div class="button">
        <form>
            <button class="startbutton" type="submit" formaction="galgje.php">Start Willekeurig</button>
        </form>
    </div>
</body>

</html>