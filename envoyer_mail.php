<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validation simple des champs
    if (!empty($nom) && !empty($email) && !empty($message)) {
        // Définir les détails de l'email
        $to = "hc.pro@outlook.fr"; // Remplacez par votre adresse email
        $subject = "Nouveau message de " . $nom;
        $body = "Nom: " . $nom . "\n";
        $body .= "Email: " . $email . "\n\n";
        $body .= "Message: \n" . $message;

        // En-têtes de l'email
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";

        // Utiliser la fonction mail() pour envoyer l'email
        if (mail($to, $subject, $body, $headers)) {
            echo "Votre message a été envoyé avec succès.";
        } else {
            echo "Erreur lors de l'envoi de votre message. Veuillez réessayer.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>



