<?php
	//error_reporting(E_ERROR | E_PARSE);

	session_start(); //inizio la sessione
	
	//includo i file necessari a collegarmi al db con relativo script di accesso	
        include("../inc/config.php"); 
        include("../inc/connessione_db.php");
        include("../inc/functions.php");	
 
    //variabili POST con anti sql Injection
    $id= $_SESSION['id'];
	$password=sha1($_POST['password']); //sha1 cifra la password anche qui in questo modo corrisponde con quella del db
 
	$query = "SELECT passwordU FROM utenti WHERE idU = '$id'";	 	
	$ris = mysqli_query($con,$query);	
	$riga=mysqli_fetch_array($ris);  	
	 
	/*Prelevo l'identificativo dell'utente */
	$cod=$riga['passwordU'];
 
	/* Effettuo il controllo */
	if ($cod == $password) $trovato = 1 ;
	else $trovato = 0; 
        
	/*
	if($trovato == 1) {
		
		$_SESSION["autorizzato"] = 1;
                
		
		$_SESSION['mail'] = $riga['mailU'];
		$_SESSION['id'] = $riga['idU'];
                  
		echo '1';
		 
	} else {            
		
		echo '0';		 
	}	*/
?>