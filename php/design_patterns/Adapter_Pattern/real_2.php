<?php

class LegacyEmailServices
{
    public function send($to, $subject, $from, $body)
    {
        echo "Sending email to $to,from $from with subject '$subject' and body '$body' using legacy email service.\n";
    }
}

interface IEmailService
{
    public function sendEmail($to, $subject, $from, $body);
}

class LegacyEmailServiceAdapter implements IEmailService
{
    private $legacyEmailService;

    public function __construct(LegacyEmailServices $legacyEmailService)
    {
        $this->legacyEmailService = $legacyEmailService;
    }

    public function sendEmail($to, $subject, $from, $body)
    {
        $this->legacyEmailService->send($to, $subject, $from, $body);
    }
}

// Client code
function sendNotification(IEmailService $emailService, $to, $subject, $from, $body)
{
    $emailService->sendEmail($to, $subject, $from, $body);
}


$legacyEmailService = new LegacyEmailServices();
$emailAdapter = new LegacyEmailServiceAdapter($legacyEmailService);

$emailAdapter->sendEmail("johnwick@example.com", "Legacy Adapter Test", "me@dogseller.com", "This is a test email.");