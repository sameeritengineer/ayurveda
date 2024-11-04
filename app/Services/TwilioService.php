<?php

namespace App\Services;

use Twilio\Rest\Client;
use Exception;
use Illuminate\Support\Facades\View;

class TwilioService
{
    protected $client;
    protected $twilioNumber;

    public function __construct()
    {
        $sid = env('TWILIO_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');
        $this->twilioNumber = env('TWILIO_PHONE_NUMBER');

        // Initialize Twilio client
        $this->client = new Client($sid, $authToken);
    }

    /**
     * Send an SMS message.
     *
     * @param string $recipientNumber
     * @param string $messageContent
     * @return string
     */
    public function sendSmsWithTemplate(string $recipientNumber, string $template, array $data): string
    {

        // Render the message from the Blade template
        $messageContent = View::make("sms_messages.$template", ['data' => $data])->render();

        try {
            $this->client->messages->create(
                $recipientNumber,
                [
                    'from' => $this->twilioNumber,
                    'body' => $messageContent,
                ]
            );

            return 'Message sent successfully to ' . $recipientNumber;
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
