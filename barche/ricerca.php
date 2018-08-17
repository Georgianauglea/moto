<?php
error_reporting(E_ERROR | E_PARSE);
//inizio la sessione
session_start();
$_SESSION['ordina'] = 1;
//includo i file necessari a collegarmi al db con relativo script di accesso
include("inc/config.php");
include("inc/connessione_db.php");
include("inc/functions.php");
?>

<?php require_once 'helpers/header.php'; ?>
<!-- CONTENT -->
<div id="content">
    <div class="container">
        <div>
            <div id="main">
                <div class="list-your-property-form">
                    <h2 class="page-header">Ricerca Avanzata</h2>

                    <div class="content">
                        <form name="fform" id="fform" method="post" action="fetchSearch.php" onsubmit="return validateForm()" enctype="multipart/form-data">
                            <div class="row">                               

                                <div class="span9">
                                    <h3><span>Ricerca Avanzata</span></h3>

                                    <!--<div class="control-group">
                                        <label class="control-label" for="inputKeyBarche">
                                            Parola Chiave
                                        </label>
                                        <div class="controls">
                                            <input value="" type="text" id="inputKeyBarche" name="parolaChiave" placeholder="Inserisci il nome di una barca">
                                        </div>
                                    </div><!-- /.control-group -->
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="power">
                                            Vela/Motore
                                        </label>
                                        <div class="controls">
                                            <select id="power" name="power">
                                                <option value="0">Tutti</option>
                                                <option value="1">Motore</option>
                                                <option value="2">Vela</option>
                                            </select>
                                        </div>
                                    </div><!-- /.control-group --> 
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="cantiere">
                                            Seleziona Costruttore:

                                        </label>
                                        <div class="controls">
                                            <select id="cantiere" name="cantiere">
                                                <option id='Tutti'>Tutti</option>
                                                <?php
                                                // chiedo al db di darmi tutte le marche e poi le inserisco
                                                $costruttore = getAllMarche();
                                                $nElem = count($costruttore);
                                                for ($i = 0; $i < $nElem; $i++) {
                                                    echo "<option id='" . $costruttore[$i]["idMarca"] . "'> " . $costruttore[$i]["nomeMarca"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->  
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="motori">
                                            Prezzo
                                        </label>
                                        <div class="controls">
                                            <select name="prezzoMin" id="prezzoMin">
                                                <option value="0">Da</option>
                                                <?php
                                                for ($i = 0; $i < 11; $i++) {
                                                    $euro = 1000*$i;
                                                    echo "<option> " . $euro. "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="controls">
                                            <select name="prezzoMax" id="prezzoMax">
                                                <option value="0">a</option>
                                                <?php
                                                for ($i = 0; $i < 11; $i++) {
                                                    $euro = 1000*$i;
                                                    echo "<option>  " . $euro. "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div><!-- /.control-group -->
                                    
                                     <div class="control-group">
                                        <label class="control-label" for="motori">
                                            Anno
                                        </label>
                                        <div class="controls">
                                            <select name="annoMin" id="annoMin">
                                                <option value="0">Da</option>
                                                <?php
                                               for ($i = 1920; $i <= date("Y"); $i++) { 
                                                    echo "<option> " . $i. "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="controls">
                                            <select name="annoMax" id="annoMax">
                                                <option value="0">a</option>
                                                <?php
                                                for ($i = 1920; $i <= date("Y"); $i++) {                                                    
                                                    echo "<option>  " . $i. "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div><!-- /.control-group -->
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="motori">
                                            Lunghezza (in metri)
                                        </label>
                                        <div class="controls">
                                            <select name="larghezzaMin" id="larghezzaMin">
                                                <option value="0">Da</option>
                                                <?php
                                                for ($i = 0; $i < 11; $i++) {
                                                    $euro = 500*$i;
                                                    echo "<option> " . $euro. "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="controls">
                                            <select name="larghezzaMax" id="larghezzaMax">
                                                <option value="0">a</option>
                                                <?php
                                                for ($i = 0; $i < 11; $i++) {
                                                    $euro = 500*$i;
                                                    echo "<option>  " . $euro. "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div><!-- /.control-group -->
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="regioni">
                                            Regione :
                                        </label>
                                        <div class="controls">
                                            <select name="regioni" id="regioni">
                                                <option value="0">Tutte le opzioni</option>
                                                <?php
                                                // prelievo tutti gli annunci
                                                $sql1 = 'SELECT * FROM `italy_regions`';
                                                $risultato1 = mysqli_query($con, $sql1);

                                                //CONTROLLO ERRORI QUERY
                                                if (!$risultato1)
                                                    die("Errore estrazione Annunci" . mysql_error());

                                                while ($riga1 = mysqli_fetch_array($risultato1)) {

                                                    echo "<option value='" . $riga1["id_regione"] . "'> " . $riga1["regione"] . "</option>";
                                                }
                                                ?>
                                            </select>

                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="province">
                                            Province :
                                        </label>
                                        <div class="controls">
                                            <select name="province" id="province">
                                                <option value="0">-----</option>                                                
                                            </select>

                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="citta">
                                            Citta :
                                        </label>
                                        <div class="controls">
                                            <select name="citta" id="citta"> 
                                                <option value="0">-----</option>                                                
                                            </select>

                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="carburante">
                                            Nuovo/Usato:
                                        </label>
                                        <div class="controls">
                                            <select id="nuovo" name="nuovo">
                                                <option value="0">Tutti</option>
                                                <option value="1">Nuovo</option>
                                                <option value="2">Usato</option>
                                            </select>
                                        </div>
                                    </div><!-- /.control-group -->                                                                     


                                    <div class="control-group">
                                        <label class="control-label" for="scafo">
                                            Materiale Scafo:

                                        </label>
                                        <div class="controls">
                                            <select id="scafo" name="scafo">
                                                <option id='Tutti'></option>
                                                <?php
                                                // chiedo al db di darmi tutte le marche e poi le inserisco
                                                $scafo = getAllScafi();
                                                $nElem = count($scafo);
                                                for ($i = 0; $i < $nElem; $i++) {
                                                    echo "<option id='" . $scafo[$i]["nomeMateriale"] . "'> " . $scafo[$i]["nomeMateriale"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="carburante">
                                            Carburante
                                        </label>
                                        <div class="controls">
                                            <select id="carburante" name="carburante">
                                                <option id="Altro">Tutti</option>
                                                <option id="Diesel">diesel</option>
                                                <option id="Benzina">benzina</option>
                                            </select>
                                        </div>
                                    </div><!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label" for="motori">
                                            Numero Motori
                                        </label>
                                        <div class="controls">
                                            <select name="motori" id="motori">
                                                <option value="Tutti" id="Tutti">Tutte le ricerche</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>

                                            </select>
                                        </div>
                                    </div><!-- /.control-group -->
                                    <hr class="divider"/>

                                    <div class="control-group">
                                        <label class="control-label" for="tipologia">
                                            Caratteristica barca ( tipologia )
                                        </label>
                                        <div class="controls">
                                            <select name="tipologia[]" multiple="multiple" id="tipologia" class="selectpicker" data-live-search="true">
                                                <option id="Tutti">Tutte le ricerche</option>
                                                <?php
                                                // chiedo al db di darmi tutte le marche e poi le inserisco
                                                $tipo = getAllTipologie();
                                                $nElem = count($tipo);
                                                for ($i = 0; $i < $nElem; $i++) {
                                                    echo "<option data-tokens='" . $tipo[$i]["nomeTipologia"] . "'> " . $tipo[$i]["nomeTipologia"] . "</option>";
                                                }
                                                ?>
                                            </select>

                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                  
                                    <button  type=”submit”  name=”submit” class="btn btn-primary"><span id="numero"></span> annunci trovati</button>

                                </div><!-- /.span9 -->
                                
                                <div class="sidebar span3">
                                    <h3><span>Affina la Ricerca</span></h3>
                                    <div class="widget">
                                        <h5><span>Nuovo / Usato</span></h5>
                                        <ul class="control-list property-detail unstyled">
                                            <li><a href="fetchSearch.php?nuovo=1">Nuovo</a></li>
                                            <li><a href="fetchSearch.php?nuovo=0">Usato</a></li>
                                        </ul>
                                    </div>
                                    <div class="widget">
                                        <h5><span>Costruttori</span></h5>
                                        <ul class="control-list property-detail unstyled">
                                            <?php
                                            // chiedo al db di darmi tutte le marche e poi le inserisco
                                            $marche = getAllMarche();
                                            $nElem = count($marche);
                                            for ($i = 0; $i < $nElem; $i++) {
                                                echo "<li><a href=\"fetchSearch.php?cantiere=" . $marche[$i]["nomeMarca"] . "\"> " . $marche[$i]["nomeMarca"] . "</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="widget">
                                        <h5><span>Categoria barca</span></h5>
                                        <ul class="control-list property-detail unstyled">
                                            <li><a href="fetchSearch.php?power=1">Power</a></li>
                                            <li><a href="fetchSearch.php?power=0">Sail</a></li>
                                        </ul>
                                    </div>
                                    <div class="widget">
                                        <h5><span>Lunghezza (in metri)</span></h5>
                                        <ul class="control-list property-detail unstyled">
                                            <li><a href="fetchSearch.php?larghezzaMin=0&larghezzaMax=4">0-4</a></li>
                                            <li><a href="fetchSearch.php?larghezzaMin=4&larghezzaMax=6">4-6</a></li>
                                            <li><a href="fetchSearch.php?larghezzaMin=6&larghezzaMax=10">6-10</a></li>
                                            <li><a href="fetchSearch.php?larghezzaMin=10&larghezzaMax=15">10-15</a></li>
                                            <li><a href="fetchSearch.php?larghezzaMin=15&larghezzaMax=20">15-20</a></li>
                                            <li><a href="fetchSearch.php?larghezzaMin=20&larghezzaMax=30">20-30</a></li>
                                            <li><a href="fetchSearch.php?larghezzaMin=30">30+</a></li>
                                        </ul>
                                    </div>
                                    <div class="widget">
                                        <h5><span>Prezzo ( EUR )</span></h5>
                                        <ul class="control-list property-detail unstyled">
                                            <li><a href="fetchSearch.php?prezzoMin=1000&prezzoMax=1500">1000-1500</a></li>
                                            <li><a href="fetchSearch.php?prezzoMin=1500&prezzoMax=5000">1500-5000</a></li>
                                            <li><a href="fetchSearch.php?prezzoMin=5000&prezzoMax=10000">5000-10000</a></li>
                                            <li><a href="fetchSearch.php?prezzoMin=10000&prezzoMax=50000">10000-50000</a></li>
                                            <li><a href="fetchSearch.php?prezzoMin=50000&prezzoMax=150000">50000-150000</a></li>
                                            <li><a href="fetchSearch.php?prezzoMin=150000&prezzoMax=500000">150000-500000</a></li>
                                            <li><a href="fetchSearch.php?prezzoMin=500000">500000+</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.span3 -->
                            </div><!-- /.row -->



                        </form>
                    </div><!-- /.content -->
                </div><!-- /.span6 -->
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div>




<?php require_once 'helpers/footer.php'; ?>