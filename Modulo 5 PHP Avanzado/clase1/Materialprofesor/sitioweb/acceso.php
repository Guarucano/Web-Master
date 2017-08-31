<?php
session_start();

if ( !$_SESSION['autenticado'] )
{
	header("Location: login.php");
}
$inactivo = 10;
    if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo)
        {
            session_destroy();
            header("Location: index.php");
        }
    }
 
    $_SESSION['tiempo'] = time();
?>




