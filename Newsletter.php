<?php

//include("index.html");
if (isset($_POST["email"])  && isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $_POST["email"] = htmlspecialchars($_POST["email"]);

    $file = 'email_newsletter.csv';

    // Create or open the CSV file in append mode
    $fp = fopen($file, 'a');

    // Write form data to the CSV file
    fputcsv($fp, array($_POST["email"]));

    // Close the CSV file
    fclose($fp);

    // Email configuration
    $today = date("Ymd");
    $to = 'contact@naistoitoname.fr';
    $subject = 'Nouveaux emails pour la Newsletter';
    $message = 'Hello voici les nouveaux mails pour la newsletter. Tu peux ouvrir le fichier avec bloc note ou excel et copier/coller les mails directement dans les destinataires de ta newsletter';
    $from = 'contact@naistoitoname.fr';

    // Headers for attachment
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

    // Read the file content and encode it into base64
    $fileContent = file_get_contents($file);
    $encodedContent = chunk_split(base64_encode($fileContent));

    // Email body with attachment
    $body = "--boundary\r\n";
    $body .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n";
    $body .= "$message\r\n";
    $body .= "--boundary\r\n";
    $body .= "Content-Type: text/csv; name=\"$today-$file\"\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$today-$file\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= "$encodedContent\r\n";
    $body .= "--boundary--";

    mail($to, $subject, $body, $headers);
    // Send email with attachment

   /* if (mail($to, $subject, $message, $headers)) {
        echo "<p>Email sent successfully with the CSV file attachment.</p>";
    } else {
        echo("Failed to send email");
    }*/
    header('Location: /');
}
