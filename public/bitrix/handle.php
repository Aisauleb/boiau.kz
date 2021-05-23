<?php


$result = execRest("crm.lead.add", array(
    'fields' => array(
        "TITLE" => $_POST["name"],
        "NAME" => $_POST["name"],
        "PHONE" => array(array("VALUE" => $_POST["phone"], "VALUE_TYPE" => "WORK")),
    )
));

if (array_key_exists("result", $result)) {
    header( "Location: http://127.0.0.1:8000/" );
} else {
    header( "Location: http://127.0.0.1:8000/" );
}


function execRest($method, $params)
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


