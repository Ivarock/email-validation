<?php

require 'vendor/autoload.php';

use Emailvalidation\EmailvalidationClient;
use Dotenv\Dotenv;
use SendGrid\Mail\Mail;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['EMAIL_VALIDATION_API_KEY'];
$emailvalidation = new EmailvalidationClient($apiKey);
$userEmail = readline("Please enter your email: ");
$response = $emailvalidation->validate($userEmail);

if ($response['state'] === 'deliverable') {
    echo "The email address is valid and deliverable.\n";

    $email = new Mail();
    $email->setFrom($_ENV['VERIFIED_SENDER'], "Email Validator");
    $email->setSubject("Email Test");
    $email->addTo($userEmail);
    $email->addContent("text/plain", "Hello world!");

    $sendgrid = new SendGrid($_ENV['SENDGRID_API_KEY']);

    try {
        $response = $sendgrid->send($email);
        echo 'Message has been sent successfully.'
    } catch (Exception $exception) {
        echo "Message could not be sent. Error: {$exception->getMessage()}";
    }
} else {
    echo "The email address is not deliverable.\n";
}
