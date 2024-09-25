<?php
if(isset($_POST) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["message"])){
    extract($_POST);
    if(!empty($nom) && !empty($email) && !empty($message)){
        $destinataire = `contact@hugues-graphiste-video.com`;
        $sujet = `Formulaire de contact`;
        $msg = `Une nouvelle question est arrivée \n Nom: $nom \n Email: $email \n Message: $message`;
        $entete = `De: $nom \n Reply-To: $email`;

        mail($destinataire, $sujet,$msg,$entete);
    }
}else{
    echo "Vous n'avez pas remplit tous les champs !"
}
?>



