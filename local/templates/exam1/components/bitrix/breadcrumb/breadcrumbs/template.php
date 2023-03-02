<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(empty($arResult))

return "";

$html = '<div class="breadcrumbs-box">';
$html .= '<div class="inner-wrap">';
$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
		$html .= '<a href="' . $arResult[$index]["LINK"] . '">
					<span>' . $title . '</span>
				</a>';
	}
	else {
		$html .= '<span>' . $title . '</span>';
	}
}
$html .= '</div>';
$html .= '</div>';
return $html;
?>