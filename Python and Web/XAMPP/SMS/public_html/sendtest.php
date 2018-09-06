<?php
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACd2effd7143ba125d7915740c105b7207';
$auth_token = 'a7e06746cc16fad92f9576237cfd68ab';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+16479516502";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+16475485493',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+16475485493',
    array(
        'from' => $twilio_number,
        'body' => 'Second Message'
    )
);
