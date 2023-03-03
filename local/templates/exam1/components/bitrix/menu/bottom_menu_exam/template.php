<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>

<?if (!empty($arResult)):?>
	<div class="item">
		<div class="title-block"><?=Loc::getMessage("ABOUT_SHOP");?></div>
		<ul>
			<?
			foreach($arResult as $arItem):
				if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
					continue;
			?>
				<li><a href="<?=$arItem["LINK"]?>">
					<?=$arItem["TEXT"]?></a>
				</li>
			<?endforeach?>
		</ul>
	</div>
<?endif?>