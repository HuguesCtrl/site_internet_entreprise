<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les champs du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Définir l'adresse email de destination (remplace par ton adresse)
    $destinataire = "contact@hugues-graphiste-video.com";

    // Sujet de l'e-mail
    $sujet = "Nouveau message de " . $nom;

    // Contenu de l'e-mail
    $contenu = "Nom: " . $nom . "\n";
    $contenu .= "Email: " . $email . "\n\n";
    $contenu .= "Message:\n" . $message . "\n";

    // En-têtes pour l'e-mail
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
}
?>



