<?php

namespace App\Traits;

use App\Models\Doctor;
use GuzzleHttp\Client;

trait SMS {

    public function sms_message($doctor_name,$patient_name,$slot,$date,$message_format){
        $message = str_replace('{doctor_name}',$doctor_name,$message_format);
        $message = str_replace('{patient_name}',$patient_name,$message);
        $message = str_replace('{slot}',$slot,$message);
        $message = str_replace('{appointment_date}',$date,$message);
        return $message;
    }

    /**
     * @param $doctor_id...
     * @param $phone_no
     * @param $appointment_date
     * @param $slot
     *
     * @return Response
     */
    public function send_sms($doctor_id,$patient_name,$phone_no,$appointment_date,$slot){
        $doctor = Doctor::find($doctor_id);

        $client = new Client();
        $headers = [
            'Content-Type'     => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ];

        $body = [
            "auth" => [
                "acode"  => config('app.sms_code'),
                "apiKey" => config('app.sms_api_key')
            ],
            "smsInfo" => [
                "requestID" => "625adea35e914",
                "message" => $this->sms_message($doctor->name,$patient_name,$slot,$appointment_date,config('settings.appointment_sms')),
                "is_unicode" => 0,
                "masking" => "BD_EyeCareH",
                "msisdn" => "88".$phone_no,
                "transactionType" =>  "T",
                "contentID" =>  ""
            ]
        ];

        $url = 'https://sms.lpeek.com/API/sendSMS';
        $response = $client->post($url, [
            'headers'=> $headers,
            'json'   => $body,
        ]);

        return $response->getBody();
    }

    /**
     * Remove the method
     *
     * @param $doctor_id...
     * @param $phone_no
     * @param $appointment_date
     * @param $slot
     *
     * @return Response
     */
    public function doctor_send_sms($doctor_id,$patient_name,$appointment_date,$slot){
        $doctor = Doctor::find($doctor_id);

        $client = new Client();
        $headers = [
            'Content-Type'     => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ];

        $body = [
            "auth" => [
                "acode"  => config('app.sms_code'),
                "apiKey" => config('app.sms_api_key')
            ],
            "smsInfo" => [
                "requestID"       => "625adea35e914",
                "message"         => $this->sms_message($doctor->name,$patient_name,$slot,$appointment_date,config('settings.doctor_sms')),
                "is_unicode"      => 0,
                "masking"         => "BD_EyeCareH",
                "msisdn"          => "88".validPhoneNumber($doctor->mobile_no),
                "transactionType" => "T",
                "contentID"       => ""
            ]
        ];

        $url = 'https://sms.lpeek.com/API/sendSMS';
        $response = $client->post($url, [
            'headers'=> $headers,
            'json'   => $body,
        ]);

        return $response->getBody();
    }

    /**
     * @param $doctor_id
     * @param $phone_no
     * @param $appointment_date
     * @param $slot
     *
     * @return Response
     */
    public function reschedule_send_sms($doctor_id,$patient_name,$phone_no,$appointment_date,$slot){
        $doctor = Doctor::find($doctor_id);

        $client = new Client();
        $headers = [
            'Content-Type'     => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ];

        $body = [
            "auth" => [
                "acode"  => config('app.sms_code'),
                "apiKey" => config('app.sms_api_key')
            ],
            "smsInfo" => [
                "requestID" => "625adea35e914",
                "message" => "Hello ".$patient_name.", Greetings from Bangladesh Radiant Smile Dental Clinic. Your appointment rescheduled with ".$doctor->name." on ".$appointment_date." at ".$slot." is confirmed for OPD.",
                "is_unicode" => 0,
                "masking" => "BD_EyeCareH",
                "msisdn" => "88".$phone_no,
                "transactionType" =>  "T",
                "contentID" =>  ""
            ]
        ];

        $url = 'https://sms.lpeek.com/API/sendSMS';
        $response = $client->post($url, [
            'headers'=> $headers,
            'json'   => $body,
        ]);

        return $response->getBody();
    }

    /**
     * @param $doctor_id
     * @param $phone_no
     * @param $appointment_date
     * @param $slot
     *
     * @return Response
     */
    public function cancel_send_sms($doctor_id,$patient_name,$phone_no,$appointment_date,$slot){
        $doctor = Doctor::find($doctor_id);

        $client = new Client();
        $headers = [
            'Content-Type'     => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ];

        $body = [
            "auth" => [
                "acode"  => config('app.sms_code'),
                "apiKey" => config('app.sms_api_key')
            ],
            "smsInfo" => [
                "requestID" => "625adea35e914",

                "message" => "Hello ".$patient_name.", Greetings from Bangladesh Radiant Smile Dental Clinic. Your appointment with ".$doctor->name." on ".$appointment_date." at ".$slot." is cancelled.",
                "is_unicode" => 0,
                "masking" => "BD_EyeCareH",
                "msisdn" => "88".$phone_no,
                "transactionType" =>  "T",
                "contentID" =>  ""
            ]
        ];

        $url = 'https://sms.lpeek.com/API/sendSMS';

        $response = $client->post($url, [
            'headers'=> $headers,
            'json'   => $body,
        ]);

        return $response->getBody();
    }

    /**
     * @param $doctor_id
     * @param $phone_no
     * @param $appointment_date
     * @param $slot
     *
     * @return Response
     */
    public function patient_notify_sms($doctor_id,$patient_name,$phone_no,$appointment_date,$slot){
        $doctor = Doctor::find($doctor_id);

        $client = new Client();
        $headers = [
            'Content-Type'     => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ];

        $body = [
            "auth" => [
                "acode"  => config('app.sms_code'),
                "apiKey" => config('app.sms_api_key')
            ],
            "smsInfo" => [
                "requestID" => "625adea35e914",
                "message" => $this->sms_message($doctor->name,$patient_name,$slot,$appointment_date,config('settings.notification_sms')),
                "is_unicode" => 0,
                "masking" => "BD_EyeCareH",
                "msisdn" => "88".$phone_no,
                "transactionType" =>  "T",
                "contentID" =>  ""
            ]
        ];

        $url = 'https://sms.lpeek.com/API/sendSMS';
        $response = $client->post($url, [
            'headers'=> $headers,
            'json'   => $body,
        ]);

        return $response->getBody();
    }

    public function demo_sms_send($doctor_id,$patient_name,$phone_no,$appointment_date,$slot){
        $doctor = Doctor::find($doctor_id);
        $message = trim(config('settings.appointment_sms'));
        $message = stripslashes($message);
        $message = htmlspecialchars($message);

        $client = new Client();

        $api = 'Zw/E/miAaGRzL/dTFr2ac4CyNTpXsYdOuckD+KheHJ0=';
        $client_id = 'ac46e0d4-e6f4-4f97-b5dc-3dd0e2b02723';
        $sender_id = '8809638014010';
        $url = 'https://sms.novocom-bd.com/api/v2/SendSMS';

        $response = $client->request('GET', $url, [
            'query' => [
                'ApiKey'        => $api,
                'ClientId'      => $client_id,
                'SenderId'      => $sender_id,
                'MobileNumbers' => '88'.$phone_no,
                'Message'       => $this->sms_message($doctor->name,$patient_name,$slot,$appointment_date,$message)
            ],
        ]);

        return $response->getBody();
    }

}
