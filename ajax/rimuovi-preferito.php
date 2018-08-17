<?php
	//error_reporting(E_ERROR | E_PARSE);

	session_start(); //inizio la sessione
	
	//includo i file necessari a collegarmi al db con relativo script di accesso	
        include("../inc/config.php"); 
        include("../inc/connessione_db.php");
        include("../inc/functions.php");

        $query = 'DELETE FROM `preferiti` WHERE `idUtenteP` = "'.$_SESSION['id'].'" AND `idAnnuncioP` ="'.$_POST['id'].'"';
        echo $query;
        mysqli_query($con,$query);
        
?>