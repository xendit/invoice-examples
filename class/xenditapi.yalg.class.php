<?php
    require $_SERVER['DOCUMENT_ROOT'].'/config/xendit.config.php';

    class XenditAPI {
        function createInvoice($external_id, $amount, $payer_email, $description) {
            $curl = curl_init();

            $headers = array();
            $headers[] = 'Content-Type: application/json';

            $url = SERVER_DOMAIN.'/v2/invoices';

            $data['external_id'] = $external_id;
            $data['amount'] = (int)$amount;
            $data['payer_email'] = $payer_email;
            $data['description'] = $description;

            $invoiceData = json_encode($data);

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERPWD, SECRET_API_KEY);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $invoiceData);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) === 'on') {
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            }

            $response = curl_exec($curl);
            $auth_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            curl_close($curl);

            $responseObject = json_decode($response, true);
            return $responseObject;
        }
    }
?>
