<?php
    error_reporting(E_ERROR | E_PARSE);    
    //inizio la sessione
    session_start(); 
    
    //includo i file necessari a collegarmi al db con relativo script di accesso	
    include("inc/config.php"); 
    include("inc/connessione_db.php");
    include("inc/functions.php");
    
     if(!isset($_SESSION['autorizzato'])) header("location: /login.php");
                                    
    
    
    
?>


<?php require_once 'helpers/header.php'; ?>

<div class="container">
    <div id="main">
        

        <div class="row">
            <div class="span12">
                <h1 class="page-header">Annunci Salvati</h1>                
                <?php require_once 'helpers/annunci-preferiti.php'; ?>
            </div>
            
        </div>
        <?php //require_once 'helpers/carousel.php'?>
        <?php //require_once 'helpers/features.php'?>
    </div>
</div>

<?php //require_once 'helpers/bottom.php'; ?>
<?php require_once 'helpers/footer.php'; ?>