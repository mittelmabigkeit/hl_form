<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

use Bitrix\Main\Loader;

Loader::includeModule("highloadblock");

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

if (isset($_POST["name"]) && isset($_POST["phone"])) {
    $hlbl = 4; // Указываем ID нашего highloadblock блока к которому будет делать запросы.
    $hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch();

    $entity = HL\HighloadBlockTable::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();

// Массив полей для добавления
    $data = array(
        "UF_USER_ID" => $_POST["user_id"],
        "UF_NAME" => $_POST["name"],
        "UF_PHONE" => $_POST["phone"],
        "UF_EMAIL" => $_POST["email"],
        "UF_COMMENT" => $_POST["comment"]
    );

    $result = $entity_data_class::add($data);

    // Формируем массив для JSON ответа
    $arRes = array(
        'user_id' => $_POST["user_id"],
        'name' => $_POST["name"],
        'phone' => $_POST["phone"],
        'email' => $_POST["email"],
        'comment' => $_POST["comment"]
    );

    // Переводим массив в JSON
    echo json_encode($arRes);
}