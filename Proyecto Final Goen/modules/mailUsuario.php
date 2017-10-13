<?php

require 'PHPMailerAutoload.php';

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

$correo->AddReplyTo("goenprueba@gmail.com","AddReplyTo");

$correo->AddAddress($_POST['email'], "Para");

$correo->Subject = "Muchas gracias por registrarte en Goen.";

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
          <td style="text-align: center"><img src="http://3.bp.blogspot.com/-8WMdV7JuP5g/UYiAZyoB6yI/AAAAAAAAAGo/lqZPIaMfncw/s1600/headerblog.png" width="284" height="166"></td>
        </tr>
        <tr>
          <td><p>&nbsp;</p>
            <p style="font-family: Helvetica LT Condensed; color: #008895; font-weight: bold; font-size: 22px; text-align: center;">DATOS DE REGISTRO</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <td><p>&nbsp;</p>
            <p style="font-family: Helvetica LT Condensed; color: #FFAAAA; font-weight: bold; font-size: 22px; text-align: center;">DATOS PERSONALES</p></td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Nombre:</span>&nbsp; '.$_POST["nombre"].'</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Apellido:</span>&nbsp; '.$_POST["apellido"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Cedula:</span>&nbsp; '.$_POST["cedula"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Genero:</span>&nbsp; '.$_POST["genero"].'</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Correo Electrónico:</span>&nbsp; '.$_POST["email"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Estado:</span>&nbsp; '.$_POST["estado"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Ciudad:</span>&nbsp; '.$_POST["ciudad"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Direccion:</span>&nbsp; '.$_POST["direccion"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Numero de Telefono::</span>&nbsp; '.$_POST["cod"].' - '.$_POST["numero"].'</td>
        </tr>
        <td><p>&nbsp;</p>
            <p style="font-family: Helvetica LT Condensed; color: #008895; font-weight: bold; font-size: 22px; text-align: center;">DATOS DE USUARIO:</p></td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Usuario:</span>&nbsp; '.$_POST["usuario"].'</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Contraseña:</span>&nbsp; '.$_POST["password"].'</td>
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
$correo->AltBody = "Usted ha sido registrado Satisfactoriamente.";



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
    header("Location: ../usuarioregistrado.php");
    die;
   } 
?>