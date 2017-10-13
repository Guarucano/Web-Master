<?php
//require 'PHPMailerAutoload.php';

//instanciamos un objeto de la clase phpmailer al que llamamos 
//por ejemplo mail
$correo2 = new PHPMailer();

//Le decimos al script que utilizaremos SMTP
$correo2->IsSMTP();

  //Le indicamos que el servidor smtp requiere autenticación
$correo2->SMTPAuth = true;

$correo2->SMTPSecure = 'tls';

$correo2->Host = "smtp.gmail.com";

$correo2->Port = 587;

//Le decimos cual es nuestro nombre de usuario y password
$correo2->Username   = "goenprueba@gmail.com";
$correo2->Password   = "Goen123456";

$correo2->SetFrom("goenprueba@gmail.com", "Goen");

$correo2->AddReplyTo("goenprueba@gmail.com","AddReplyTo");

$correo2->AddAddress("".$_SESSION["email"]."", $_SESSION["nombre"].' '.$_SESSION["apellido"]);

$correo2->Subject = "Registro de pago de: ".$_SESSION["nombre"].' '.$_SESSION["apellido"]."";

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
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span">Felicidades</span>&nbsp; '.$_SESSION["nombre"].' '.$_SESSION["apellido"].' su pago ha sido enviado exitosamente al administrador, cuando el pago sea procesado se le enviará un correo validando su inscripción en la sección (todavía no tenemos este campo de sección a registrar).</td>
        </tr>
        <br>
        <tr>
          <td><p>&nbsp;</p>
            <p style="font-family: Helvetica LT Condensed; color: #008895; font-weight: bold; font-size: 22px; text-align: center;">DATOS DE PAGO</p></td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span">Ticket Número:</span>&nbsp; '.$array2.'</td>
        </tr>
         <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Número de Deposito / Trasferencia:</span>&nbsp; '.$_POST["numeroPago"].'</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Fecha de Deposito / Trasferencia:</span>&nbsp; '.$_POST["date"].'</td>
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

$correo2->Body = $cuerpo;

//Definimos AltBody por si el destinatario del correo2 no admite email con formato html 
$correo2->AltBody = "Su Pago ha sido procesado Satisfactoriamente, si no recibe respuesta en 24 horas por favor envíenos un correo con sus datos.";



//$correo2->MsgHTML("Mi Mensaje en <strong>HTML</strong>");

//$correo2->AddAttachment("images/phpmailer.png");

$exito = $correo2->Send();

  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
  //del anterior, para ello se usa la funcion sleep 
  $intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
  sleep(5);
      //echo $correo2->ErrorInfo;
      $exito = $correo2->Send();
      $intentos=$intentos+1;  
  
   }
    
   if(!$exito)
   {
  header("Location: ../errorenvio.php");
  die;  
   }
   else
   {
  header("Location: ../pagoregistrado.php");
    die;
   } 
?>