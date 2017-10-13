<?php

require 'PHPMailerAutoload.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$cod = $_POST['cod'];
$numero = $_POST['numero'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

//instanciamos un objeto de la clase phpmailer al que llamamos 
//por ejemplo mail
$correo = new PHPMailer();

//Le decimos al script que utilizaremos SMTP
$correo->IsSMTP();

  //Le indicamos que el servidor smtp requiere autenticación
$correo->SMTPAuth = true;

$correo->SMTPSecure = 'tls';

$correo->Host = "smtp.gmail.com";

$correo->Port = 587;

//Le decimos cual es nuestro nombre de usuario y password
$correo->Username   = "goenprueba@gmail.com";
$correo->Password   = "Goen123456";

$correo->SetFrom("goenprueba@gmail.com", "Goen");

$correo->AddReplyTo("goenprueba@gmail.com","Goen Adminstrador");

$correo->AddAddress("goenprueba@gmail.com", "Administrador Goen");

$correo->Subject = "Contacto de: " .$_POST["nombre"].' '.$_POST["apellido"];

//Codio para enviar Archivo adjunto al correo
//$adjunto = '../imgpago/'.$nomImg;
//$correo ->AddAttachment($adjunto, $adjunto);

$cuerpo='

<html>
<head>
<title>Registro de Usuario</title>
<style type="text/css">
<!--
#datos {
  position:absolute;
  width:780px;
  left: 164px;
  top: 316px;
  text-align: center;
}
#apDiv1 #form1 table tr td {
  text-align: center;
  font-weight: bold;
}
#apDiv2 {
  position:absolute;
  width:49px;
  height:45px;
  z-index:2;
  left: 12px;
  top: 11px;
}
#apDiv1 #notificacion table tr td {
  text-align: center;
}
#apDiv1 #notificacion table tr td {
  text-align: left;
}
#apDiv1 #notificacion table tr td {
  text-align: center;
  font-family: Arial, Helvetica, sans-serif;
}
#apDiv3 {
  position:absolute;
  width:833px;
  height:115px;
  z-index:1;
  left: 99px;
  text-align: center;
  top: 16px;
}
-->
</style>
</head>

<body>
<div id="apDiv3">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td><table width="100%" border="0">
        <tr>
          <td><p>&nbsp;</p>
            <p style="font-family: Helvetica LT Condensed; color: #008895; font-weight: bold; font-size: 22px; text-align: center;">DATOS DE CONTACTO</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Nombre y Apellido:</span>&nbsp; '.$_POST["nombre"].' '.$_POST["apellido"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Correo:</span>&nbsp; '.$_POST["email"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Numero de Telefono::</span>&nbsp; '.$_POST["cod"].' - '.$_POST["numero"].'</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Asunto:</span>&nbsp; '.$_POST["asunto"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Mensaje:</span>&nbsp; '.$_POST["mensaje"].'</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
</body>
</html>

'; // Cerramos la comilla simple. Con la comilla simple y el punto y coma se finaliza el cuerpo del mensaje html.  


// Asignamos al atributo Body, la variable $cuerpo.

$correo->Body = $cuerpo;

//Definimos AltBody por si el destinatario del correo no admite email con formato html 
$correo->AltBody = "Mensaje de Contáctanos enviado exitosamente.";



//$correo->MsgHTML("Mi Mensaje en <strong>HTML</strong>");

//$correo->AddAttachment("images/phpmailer.png");

$exito = $correo->Send();

  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
  //del anterior, para ello se usa la funcion sleep 
  $intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
  sleep(5);
      //echo $correo->ErrorInfo;
      $exito = $correo->Send();
      $intentos=$intentos+1;  
  
   }
    
   if(!$exito)
   {
  header("Location: ../errorenvio.php");
  die; 
   }
   else
   {
  header("Location: ../contactoenviado.php");
   } 
?>