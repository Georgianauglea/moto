<?php
/**
 * @param $idAnnuncio
 * @return array|null contiene  N istanze di annuncio , una per ogni tipologia .
 */
function getAnnuncio($idAnnuncio){
    global $con;
        $sql = 'SELECT * 
        FROM `annunci` 
        JOIN `annuncioTipologia` ON `idAnnuncio` = `idAnn`
        JOIN `tipologiamoto` ON `idTip` = `idTipologia`
        JOIN `marca` ON `marca` = `idMarca`
        WHERE `idAnnuncio` ="'.$idAnnuncio.'"';

        $ris = mysqli_query($con,$sql);
        if(!ris){
           echo"Could not successfully run query (".$sql.") from DB: ";
        }
        $output = array();
        while ($row = mysqli_fetch_array($ris)) {
            array_push($output,$row);
        }
        mysqli_free_result($ris);//garbage collector
        return $output;

}
/**
 * @param $id idUtente
 * @return int|null contiene  il numero di annunci per utente $id
 */
function getNumeroAnnunciUtente($id){
    global $con;
    $sql = 'SELECT count(idAnnuncio) as numeroAnnunci 
    FROM `annunci` 
    WHERE `idUtente` ="'.$id.'"';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        die("Could not successfully run query (".$sql.") from DB: ");
    }//controllo di esistenza della variabile
    $output = mysqli_fetch_assoc($ris);//salvo il valore in un array associativo ( in questo caso contiene solo una variabile )
    mysqli_free_result($ris);//garbage collector
    return $output ;
}
/**
 * @param $idMarca  contiene interno relativo ad idMarca
 * @return string|null contiene  il nome della  marca relativa
 */
function getNomeMarca($idMarca){
    global $con;
    $sql = 'SELECT `nomeMarca` 
    FROM `marca` 
    WHERE `idMarca` ="'.$idMarca.'"';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        die("Could not successfully run query (".$sql.") from DB: ");
    }//controllo di esistenza della variabile
    $output = mysqli_fetch_assoc($ris);//salvo il valore in un array associativo ( in questo caso contiene solo una variabile )
    mysqli_free_result($ris);//garbage collector
    return $output ;
}

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        die("Could not successfully run query (".$sql.") from DB: ");
    }//controllo di esistenza della variabile
    $output = mysqli_fetch_assoc($ris);//salvo il valore in un array associativo ( in questo caso contiene solo una variabile )
    mysqli_free_result($ris);//garbage collector
    return $output ;
}
/**
 * @param $idTip  contiene interno relativo ad idTipologia
 * @return string|null contiene  il nome della tipologiabaca relativa
 */
function getNomeTipologia($idTip){
    global $con;
    $sql = 'SELECT `nomeTipologia` 
    FROM `tipologiamoto` 
    WHERE `idTipologia` ="'.$idTip.'"';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        die("Could not successfully run query (".$sql.") from DB: ");
    }//controllo di esistenza della variabile
    $output = mysqli_fetch_assoc($ris);//salvo il valore in un array associativo ( in questo caso contiene solo una variabile )
    mysqli_free_result($ris);//garbage collector
    return $output ;
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return array|null contiene  array N array associativi . uno per tipologiaMoto legata all'annuncio
 */
function getTipologieAnnuncio($idAnnuncio){
    global $con;
    $sql = 'SELECT * 
        FROM `annuncioTipologia` 
        JOIN `tipologiamoto` ON `idTip` = `idTipologia`
        WHERE `idAnn` ="'.$idAnnuncio.'"';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        echo"Could not successfully run query (".$sql.") from DB: ";
    }
    $output = array();
    while ($row = mysqli_fetch_array($ris)) {
        array_push($output,$row);
    }
    mysqli_free_result($ris);//garbage collector
    return $output;
}
/**
 * @return array|null contiene  array N array associativi . uno per tipologia moto
 */
function getAllTipologie(){
    global $con;
    $sql = 'SELECT *  FROM `tipologiamoto` ';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        echo"Could not successfully run query (".$sql.") from DB: ";
    }
    $output = array();
    while ($row = mysqli_fetch_array($ris)) {
        array_push($output,$row);
    }
    mysqli_free_result($ris);//garbage collector
    return $output;
}

/**
 * @return array|null contiene  array N array associativi . uno per tipologia marca
 */
function getAllMarche(){
    global $con;
    $sql = 'SELECT *  FROM `marca` ';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        echo"Could not successfully run query (".$sql.") from DB: ";
    }
    $output = array();
    while ($row = mysqli_fetch_array($ris)) {
        array_push($output,$row);
    }
    mysqli_free_result($ris);//garbage collector
    return $output;
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return array|null contiene  array non associativo che contiene esclusivamente i nomi delle tipologie legate all' idAnnuncio
 */
function getTipologieAnnuncioList ($idAnnuncio){
    $output= getTipologieAnnuncio($idAnnuncio);
    $ar = array();
    for ($i = 0;$i<count($output);$i++){
        array_push($ar,$output[$i]["nomeTipologia"]);
    }
    return $ar;
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return int|null contiene  id dell'utente di determinato annuncio
 */
function getIdUtente( $idAnnuncio){
    $output = getAnnuncio($idAnnuncio);
    return $output[0]['idUtente'];
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return int|null contiene  anno  di determinato annuncio
 */
function getAnno ($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["anno"];
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return int|null contiene  lunghezza  di determinato annuncio
 */
function getLLunghezza ($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["lunghezza"];
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return bool|null contiene  1 se nuovo 0 altrimenti
 */
function isNew ($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["nuovoUsato"];
}

/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return int|null contiene  id della marca di determinato annuncio
 */
function getIdMarca($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["marca"];
}

/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return int|null contiene  prezzo  di determinato annuncio
 */
function getPrezzo($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["prezzo"];
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return string|null contiene  la tipologia di carburante di determinato annuncio
 */
function getCarburante($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["carburante"];
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return string|null contiene  la descrizione determinato annuncio
 */
function getDescrizione($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["descrizione"];
}

/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return string|null contiene  indirizzo via + numero .
 */
function getIndirizzo($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["viaPaese"];
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return string|null contiene la capacita' del serbatoio .
 */
function getCapacitaSerbatoio($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["capacitaSerbatoio"];
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return string|null contiene il numero di marce .
 */
function getNumeroMarce($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["numeroMarce"];
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return string|null contiene la cilindrata .
 */
function getCilindrata($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["cilindrata"];
}
/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return string|null contiene il numero dei cilindri .
 */
function getNumeroCilindri($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["numeroCilindri"];
}

/**
 * @param $idAnnuncio  contiene interno relativo ad idAnnuncio
 * @return string|null contiene  nome Comune
 */
function getNomePaese($idAnnuncio){
    $output =getAnnuncio($idAnnuncio);
    return $output[0]["nomeComune"];
}
/**
 * @return array|null contiene  array N array associativi . uno per citta
 */
function getAllCityProv(){
    global $con;
    $sql = 'SELECT *  FROM `italy_cities` ';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        echo"Could not successfully run query (".$sql.") from DB: ";
    }
    $output = array();
    while ($row = mysqli_fetch_array($ris)) {
        array_push($output,$row);
    }
    mysqli_free_result($ris);//garbage collector
    return $output;
}

/**
 * @return array|null contiene  array N array associativi . uno per provincia
 */
function getAllProv(){
    global $con;
    $sql = 'SELECT * FROM `italy_cities` GROUP BY `provincia`';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        echo"Could not successfully run query (".$sql.") from DB: ";
    }
    $output = array();
    while ($row = mysqli_fetch_array($ris)) {
        array_push($output,$row);
    }
    mysqli_free_result($ris);//garbage collector
    return $output;
}

/**
 * @return array|null contiene  array N array associativi . uno per regione
 */
function getAllRegioni(){
    global $con;
    $sql = 'SELECT * FROM `italy_cities` GROUP BY `regione`';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        echo"Could not successfully run query (".$sql.") from DB: ";
    }
    $output = array();
    while ($row = mysqli_fetch_array($ris)) {
        array_push($output,$row);
    }
    mysqli_free_result($ris);//garbage collector
    return $output;
}



//FUNZIONE PER LA REDIRECT
function Redirect($url, $permanent = false){
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}
/**
 * incrociare db con tabelle italy per avere info di citta , cap , provincia , regione etc 
 *
 */
 function getIdMarcaFromName($nome){
	global $con;
    $sql = 'SELECT `idMarca` 
    FROM `marca` 
    WHERE `nomeMarca` ="'.$nome.'"';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        die("Could not successfully run query (".$sql.") from DB: ");
    }//controllo di esistenza della variabile
    $output = mysqli_fetch_assoc($ris);//salvo il valore in un array associativo ( in questo caso contiene solo una variabile )
    mysqli_free_result($ris);//garbage collector
    return $output ;
}


function getMailFromId($id){
	global $con;
    $sql = 'SELECT `mailU`
    FROM `utenti` 
    WHERE `idU` ='.$id.'';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        die("Could not successfully run query (".$sql.") from DB: ");
    }//controllo di esistenza della variabile
    $output = mysqli_fetch_assoc($ris);//salvo il valore in un array associativo ( in questo caso contiene solo una variabile )
    mysqli_free_result($ris);//garbage collector
    return $output ;
}


function getIdNomeTipologiaFromName($nome){
	global $con;
    $sql = 'SELECT `idTipologia` 
    FROM `tipologiamoto` 
    WHERE `nomeTipologia` ="'.$nome.'"';

    $ris = mysqli_query($con,$sql);
    if(!$ris){
        die("Could not successfully run query (".$sql.") from DB: ");
    }//controllo di esistenza della variabile
    $output = mysqli_fetch_assoc($ris);//salvo il valore in un array associativo ( in questo caso contiene solo una variabile )
    mysqli_free_result($ris);//garbage collector
    return $output ;
}

function isPreferito($id)
{
    global $con;
    
    $sql = 'SELECT * FROM `preferiti` 
    WHERE `idAnnuncioP` ="'.$id.'" AND `idUtenteP` ="'.$_SESSION['id'].'"';
    $ris = mysqli_query($con,$sql);
    $row_cnt = mysqli_num_rows($ris);
    if(!$ris){
        die("Could not successfully run query (".$sql.") from DB: ");
    }//controllo di esistenza della variabile
    
    if($row_cnt > 0)
    { 
        return TRUE; 
        
    }
    else
    { 
        return FALSE;
        
    }
    
}

/**
 * @param id id della citta // importante non id annuncio 
 * @return string|null contiene  stringa con nome citta .
 */
function getNomeCittaFromId( $id ){
    global $con;
    $sql = 'SELECT comune  FROM `italy_cities` WHERE `istat`='.$id;
    $ris = mysqli_query($con,$sql);
    if(!$ris){
        echo"Could not successfully run query (".$sql.") from DB: ";
    }
    $output = $ris;
    
    mysqli_free_result($ris);//garbage collector
    return $output;
}

/**
 * @param id id della citta // importante non id annuncio 
 * @return string|null contiene  stringa con nome citta .
 */
function getInfoCitta( $id ){
    global $con;
    $sql = 'SELECT * FROM `italy_cities` JOIN `italy_cap` ON `italy_cities`.`istat` = `italy_cap`.`istat`  WHERE `italy_cap`.`istat`='.$id;    
    $ris = mysqli_query($con,$sql);
    if(!$ris){
        echo"Could not successfully run query (".$sql.") from DB: ";
    }
    $riga = mysqli_fetch_array($ris);
    $output = 'Italia, '.$riga['regione'].', '.$riga['comune'].' ('.$riga['provincia'].'), '.$riga['cap'];
    
    mysqli_free_result($ris);//garbage collector
    return $output;
}


/*
*
*
*/
function getLatLon( $id ){
	global $con;
    $sql = 'SELECT lat , lng  FROM `italy_geo` WHERE `istat`='.$id;
    $ris = mysqli_query($con,$sql);
    if(!$ris){
        echo"Could not successfully run query (".$sql.") from DB: ";
    }
	$riga = mysqli_fetch_array($ris);
    
    mysqli_free_result($ris);//garbage collector
    return $riga;
}


/*
*funzione che calcola la distanza in km tra due punti.
ini ha due numeri . il primo lat ed il secondo lon
*
*/
function calcDist($ini, $fin) {
    $R = 6371; // km
    $dLat = deg2rad($fin[0]-$ini[0]);
    $dLon = deg2rad($fin[1]-$ini[1]);
    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($ini[0])) * cos(deg2rad($fin[0])) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    $d = $R * $c;
    return $d;
}



/*
 * Funzioni generali
 */

//Genera una stringa casuale data la lunghezza della stringa
function stringaRandom($lunghezza){
    // lista di caratteri che comporranno la stringa random
    $caratteriPossibli = '123456789abcdefghighijkmnpqrstuvwxyzABCDEFGHILMNOPQRSTUVZJKXWY';
    // inizializzo la stringa random
    $stringa = "";
    $i = 0;
    while ($i < $lunghezza) {
        // estrazione casuale di un un carattere dalla lista possibili caratteri
        $carattere = substr($caratteriPossibli,rand(0,strlen($caratteriPossibli)-1),1);
        // prima di inserire il carattere controllo non sia già presente nella stringa random fin'ora creata
        if (!strstr($stringa, $carattere)) {
            $stringa .= $carattere;
            $i++;
        }
    }
    return $stringa;
}

//Funzione per filtrare caratteri dannosi
function Clean($value) {
 
    setlocale(LC_ALL, 'it_IT.UTF8');
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $value);
    $clean_def = preg_replace('/[^A-Za-z0-9\-]/', ' ', $clean);
    $result_semidef = html_entity_decode(strip_tags($clean_def));
    $result = substr($result_semidef, 0, 150);
    return $result;
 
}//Clean

function traduciMese($data)
{
    $nmeng = array('January', 'february', 'march', 'april', 'may', 'june', 'july', 'August', 'september', 'october', 'november', 'december' );
    $nmita = array('Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre','Dicembre');
    return  str_ireplace($nmeng, $nmita, $data);
}

function debug_e($string)
{
    global $debug;
    if($debug)
    {
     echo $string;   
    }
}

?>
