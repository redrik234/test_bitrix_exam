<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$TEMPLATE["inner.php"] = Array("name"=>Loc::GetMessage("INNER_TEMPLATE_NAME"), "sort"=>1);
?>