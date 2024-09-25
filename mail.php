<?php
// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Vérification de base des données (email valide)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Destinataire de l'e-mail (remplacez par votre e-mail)
        $destinataire = "contact@hugues-graphiste-video.com";
        
        // Sujet de l'e-mail
        $sujet = "Nouveau message de " . $nom;

        // Contenu de l'e-mail
        $contenu = "Nom: " . $nom . "\n";
        $contenu .= "Email: " . $email . "\n\n";
        $contenu .= "Message:\n" . $message . "\n";

        // En-têtes de l'e-mail
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Envoie l'e-mail
        if (mail($destinataire, $sujet, $contenu, $headers)) {
            echo "Message envoyé avec succès !";
        } else {
            echo "Échec de l'envoi du message.";
        }
    } else {
        echo "Adresse email invalide.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>




