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

<div class="container">
    <div id="main">
        <?php require_once 'helpers/slider.php'; ?>

        <div class="row">
            <div class="span9">
                <h1 class="page-header">Annunci in Evidenza</h1>
                <?php require_once 'helpers/properties-grid.php'; ?>
            </div>
            <div class="sidebar span3">
                <?php require_once 'helpers/widgets/our-agents.php'; ?>
                <div class="hidden-tablet">
                    <?php require_once 'helpers/widgets/properties.php'; ?>
                </div>
            </div>
        </div>
        <?php //require_once 'helpers/carousel.php'?>
        <?php //require_once 'helpers/features.php'?>
    </div>
</div>

<?php require_once 'helpers/bottom.php'; ?>
<?php require_once 'helpers/footer.php'; ?>
