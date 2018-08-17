<?php

    session_start();    

    // procedo con la distruzione della sessione
    session_destroy();

    header('Location: /index.php');
?>