<?php
include 'dna.php';

if ($_POST)
{
    $dna = new Dna();
    echo "<pre>";
    //print_r($dna);
    echo "</pre>";
    $protein = $dna->search($_POST);

}
?>
<html>
  <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>DNA</title>
    </head>
    <body>
        <h1> Enter Dna Sequence </h1>
        <form id="form" name="form" action="index.php" method="post" >
            <label> DNA: </label><br />
            <textarea  rows="4" cols="50" id="sequence" name="sequence"/><?php echo $_POST['sequence']?></textarea><br />
            <input type="submit" value="Search" />
        </form>
        <pre>
            <p><?php print_r($protein);?></p>
        </pre>
    </body>
</html>
