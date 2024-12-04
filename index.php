<?
session_start();
if (isset($_GET["n"]) && isset($_SESSION["n"]))
{
    $mynumber=$_SESSION["n"];
    if($mynumber==$_GET["n"])
    {

        echo "Right Guess!";
    }
    else 
    {
        if ($mynumber>$_GET["n"])
        {
            echo "The number you guess is low.";
        }
        else 
        {
            echo "The number you guess is high.";
        }
    }
}
else {
    $mynumber=rand(0,10);
    $_SESSION["n"]=$mynumber;
}

?>

<form method="get">
    What is the number
    <input name="n"/><br><br>
    <button>Guess</button>
</form>