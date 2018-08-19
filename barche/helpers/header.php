<!DOCTYPE html>
<html lang="it-IT">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/font.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">


    <title>MOTOR | Moto in vendita: moto usate, nuove - MOTOR Italia</title>
</head>
<body>
    <div id="wrapper">
            <!-- BREADCRUMB -->
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <ul class="breadcrumb pull-left">
                                <li><a href="index.php">Home</a></li>
                            </ul><!-- /.breadcrumb -->
                            
                            <?php
                            if(!isset($_SESSION['autorizzato']))
                            { ?>
                            <div class="account pull-right">
                                <ul class="nav nav-pills">
                                    <li><a href="login.php">Login</a></li>
                                    <li><a href="registration.php">Registrati</a></li>
                                </ul>
                            </div>
                            <?php }else{ ?>
                            <div class="account pull-right">
                                <ul class="nav nav-pills">
                                    <li><a href="annunci.php">I tuoi annunci</a></li>
                                </ul>
                            </div>
                            <?php } ?>
                            
                            
                        </div><!-- /.span12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.breadcrumb-wrapper -->

            <!-- HEADER -->
            <div id="header-wrapper">
                <div id="header">
                    <div id="header-inner">
                        <div class="container">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="row">
                                        <div class="logo-wrapper span4">
                                            <a href="#nav" class="hidden-desktop" id="btn-nav">Toggle navigation</a>

                                            <div class="logo">
                                                <a href="/index.php" title="Home">
                                                    <img src="assets/img/logo.png" alt="Home">
                                                </a>
                                            </div><!-- /.logo -->

                                            <div class="site-name">
                                                <a href="/index.php" title="Home" class="brand" style="font-size: 20px;">MOTOR 24</a>
                                            </div><!-- /.site-name -->

                                            <div class="site-slogan">
                                                <span>Moto in vendita<br>usate e nuove</span>
                                            </div><!-- /.site-slogan -->
                                        </div><!-- /.logo-wrapper -->

                                        <div class="info">
                                            <div class="site-email">
                                                <a href="mailto:info@worldyacht24.com">info@motor.com</a>
                                            </div><!-- /.site-email -->

                                            <div class="site-phone">
                                                <span>049-486-7493</span>
                                            </div><!-- /.site-phone -->
                                        </div><!-- /.info -->

                                   </div><!-- /.row -->
                                </div><!-- /.navbar-inner -->
                            </div><!-- /.navbar -->
                        </div><!-- /.container -->
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->
            </div><!-- /#header-wrapper -->

            <!-- NAVIGATION -->
            <div id="navigation">
                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="navigation clearfix-normal">

                            <ul class="nav">
                                <li>
                                    <a href="/index.php">Homepage</a>
                                </li>
                                <li>
                                    <a href="ricerca.php">Ricerca</a>
                                </li>
                                <li>
                                    <a href="inserisci-annuncio.php">Inserisci</a>
                                </li>
                                <?php
                                    if(isset($_SESSION['autorizzato']))
                                    { ?>
                                <li class="menuparent">
                                    <span class="menuparent nolink">Il mio account</span>
                                    <ul>
                                        <li><a href="annunci.php">I miei annunci</a></li>
                                        <li><a href="preferiti.php">Annunci Preferiti</a></li>
                                        <li><a href="area-utente.php">I miei dati</a></li>
                                    </ul>
                                </li>
                                
                                 <?php } ?>
                                <li>
                                    <a href="#">Contatti</a>
                                </li>
                                <?php
                                    if(isset($_SESSION['autorizzato']))
                                    { ?>
                                <li>
                                    <a href="logout.php">Esci</a>
                                </li>
                                 <?php } ?>
                            </ul><!-- /.nav -->

                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->

            <!-- CONTENT -->
            <div id="content">