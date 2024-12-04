<?

if (isset($_GET["n"])){

    if($mynumber==$_GET["n"]){

        echo "Right Guess!";
    }
    else {

        echo "Guess Again";
    }
}
else {
    $mynumber=rand(0,10);
}

?>

<form method="get">
    What is the number
    <input name="n"/>
    <button>Guess</button>
</form>