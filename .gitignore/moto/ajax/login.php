<?php
	//error_reporting(E_ERROR | E_PARSE);

	session_start(); //inizio la sessione
	
	//includo i file necessari a collegarmi al db con relativo script di accesso	
        include("../inc/config.php"); 
        include("../inc/connessione_db.php");
        include("../inc/functions.php");	
 
	//variabili POST con anti sql Injection
	$username=$_POST['username']; //faccio l'escape dei caratteri dannosi
	$password=sha1($_POST['password']); //sha1 cifra la password anche qui in questo modo corrisponde con quella del db
 
	$query = "SELECT * FROM utenti WHERE mailU = '$username' AND passwordU = '$password'";	 	
	$ris = mysqli_query($con,$query);	
	$riga=mysqli_fetch_array($ris);  	
	 
	/*Prelevo l'identificativo dell'utente */
	$cod=$riga['mailU'];
 
	/* Effettuo il controllo */
	if ($cod == NULL) $trovato = 0 ;
	else $trovato = 1; 
        
	/* Username e password corrette */
	if($trovato == 1) {
		
		$_SESSION["autorizzato"] = 1;
                
		/*Registro il codice dell'utente*/
		$_SESSION['mail'] = $riga['mailU'];
		$_SESSION['id'] = $riga['idU'];
                  
		echo '1';
		 
	} else {            
		/*Username e password errati, redirect alla pagina di login*/
		echo '0';		 
	}	
?>