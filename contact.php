<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Send email to admin
    $to_admin = "anshulchauhan2004@gmail.com";
    $subject_admin = "New Contact Us Form Submission From Your Portfolio";
    $body_admin = "Dear Anshul Chauhan,\n\nYou have received a new contact us form submission from $name;\n\nName: $name\nEmail: $email\nSubject: $subject\nMessage: $message\n\nBest regards";

    // Send confirmation email to sender
    $to_sender = $email;
    $subject_sender = "Your message has been received";
    $body_sender = "Dear $name,\n\nThank you for contacting us. We have received your message and will get back to you soon.\n\nBest regards,\nAnshul Chauhan";

    if (mail($to_admin, $subject_admin, $body_admin) && mail($to_sender, $subject_sender, $body_sender)) {
      header('Location: thank-you.html');
      exit;
    } else {
      echo "Error sending email. Please try again.";
    }
  }
?>