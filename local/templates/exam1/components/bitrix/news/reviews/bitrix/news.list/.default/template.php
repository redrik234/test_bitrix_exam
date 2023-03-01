<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;
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
$this->setFrameMode(true);
Loc::loadMessages(__FILE__);
?>
<header>
	<h1><?=Loc::getMessage("REVIEWS_TITLE")?></h1>
</header>
<hr>
<div class="news-list">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?//var_dump($arItem);die;?>
		<?
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
					<?=$arItem["DISPLAY_ACTIVE_FROM"]?>, <?=$arItem["PROPERTIES"]["POSITION"]["VALUE"]?>, <?=$arItem["PROPERTIES"]["COMPANY"]["VALUE"]?>
					</span>
				</div>
				
				<div class="review-text-cont">
					<?=$arItem["PREVIEW_TEXT"];?>
				</div>
			</div>
			<div class="review-img-wrap">
				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="img">
					</a>
				<?else:?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<img src="<?=$templateFolder?>/images/no_photo.jpg" alt="img">
					</a>
				<?endif?>
			</div>
		</div>
	<?endforeach?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
