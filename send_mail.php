<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire et les sécuriser
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Vérification des champs
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Ton adresse email où tu veux recevoir les informations
        $to = "contact@hugues-graphiste-video.com"; // Remplace par ton adresse e-mail

        // Sujet de l'email
        $subject = "Nouveau message de $name via le formulaire de contact";

        // Corps de l'email
        $body = "Nom: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Message:\n$message";

        // En-têtes de l'email (pour que l'email soit envoyé à partir de l'email de l'utilisateur)
        $headers = "From: $email";

        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            echo "Merci, votre message a été envoyé avec succès.";
        } else {
            echo "Erreur lors de l'envoi. Veuillez réessayer plus tard.";
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
} else {
    echo "Formulaire non soumis correctement.";
}
?>
