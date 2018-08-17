<?php
include("config.php"); //includo file configurazione per recupero variabili
// Connessione al DB
     $con = mysqli_connect($host,$db_user,$db_psw,$db_name);
// Check connection
if (mysqli_connect_errno())
{
  echo "Errore critico di Connessione al Database: " . mysqli_connect_error();
}// Selezione del databasemysqli_select_db($con,$db_name)or die(“impossibile connettersi al database”);
?>