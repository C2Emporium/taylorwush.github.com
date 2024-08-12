<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation de l'email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Destinataire de l'email
        $to = "ton-email@example.com"; // Remplace par ton adresse email

        // Sujet de l'email
        $subject = "Nouveau message de contact de " . $name;

        // Contenu de l'email
        $email_content = "Nom: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Entêtes de l'email
        $headers = "From: $email";

        // Envoi de l'email
        if (mail($to, $subject, $email_content, $headers)) {
            echo "Merci pour votre message. Je vous répondrai bientôt.";
        } else {
            echo "Une erreur est survenue. Veuillez réessayer plus tard.";
        }
    } else {
        echo "Veuillez entrer une adresse email valide.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
