<?php

namespace Modules\UserModule\Repositories;

use GuzzleHttp\Client;


trait UserRepoHelper
{
    public function getRandomCode()
    {
        return rand(100000, 999999);
    }

    public function sendSmsActivationCode($number, $code)
    {
        $this->sanitizePhoneNumber($number);

        $message = "use $code to verify your account";

        $this->sendSmsOverService($number, $message);

        return true;
    }

    protected function sanitizePhoneNumber(&$number)
    {
        $number = str_replace("+(", "", $number);
        $number = str_replace("-", "", $number);
        $number = str_replace(")", "", $number);
        $number = str_replace(" ", "", $number);

        return $number;
    }

    protected function sendSmsOverService($number, $message)
    {
        $client = new Client;

        $sms_url = '';
        $sms_key = '';
        $sms_password = '';
        $sms_sender = '';

        $response = $client->request('POST', $sms_url,
            [
                'form_params' =>
                    [
                        'username' => $sms_key,
                        'password' => $sms_password,
                        'sender' => $sms_sender,
                        'mobile' => $number,
                        'message' => $message
                    ]
            ]
        );
        $body = json_decode((string)$response->getBody());
        return $body;
    }
}
