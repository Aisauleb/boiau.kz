<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    //
    public function send(Request $request)
    {
        $result = ContactController::execRest("crm.lead.add", array(
            'fields' => array(
                "TITLE" => $_POST["name"],
                "NAME" => $_POST["name"],
                "PHONE" => array(array("VALUE" => $_POST["phone"], "VALUE_TYPE" => "WORK")),
            )
        ));

        return redirect()->back();

    }
    public function execRest($method, $params)
        {
            $queryUrl = 'https://boiau.bitrix24.ru/rest/1/7zztvscho2hjr3gb/' . $method . '.json';
            $queryData = http_build_query($params);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $queryUrl,
                CURLOPT_POSTFIELDS => $queryData
            ));

            $res = curl_exec($curl);
            curl_close($curl);
            return json_decode($res, true);
        }
    public function sendRequest(Request $request)
    {
        $result = ContactController::execRest("crm.lead.add", array(
            'fields' => array(
                "TITLE" => $_POST["name"],
                "NAME" => $_POST["name"],
                "UF_CRM_1621777440" => $_POST["subject"],
                "UF_CRM_1621777455" => $_POST["message"],
                "EMAIL" => array( array("VALUE" => $_POST["email"], "VALUE_TYPE" => "WORK" ) )
            )
        ));

        return redirect()->back();

    }
        public function execRest2($method, $params)
        {
            $queryUrl = 'https://boiau.bitrix24.ru/rest/1/7zztvscho2hjr3gb/' . $method . '.json';
            $queryData = http_build_query($params);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $queryUrl,
                CURLOPT_POSTFIELDS => $queryData
            ));

            $res = curl_exec($curl);
            curl_close($curl);
            return json_decode($res, true);
        }
}
