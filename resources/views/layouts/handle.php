<?php

$result = execRest("crm.lead.add", array(
    'fields' => array(
        "TITLE" => $_POST["fname"],
        "NAME" => $_POST["fname"],
        "PHONE" => array( array("VALUE" => $_POST["fnumber"], "VALUE_TYPE" => "WORK" ) ),
        "EMAIL" => array( array("VALUE" => $_POST["femail"], "VALUE_TYPE" => "WORK" ) )
    )
));

if(array_key_exists("result", $result)){
    echo json_encode(array('success' => 1, "message" => $result));
}
else{
    echo json_encode(array('success' => 0, "message" => $result));
}



function execRest($method, $params) {
    $queryUrl = 'https://newton-edu.bitrix24.kz/rest/7/iulczedd14dosrw8/'.$method.'.json';
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

?>
