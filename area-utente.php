<?php
    error_reporting(E_ERROR | E_PARSE);    
    //inizio la sessione
    session_start(); 
    
    //includo i file necessari a collegarmi al db con relativo script di accesso	
    include("inc/config.php"); 
    include("inc/connessione_db.php");
    include("inc/functions.php");
    
?>


<?php require_once 'helpers/header.php'; ?>



<?php require_once 'helpers/aree-utente.php'; ?>
<?php require_once 'helpers/footer.php'; ?>