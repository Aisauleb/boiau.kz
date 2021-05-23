<?php
$result = execRest("crm.deal.list", array(
    'filter' => array(
        "UF_CRM_6040B5826946B" => $_POST["login"],
        "UF_CRM_1614742505" => $_POST["password"]),
    'select' => array(
        "TITLE",
        "UF_CRM_6040B5826946B", // - login
        "UF_CRM_1614742505", // - password
        "CONTACT_ID",
        "UF_CRM_1614742472",// - общая сумма
        //Платеж №1
        "UF_CRM_60409BB5737A8", // - первая сумма
        "UF_CRM_1616151869",// - первая оплата
        "UF_CRM_1615359159032",// - дата первой оплаты
        "UF_CRM_1615547945",// - статус (1, 0)
        //Платеж №2
        "UF_CRM_60409BB581DF6", // - вторая сумма
        "UF_CRM_1616151883",// - вторая оплата
        "UF_CRM_1615359173143",// - дата второй оплаты
        "UF_CRM_1615547972"// - статус (1, 0)
    )
));

if($result['total'] == 0){
    echo json_encode(array('success' => 0, "message" => "Not Found"));
}else{
    $array = array(
        "login" => $result["result"][0]["UF_CRM_6040B5826946B"], // - login
        "password" => $result["result"][0]["UF_CRM_1614742505"], // - password
        "full_name" => $result["result"][0]["TITLE"],
        "overall" => $result["result"][0]["UF_CRM_1614742472"],// - общая сумма
        //Платеж №1
        "first_pay" => $result["result"][0]["UF_CRM_60409BB5737A8"], // - первая сумма
        "first_bill" => $result["result"][0]["UF_CRM_1616151869"],// - первая оплата
        "first_pay_date" => date("Y-m-d", strtotime($result["result"][0]["UF_CRM_1615359159032"])),// - дата первой оплаты
        "first_paid" => date("Y-m-d", strtotime($result["result"][0]["UF_CRM_1615547945"])), // - дата поступления первой оплаты
        "first_ispaid" => strlen($result["result"][0]["UF_CRM_1615547945"]) != 0? 1 : 0,// - статус (1, 0)
        //Платеж №2
        "second_pay" => $result["result"][0]["UF_CRM_60409BB581DF6"], // - вторая сумма
        "second_bill" => $result["result"][0]["UF_CRM_1616151883"],// - вторая оплата
        "second_pay_date" => date("Y-m-d", strtotime($result["result"][0]["UF_CRM_1615359173143"])),// - дата второй оплаты
        "second_paid" => date("Y-m-d", strtotime($result["result"][0]["UF_CRM_1615547972"])), // - дата поступления второй оплаты
        "second_ispaid" => strlen($result["result"][0]["UF_CRM_1615547972"]) != 0? 1 : 0// - статус (1, 0)
    );

    echo json_encode(array('success' => 1, "message" => $array));
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
