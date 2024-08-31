<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Hier die E-Mail-Adresse eintragen, an die das Formular gesendet werden soll
    $recipient = "jannikkugler2006@web.de";

    // Betreff der E-Mail
    $subject = "Neue Kontaktanfrage von $name";

    // E-Mail-Inhalt
    $email_content = "Name: $name\n";
    $email_content .= "E-Mail: $email\n\n";
    $email_content .= "Nachricht:\n$message\n";

    // E-Mail-Header
    $email_headers = "From: $name <$email>";

    // Versenden der E-Mail
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // E-Mail erfolgreich gesendet
        echo "Vielen Dank! Ihre Nachricht wurde gesendet.";
    } else {
        // E-Mail konnte nicht gesendet werden
        echo "Oops! Etwas ist schief gelaufen, und wir konnten Ihre Nachricht nicht senden.";
    }

} else {
    // Nicht POST-Anfrage
    echo "Es gab ein Problem mit Ihrer Anfrage.";
}
?>
