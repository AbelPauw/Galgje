<!DOCTYPE html>
<html>

<head>
    <?php
    error_reporting(0);
    ?>
    <meta charset="utf-8">
    <title>Galgje</title>
    <link rel="stylesheet" href="style.css">
    <style>
    </style>
</head>

<body>
    <h1>Galgje</h1>
    <?php

    $mistakesCount = 0;
    if (isset($_POST['button'])) {
        if ($_POST['button'] != 'reset') {
            $lastCharacter   = $_POST['button'];
            if (isset($_COOKIE['characters'])) {
                $characters = $_COOKIE['characters'] . ',' . $_POST['button'];
            } else {
                $characters = $_POST['button'];
            }
            setcookie('characters', $characters, time() + (86400 * 10));
            header("Location: galgje.php");
        } else {
            setcookie("Woord", "", time() - 3600);
            setcookie("characters", "", time() - 3600);
            setcookie("mistakes", "", time() - 3600);
            header("Location: index.php");
        }
    }
    $woordKarakters = str_split($_COOKIE['Woord']);
    $keuzeKarakters = explode(",", $_COOKIE['characters']);
    $won = true;
    foreach ($woordKarakters as $woordKarakter) {
        $keuzeCorrect = false;
        foreach ($keuzeKarakters as $keuzeKarakter) {
            if ($woordKarakter === $keuzeKarakter) {
                $keuzeCorrect = true;
            }
        }
        if ($keuzeCorrect) {
            echo ($woordKarakter);
        } else {
            echo ('_ ');
            $won = false;
        }
    }
    foreach ($keuzeKarakters as $keuzeKarakter) {
        if ($keuzeKarakter === "") {
            $mistakesCount--;
        }
        $keuzeCorrect = false;
        foreach ($woordKarakters as $woordKarakter) {
            if ($woordKarakter === $keuzeKarakter) {
                $keuzeCorrect = true;
            }
        }
        if (!$keuzeCorrect) {
            $mistakesCount++;
        }
    }
    $lose = false;
    if ($mistakesCount === 11) {
        $lose = true;
    }

    if ($won) {
        echo '<br> <h1 class="Gewonnen">Je hebt gewonnen</h1>';
    }
    if ($lose) {
        echo '<br> <h1 class="Verloren">Je hebt verloren</h1>';
        echo "<br><h3 class='Verloren'> Het woord was " . $_COOKIE['woord'];
    }
    ?>
    <form action="galgje.php" method="post">
        <button type="submit" name="button" value="reset">reset</button>

        <?php
        $alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',);
        foreach ($alphabet as $value) {
            $display = true;
            foreach ($keuzeKarakters as $keuzeKarakter) {
                if ($value === $keuzeKarakter) {
                    $display = false;
                }
            }
            if ($won) {
                $display = false;
                setcookie('Woord', "");
                setcookie('characters', "");
            }
            if ($lose) {
                $display = false;
                setcookie('Woord', "");
                setcookie('characters', "");
            }
            if ($display) {
                echo ('<button type="submit" name="button" value="' . $value . '">' . $value . '</button>');
            } else {
                echo ('<button type="submit" name="button" value="' . $value . '" disabled>' . $value . '</button>');
            }
        }
        ?>

    </form>
    

    <h1>Gebruikte letters:</h1>
    <p>
        <?php
        foreach ($keuzeKarakters as $keuzeKarakter) {
            echo ($keuzeKarakter . ' , ');
        }
        ?>
    </p>
    <?php
    echo "<div class='container'>";
    echo "<div class='galg'>";
    if ($mistakesCount < 3) {
        echo "<div class='no-top-bar'></div>";
    } else {
        echo "<div class='top-bar'></div>";
    }
    echo "<div class='structure'>";

    if ($mistakesCount < 2) {
        echo "<div class='no-pole'></div>";
    } else {
        echo "<div class='pole'></div>";
    }
    if ($mistakesCount < 4) {
        echo "<div class= 'no-support'></div>";
    } else {
        echo "<div class='support'></div>";
    }

    echo "<div class='hangman'>";

    if ($mistakesCount < 5) {
        echo "<div class='no-rope'></div>";
    } else {
        echo "<div class='rope'></div>";
    }
    if ($mistakesCount < 6) {
        echo "<div class='no-head'></div>";
    } else {
        echo "<div class='head'></div>";
    }

    echo "<div class='middle'>";

    if ($mistakesCount < 8) {
        echo "<div class='no-left-arm'></div>";
    } else {
        echo "<div class='left-arm'></div>";
    }
    if ($mistakesCount < 7) {
        echo "<div class='no-body'></div>";
    } else {
        echo "<div class='body'></div>";
    }
    if ($mistakesCount < 9) {
        echo "<div class='no-right-arm'></div>";
    } else {
        echo "<div class='right-arm'></div>";
    }

    echo "</div>";
    echo "<div class='legs'>";
    if ($mistakesCount < 10) {
        echo "<div class='no-left-leg'></div>";
    } else {
        echo "<div class='left-leg'></div>";
    }
    if ($mistakesCount < 11) {
        echo "<div class='no-right-leg'></div>";
    } else {
        echo "<div class='right-leg'></div>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
    if ($mistakesCount < 1) {
        echo "<div class='no-foot'></div>";
    } else {
        echo "<div class='foot'></div>";
    }
    echo "</div>";
    echo "</div>";
    ?>

</body>
<footer>

</footer>

</html>