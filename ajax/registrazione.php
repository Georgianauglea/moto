<?php

//error_reporting(E_ERROR | E_PARSE);    
//inizio la sessione
session_start(); 

//includo i file necessari a collegarmi al db con relativo script di accesso	
include("../inc/config.php"); 
include("../inc/connessione_db.php");
include("../inc/functions.php");
    

//print_r($_POST);

//Avvio i controlli

$controlli = '';

if (empty($_POST["nome"])) {
    $controlli .= '#1';
} else {
    
    $name = $_POST["nome"];
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $controlli .= '#4';
    }
    
}

if (empty($_POST["cognome"])) {
    $controlli .= '#2';
} else {
    
    $cognome = $_POST["cognome"];
    if (!preg_match("/^[a-zA-Z ]*$/",$cognome)) {
      $controlli .= '#5';
    }
    
}

if (empty($_POST["mail"])) {
    $controlli .= '#3';
} else {

    $email = $_POST["mail"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $controlli .= '#6';
    }
    
}

$sql1 = 'SELECT * FROM `utenti` WHERE `mailU` = "'.$_POST['mail'].'" ';
$risultato1 = mysqli_query($con, $sql1);
$num_rows = mysqli_num_rows($risultato1);

if($num_rows != 0)
{
 $controlli .= '#7';   
}



if($controlli == '')
{

    $sql2 = 'INSERT INTO `utenti`(`nomeU`, `cognomeU`, `mailU`, `passwordU`, `ruolo`, `codice`, `attivo`) VALUES ("'.$_POST['nome'].'","'.$_POST['cognome'].'","'.$_POST['mail'].'","'.sha1($_POST['pass']).'","1","'.stringaRandom(10).'","0")';
    //debug_e($sql2);
    mysqli_query($con, $sql2);

}else{
    
  echo $controlli;  
  
}
?>
