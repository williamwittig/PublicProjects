<?php
$toEmail = "danielsvirida@gmail.com";
$fromName = "Facility List";
$fromEmail = "medfacilitylist@capulusbibemus.com";
$subject = "Facility List Suggestion";
$headers = "From: $fromName <$fromEmail>";

$message = "A new suggestion has been made for the Facility List.\n\n";
$message .= "Employee Name: $name\n";
$message .= "Email: $email\n";
$message .= "Suggestion: $suggestion";

$success = mail($toEmail, $subject, $message, $headers);

if(!$success){
echo "<p>There was a problem placing your order. Please call us at 333-222-4444</p>";
}
