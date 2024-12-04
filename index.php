<?php
session_start();


if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = ""; 
    $_SESSION["highscore"] = PHP_INT_MAX; 
    $_SESSION["attempts"] = 0; 
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"])) {
        $_SESSION["username"] = htmlspecialchars($_POST["username"]);
        $_SESSION["n"] = rand(0, 10); 
        $_SESSION["attempts"] = 0; 
    }
}


if (isset($_GET["n"]) && isset($_SESSION["n"])) {
    $mynumber = $_SESSION["n"];
    $_SESSION["attempts"]++; 

    if ($mynumber == $_GET["n"]) {
        echo "Right Guess, " . htmlspecialchars($_SESSION["username"]) . "!<br>";
        echo "You guessed it in " . $_SESSION["attempts"] . " attempts.<br>";

       
        if ($_SESSION["attempts"] < $_SESSION["highscore"]) {
            $_SESSION["highscore"] = $_SESSION["attempts"];
            echo "Congratulations! You've set a new high score!<br>";
        }


        $mynumber = rand(0, 10);
        $_SESSION["n"] = $mynumber;
        $_SESSION["attempts"] = 0; 
    } else {
        if ($mynumber > $_GET["n"]) {
            echo "The number you guessed is too low.<br>";
        } else {
            echo "The number you guessed is too high.<br>";
        }
    }
}


if (!empty($_SESSION["username"])) {
    echo "Welcome, " . htmlspecialchars($_SESSION["username"]) . "!<br>";
    echo "Your high score: " . ($_SESSION["highscore"] == PHP_INT_MAX ? "None yet" : $_SESSION["highscore"]) . " attempts.<br>";
}
?>

<form method="get">
    What is the number<br><br>
    <input name="n"/><br><br>
    <button>Guess</button>
</form>