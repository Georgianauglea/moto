<?php
	//error_reporting(E_ERROR | E_PARSE);

	session_start(); //inizio la sessione
	
	//includo i file necessari a collegarmi al db con relativo script di accesso	
        include("../inc/config.php"); 
        include("../inc/connessione_db.php");
        include("../inc/functions.php");

        $query = 'INSERT INTO `preferiti`(`idUtenteP`, `idAnnuncioP`) VALUES ("'.$_SESSION['id'].'","'.$_POST['id'].'")';
        mysqli_query($con,$query);
        
?>