<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("HL форма");

$APPLICATION->AddHeadScript('/hl-form/ajax.js');
?>

    <form method="post" id="ajax_form" action="" >
        <input type="hidden" name="user_id" value="<?= $USER->GetID(); ?>">
        <input type="text" name="name" placeholder="Имя" /><br>
        <input type="text" name="phone" placeholder="Телефон" /><br>
        <input type="text" name="email" placeholder="E-mail" /><br>
        <input type="text" name="comment" placeholder="Комментарий" /><br>
        <input type="button" id="btn" value="Отправить" />
    </form>

    <div id="result_form"></div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>