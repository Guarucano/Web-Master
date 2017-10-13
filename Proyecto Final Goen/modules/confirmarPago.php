<?php 
include_once 'conexion.php';
session_start();


$idusuario = $_REQUEST['idu'];
$idpago2 = $_REQUEST['idp'];


$con = getConnection();

if ($con == NULL) {
        // echo "ERROR: No se estableció la conexión";
} else {
    $query =" UPDATE pagos SET pagoconfirmado=1 WHERE idpago= '$idpago2';";
    $queryUsuario = $con->query($query);

    $query2 = "SELECT pagos.idcurso FROM pagos WHERE pagos.idpago = $idpago2";

    $queryCurso = $con->query($query2);

    if ($queryCurso->num_rows > 0) {
        $assoc =  $queryCurso->fetch_assoc();
        $idcurso = $assoc['idcurso'];

        $query3 = "INSERT INTO usuarioscursos(usuarioscursos.idusuario, usuarioscursos.idcurso, usuarioscursos.cursoactual) VALUES($idusuario, $idcurso, 1)";
        $queryFinal = $con->query($query3);
        sleep(2);
        echo json_encode($queryFinal);

    } else {
        echo 'false';
    }

}

?>