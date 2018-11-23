<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	  echo "No arguments Provided!";
	  return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'ilha@tech-center.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Mensagem Ilhatech:  $name";
$email_body = "Você recebeu uma nova mensagem do formulário de contato Ilhatech.\n\n"."Detalhes:\nNome: $name\nEmail: $email_address\nTelefone: $phone\nMensagem:\n$message";
$email_body = utf8_decode($email_body); // Prevents problems with accents and special characters
$headers = "De: joorgemelo@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Responda para: $email_address";
$mail = mail($to, $email_subject, $email_body, $headers);
if($mail) { 
   echo "Obrigado por usar nosso formulário de contato.";
} else {
   echo "Envio de email falhou.";
}
return true;			
?>
