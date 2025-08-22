<?php

namespace App;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

trait CommonFunctions
{
    public function landOwnerDetailold($villageCode, $khasraNo)
    {
       
        $postFields = json_encode([
            'Village_lgcode' => $villageCode,
            'khasra' => $khasraNo
        ]);

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => 'http://localhost/sample/khasara/land_owner_details.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_HTTPHEADER => [
                'Content-Type: text/plain',
            ],
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            return response()->json(['status' => 'error', 'message' => $error]);
        }
        
        $result = json_decode($response, true);

       return $result['api_response']['data'][0] ?? [];

        
    }

    public function landOwnerDetail($villageCode, $khasraNo)
    {       

        if (empty($villageCode) || empty($khasraNo)) {
            return response()->json(['error' => 'Missing Village_lgcode or khasra'], 400);
        }

        $secret_key = 'CXAEn1YNSvK-dRH6SAOd2gCXAEn1YNSvK-dRH6SAOd2g';
        $username = 'revenue@lrc%^ptpfc';

        date_default_timezone_set('Asia/Kolkata');
        $iat = time();
        $exp = $iat + 3600; 

        $payload = [
            'RefrenceNo' => $username,
            'iat' => $iat,
            'exp' => $exp,
            'Village_lgcode' => $villageCode,
            'khasra' => $khasraNo
        ];

        try {
            $token = JWT::encode($payload, $secret_key, 'HS256');

            $api_url = "http://10.68.128.115/RestAPi/api/Revenuestay/Land_owner_Detail";

            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

            $api_payload = json_encode(['token' => $token]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $api_payload);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $error = curl_error($ch);
                curl_close($ch);
                return response()->json(['error' => "cURL Error: $error"], 500);
            }

            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $result = json_decode($response, true);

            return $result['data'][0] ?? [];            

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
