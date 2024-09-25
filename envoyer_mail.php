<?php
//Si le formulaire a été soumis
if(isset($_POST["message"])){
    $message = "Ce message vous a été envoyé via la page contact Hugues / Graphiste vidéo
    Nom : " . $POST["name"] . "
    Email: " . $POST["email"] . "
    Message: " .$POST["message"];


    $retour = mail("contact@hugues-graphiste-video.com",$_POST[`name`],$message, "From:contact@hugues-graphiste-video.com\r\nReply-to:" . $_POST[`email`])
    
    if($retour){
        echo "<p>L'email a bien été envoyé</p>";
    }
}
?>



