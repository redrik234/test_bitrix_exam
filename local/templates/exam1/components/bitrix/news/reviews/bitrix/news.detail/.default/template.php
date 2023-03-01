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

<!-- set meta data-->
<?
$APPLICATION->SetPageProperty("keywords", "лучшие, отзывы, " . $arResult["PROPERTIES"]["COMPANY"]["VALUE"]);
$APPLICATION->SetPageProperty("description", $arResult["PREVIEW_TEXT"]);
?>

<?//var_dump($arResult["PROPERTIES"]["FILES"]["VALUE"]);die;?>
<div class="news-detail">
	<header>
		<?$APPLICATION->SetTitle(Loc::getMessage("REVIEW") . " - " . $arResult["NAME"] . " - ". $arResult["PROPERTIES"]["COMPANY"]["VALUE"]);?>
		<h1><?=$APPLICATION->GetTitle()?></h1>
		<?$APPLICATION->SetPageProperty('title', Loc::getMessage("REVIEW") . " - " . $arResult["NAME"]);?>
	</header>
	<hr>
	<div class="review-block">
		<div class="review-text">
			<div class="review-text-cont">
				<?=$arResult["DETAIL_TEXT"]?>
			</div>
			<div class="review-autor">
				<?
				$authorInfo = Array();
				if ($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]) {
					$authorInfo[] = $arResult["NAME"];
				}

				if ($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]) {
					$authorInfo[] = $arResult["DISPLAY_ACTIVE_FROM"];
				}
				 
				if (isset($arResult["PROPERTIES"]) && isset($arResult["PROPERTIES"]["POSITION"])) {
					$authorInfo[] = $arResult["PROPERTIES"]["POSITION"]["VALUE"];
				}
				 
				if (isset($arResult["PROPERTIES"]) && isset($arResult["PROPERTIES"]["COMPANY"])) {
					$authorInfo[] = $arResult["PROPERTIES"]["COMPANY"]["VALUE"];
				}
				?>
				<?=implode(", ", $authorInfo)?>
			</div>
		</div>
		<div style="clear: both;" class="review-img-wrap">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
				<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="img">
			<?else:?>
				<img src="<?=$templateFolder?>/images/no_photo.jpg" alt="img">
			<?endif?>
		</div>
	</div>
	<?if (isset($arResult["PROPERTIES"]) 
		&& isset($arResult["PROPERTIES"]["FILES"])
		&& !empty($arResult["PROPERTIES"]["FILES"]["VALUE"])):?>
		<div class="exam-review-doc">
			<p><?=Loc::getMessage("DOCUMENTS")?>:</p>
			<?foreach ($arResult["PROPERTIES"]["FILES"]["VALUE"] as $fileId):?>
				<?$fileInfo = CFile::GetFileArray($fileId);?>
				<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=$templateFolder?>/images/pdf_ico_40.png">
					<a href="<?=$fileInfo["SRC"];?>"><?=$fileInfo["ORIGINAL_NAME"];?></a>
				</div>
			<?endforeach?>
		</div>
	<?endif?>
	<hr>
</div>
