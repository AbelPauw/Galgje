<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Galgje | Zelf</title>
</head>

<body>
    <div class="head">
        <h1>Galgje</h1>
    </div>
    <div class="text">
        <h3>Je hebt gekozen om zelf een woord in te voeren.</h3>
    </div>
    <div class="button">
        <form method="POST">
            <input class="textinput" type="text" name="WoordGalgje" id="WoordGalgje" placeholder="Voer een woord in" />
            <button class="start" type="submit" name="Opslaan" id="Start">Start!</button>
        </form>
    </div>
    <div class="phpGalgWoord">
        <h2>
            <?php
            if (isset($_POST["Opslaan"])) {
                setcookie('Woord', $_POST["WoordGalgje"], time() + 3600);
                header("refresh: 0 ");
            }

            if (isset($_COOKIE["Woord"])) {
                header("location: galgje.php");
            }
            ?>
        </h2>
    </div>
</body>

</html>