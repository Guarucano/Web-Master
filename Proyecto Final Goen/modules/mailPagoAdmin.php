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

$correo->AddReplyTo("goenprueba@gmail.com","Goen Adminstrador");

$correo->AddAddress("goenprueba@gmail.com", "Administrador Goen");

$correo->Subject = "Registro de pago de: " .$_SESSION["nombre"].' '.$_SESSION["apellido"];

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
          <td style="text-align: center"><img src="http://3.bp.blogspot.com/-8WMdV7JuP5g/UYiAZyoB6yI/AAAAAAAAAGo/lqZPIaMfncw/s1600/headerblog.png" width="284" height="166"></td>
        </tr>
        <tr>
          <td><p>&nbsp;</p>
            <p style="font-family: Helvetica LT Condensed; color: #008895; font-weight: bold; font-size: 22px; text-align: center;">DATOS DE PAGO</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Usuario:</span>&nbsp; '.$_SESSION["usuario"].'</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Nombre y Apellido:</span>&nbsp; '.$_SESSION["nombre"].' '.$_SESSION["apellido"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Codigo de Trasferencia:</span>&nbsp; '.$array2.'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Numero de Deposito / Trasferencia:</span>&nbsp; '.$_POST["numeroPago"].'</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Fecha de Deposito / Trasferencia:</span>&nbsp; '.$_POST["date"].'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Descripcion del Pago:</span>&nbsp; '.$_POST["descPago"].'</td>
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
$correo->AltBody = "Se ha registrado un nuevo pago.";



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
  include("mailPagoUsuario.php");
   } 
?>