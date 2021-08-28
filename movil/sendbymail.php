<?php
if(isset($_POST['cliente'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "informatica.royalexpress@gmail.com";
$email_subject = "Contacto desde el sitio web";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['contrato']) ||
!isset($_POST['objetocontrato']) ||
!isset($_POST['iniciocontrato']) ||
!isset($_POST['cliente']) ||
!isset($_POST['nit'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Contacto: " . $_POST['contrato'] . "\n";
$email_message .= "Objeto contrato: " . $_POST['objetocontrato'] . "\n";
$email_message .= "Inicio contrato: " . $_POST['iniciocontrato'] . "\n";
$email_message .= "Fin Contrato: " . $_POST['cliente'] . "\n";
$email_message .= "Nit: " . $_POST['nit'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "¡El formulario se ha enviado con éxito!";
}
?>