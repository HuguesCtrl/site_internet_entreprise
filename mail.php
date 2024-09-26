<?php
// Inclusion de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Initialiser un tableau de réponse
$response = ['success' => false];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message)) {
        // Création de l'objet PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Paramètres SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Remplacez par votre serveur SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'votre-email@example.com'; // Remplacez par votre email SMTP
            $mail->Password = 'votre-mot-de-passe'; // Remplacez par votre mot de passe SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Port TLS

            // Expéditeur et destinataire
            $mail->setFrom('votre-email@example.com', 'Votre Nom');
            $mail->addAddress('destinataire@example.com'); // Adresse du destinataire

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Nouveau message de contact';
            $mail->Body = "<h3>Nom : $name</h3><h3>Email : $email</h3><p>Message : $message</p>";

            // Envoi de l'email
            $mail->send();
            $response['success'] = true;
        } catch (Exception $e) {
            $response['message'] = "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
        }
    } else {
        $response['message'] = 'Veuillez remplir tous les champs.';
    }
}

// Retourner la réponse en JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
