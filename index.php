<?php
setcookie("Woord", "", time() - 3600);
setcookie("characters", "", time() - 3600);
setcookie("mistakes", "", time() - 3600);
?>
<!DOCTYPE html>
<html>

<meta charset="UTF-8">


<head>
    <title>Galgje | Home</title>
</head>

<body>
    <div class="head">
        <h1>Galgje</h1>
    </div>
    <div class="text">
        <h3>Wil je zelf een woord kiezen of een willekeurig woord gebruiken?</h3>
    </div>
    <div class="button">
        <form>
            <button class="zelf" type="submit" formaction="galgtext.php">Zelf Kiezen</button>
            <button class="will" type="submit" formaction="willekeurig.php">Willekeurig</button>
    </form>
    </div>
</body>

</html>