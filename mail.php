<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message)) {
        // Créer une instance PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Paramètres du serveur SMTP OVH
            $mail->isSMTP();
            $mail->Host = 'ssl0.ovh.net'; // Serveur SMTP OVH
            $mail->SMTPAuth = true; // Active l'authentification SMTP
            $mail->Username = 'votre-email@votre-domaine.com'; // Remplacez par votre email OVH
            $mail->Password = 'votre-mot-de-passe'; // Remplacez par le mot de passe de votre email OVH
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Utilise SSL ou TLS
            $mail->Port = 465; // Port 465 pour SSL, ou 587 pour TLS

            // Paramètres de l'email
            $mail->setFrom('contact@hugues-graphiste-video.com', 'Hugues'); // Remplacez par votre email OVH
            $mail->addAddress('hc.pro@outlook.fr'); // Adresse de destination
            
            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Nouveau message depuis le formulaire';
            $mail->Body = "<h3>Nom : $name</h3><h3>Email : $email</h3><p>Message : $message</p>";

            // Envoi de l'email
            $mail->send();
            echo 'Le message a été envoyé avec succès.';
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
        }
    } else {
        echo 'Veuillez remplir tous les champs.';
    }
} else {
    echo 'Méthode de requête non valide.';
}
