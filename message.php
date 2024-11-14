//Contact Form in PHP
<?php
  $fname = htmlspecialchars($_POST['fname']);
  $name = htmlspecialchars($_POST('name'));
  $email = htmlspecialchars($_POST['email']);
  $sname = htmlspecialchars($_POST('sname'));
  $phone = htmlspecialchars($_POST['phone']);
  $objet = htmlspecialchars($_POST['objet']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "marodexe@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nPrénom: $fname\nEmail: $email\nNom de l'entreprise: $sname\nPhone: $phone\nObjet: $objet\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Votre message a été envoyé";
      }else{
         echo "Désolé, l'envoi de votre message a échoué !";
      }
    }else{
      echo "Entrez une adresse email valide !";
    }
  }else{
    echo "Le champ email et message est obligatoire !";
  }
?>