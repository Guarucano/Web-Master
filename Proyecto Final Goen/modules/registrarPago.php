<?php 
include_once 'conexion.php';
session_start();

$numeroPago = $_POST['numeroPago'];
$fechaHora = $_POST['date']; // DD-MM-AAAA HH:MM:SS
$parts = explode('-', $fechaHora);
$parts2 = explode(' ', $parts[2]);
$newDate = "{$parts2[0]}-{$parts[1]}-{$parts[0]} {$parts2[1]}"; // YYYY-MM-DD HH:MM:SS
$fecImg = "{$parts[0]}-{$parts[1]}-{$parts2[0]}";
$descPago = $_POST['descPago'];

$idmodulo = $_POST['idmodulo'];

$target_dir = "../imgpago/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$idusuario = $_SESSION['idusuario'];

$con = getConnection();
$sql="SELECT idpago from pagos order by idpago desc limit 0,1";
$result=$con->query($sql);
$array=$result->fetch_assoc();
$array2= $array["idpago"]++;
$array2++;

$nomImg = "$array2$idusuario$fecImg.$imageFileType";

$con = getConnection();

    if ($con == NULL) {
        // echo "ERROR: No se estableció la conexión";
    } else {
        $con->autocommit(FALSE);

        //$query = "INSERT INTO `pagos`(`numeropago`, `descripcionpago`) VALUES ('$numeroPago','$descPago')";
       
        $query =" INSERT INTO `pagos`(`idpago`, `numeropago`, `fecha`, `descripcionpago`, `imgpago`, `idusuario`,`idcurso`) VALUES (NULL, '$numeroPago', '$newDate', '$descPago', '$nomImg', $idusuario,$idmodulo)";

        
        //echo "EL NOMBRE DE LA IMAGEN ES ".$rs."";

           //$insertDatos = $con->query($query);
        if ($con->query($query)) {
            //echo "<br>ERROR: Insert no fue procesado: " . mysqli_error($con) . "<br>";
            $con->commit();

            //echo "<br>ERROR: commit no fue procesado: " . mysqli_error($con) . "<br>";
        }

         $query2 ="UPDATE curso SET cuposdisponibles = cuposdisponibles -1 WHERE idmodulo = $idmodulo";
        
        
        //echo "EL NOMBRE DE LA IMAGEN ES ".$rs."";

           //$insertDatos = $con->query($query);

        if ($con->query($query2)) {
            //echo "<br>ERROR: Insert no fue procesado: " . mysqli_error($con) . "<br>";
            $con->commit();

            //echo "<br>ERROR: commit no fue procesado: " . mysqli_error($con) . "<br>";
        }

    }



?>

<!-- Validar Imagen de Bauche -->

<?php
//$target_dir = "../imgpago/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$target_file = $target_dir . "/" .$numeroPago;
$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//$nomImg = "$fecImg.$imageFileType";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" 
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
 //Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "/"  .$nomImg)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        include("mailPagoAdmin.php");
    } else {
        header("Location: ../errorenvio.php");
        die;
    }
}

?>

<!-- FIN Validar Imagen Bauche-->

<!-- Registrar Pagos -->
