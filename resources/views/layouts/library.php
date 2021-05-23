<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

$arSelect = Array(
    "ID",
    "NAME",
    "PREVIEW_TEXT"
);

$arFilter = Array(
    Array(
        "IBLOCK_ID" => 8,
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => "Y"
    ),
    Array(
        "IBLOCK_ID" => 9,
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => "Y"
    ),
    Array(
        "IBLOCK_ID" => 10,
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => "Y"
    ),
    Array(
        "IBLOCK_ID" => 11,
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => "Y"
    ),
    Array(
        "IBLOCK_ID" => 13,
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => "Y"
    ),
    Array(
        "IBLOCK_ID" => 14,
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => "Y"
    )
);

$link = Array(
    14 => "extra_files",
    13 => "state_and_municipal_administration",
    11 => "economy",
    10 => "jurisprudence",
    9 => "information_system",
    8 => "menedzhment"
);

$arr = Array();

foreach ($arFilter as $key) {
    # code...

    $res = CIBlockElement::GetList(
        Array(),
        $key,
        false,
        Array("nPageSize"=>50),
        $arSelect
    );

    while($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arr[$link[$key["IBLOCK_ID"]]][] = Array(
            "name" => $arFields['NAME'],
            "memory" => $arFields['PREVIEW_TEXT'],
            "link" => "https://vuzedu.com/library/".$link[$key["IBLOCK_ID"]]."/assets/" . $arFields['NAME']
        );
    }

}
if(count($arr)>0){
    echo json_encode(array("success" => 1, "message" => $arr));
}
else{
    echo json_encode(array("success" => 0, "message" => "not found"));
}

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');
?>
