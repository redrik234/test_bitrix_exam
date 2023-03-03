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
$defaultImg = $templateFolder . "/images/no_photo.jpg";
?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<div class="news-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	if (!isset($arItem["PREVIEW_PICTURE"]) || empty($arItem["PREVIEW_PICTURE"]["SRC"])) {
		$arItem["PREVIEW_PICTURE"]["SRC"] = $defaultImg;
	}

	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="review-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	
		<div class="review-text">
			<div class="review-block-title">
				<span class="review-block-name">
					<a href="#"><?=$arItem["NAME"]?></a>
				</span>
				<span class="review-block-description">
					<?=$arItem["DISPLAY_ACTIVE_FROM"] . " " . Loc::getMessage("YEAR")?>, <?=$arItem["PROPERTIES"]["POSITION"]["VALUE"]?>, <?=$arItem["PROPERTIES"]["COMPANY"]["VALUE"]?>
				</span>
				<div class="review-text-cont">
					<?=$arItem["PREVIEW_TEXT"]?>
				</div>
			</div>
		</div>
		<div class="review-img-wrap">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<img src='<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>' alt="img">
			</a>
		</div>
	</div>
<?endforeach?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>