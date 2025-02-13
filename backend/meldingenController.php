<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit']; 
if
    (!is_numeric(value: $capaciteit))
    $errors = "That is not a number";
    echo $errors; 
    die;

$melder = $_POST['melder'];
if(!is_string($melder))
$errors = "that is not text";
die
$Type   = $_POST['Type'];
if(isset($_POST['prioriteit']))
{
    $prioriteit = 1;
}
else 
{
    $prioriteit = 0;
}
$overige_info = $_POST['overige_info'];


echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO `meldingen` (attractie, capaciteit, melder, Type, prioriteit, overige_info ) VALUES (:attractie , :capaciteit, :melder , :Type ,  :prioriteit, :overige_info)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder,
    ":Type" => $Type, 
    ":prioriteit" => $prioriteit,
    ":overige_info" => $overige_info,
]);

header("location: ../meldingen/index.php?msg=melding opgeslagen");