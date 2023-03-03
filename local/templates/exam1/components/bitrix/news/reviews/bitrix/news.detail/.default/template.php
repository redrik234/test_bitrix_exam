<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$this->setFrameMode(true);
?>

<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
			<?=$arResult["DETAIL_TEXT"];?>
		</div>
		<div class="review-autor">
			<?=$arResult["NAME"]?>, 
			<?=$arResult["DISPLAY_ACTIVE_FROM"] . " " . Loc::getMessage("YEAR")?>, 
			<?=$arResult["PROPERTIES"]["POSITION"]["VALUE"]?>, 
			<?=$arResult["PROPERTIES"]["COMPANY"]["VALUE"]?>
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap">
		<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="img">
	</div>
</div>
<div class="exam-review-doc">
	<p>Документы:</p>
	<?foreach ($arResult["PROPERTIES"]["DOCUMENTS"]["VALUE"] as $fileId):?>
	<?
		$fileInfo = CFile::GetFileArray($fileId);	
	?>
	<div  class="exam-review-item-doc">
		<img class="rew-doc-ico" src="<?=$templateFolder?>/images/pdf_ico_40.png">
		<a href="<?=$fileInfo['SRC']?>"><?=$fileInfo['FILE_NAME']?></a>
	</div>
	<?endforeach?>
</div>
<hr>
<a href="<?=$arResult["LIST_PAGE_URL"]?>" class="review-block_back_link"> &larr; <?=Loc::getMessage("BACK_TO_LIST")?></a>