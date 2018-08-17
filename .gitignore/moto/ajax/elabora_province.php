<?php

//error_reporting(E_ERROR | E_PARSE);

session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso	
include("../inc/config.php");
include("../inc/connessione_db.php");
include("../inc/functions.php");


$id = $_POST['id'];

echo '<option value="0">Seleziona Provincia</option>';

// Estraggo Referenti
$sql1 = 'SELECT * FROM `italy_provincies` WHERE id_regione = "' . $id . '"';
$risultato1 = mysqli_query($con, $sql1);

while ($riga1 = mysqli_fetch_array($risultato1)) {
    echo "<option data-tokens='" . $riga1["sigla"] . "' value='" . $riga1["sigla"] . "' > " . $riga1["provincia"] . "</option>";
}
?>