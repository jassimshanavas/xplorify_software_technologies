<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Set up your email parameters
  $to = 'xplorifycare@gmail.com'; // Replace with your email address
  $headers = "From: $name <$email>" . "\r\n";
  $headers .= "Reply-To: $email" . "\r\n";
  $messageBody = "Name: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage: $message";

  // Send the email
  $sent = mail($to, $subject, $messageBody, $headers);

  if ($sent) {
    // Email sent successfully
    echo json_encode(array('status' => 'success', 'message' => 'Your message has been sent. Thank you!'));
  } else {
    // Failed to send email
    echo json_encode(array('status' => 'error', 'message' => 'Oops! Something went wrong. Please try again.'));
  }
}
?>
