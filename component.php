<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
{
    $this->AbortResultCache();
    ShowError('IBLOCK_MODULE_NOT_INSTALLED');
    return;
}

$cache_id = md5(serialize($arParams));
$cache_dir = "/dmrftest";
$obCache = new CPHPCache;

if($obCache->InitCache(3600, $cache_id, $cache_dir)){
$arResult = $obCache->GetVars();
$this->IncludeComponentTemplate();
}
elseif(CModule::IncludeModule("iblock") && $obCache->StartDataCache()){
	
global $CACHE_MANAGER;
$CACHE_MANAGER->StartTagCache($cache_dir);

$filter = array('IBLOCK_CODE' => $arParams["IBLOCK_CODE"], 'ACTIVE' => 'Y');
    if ( isset( $arParams['SHOW_FOR_INDEX'] ) ) {
        $filter['PROPERTY_in_index_VALUE'] = 'Y';
    }
				 
	
    $infoDbRes = CIBlockElement::GetList(array('SORT' => 'ASC'), $filter );
    while ( $infoEl = $infoDbRes->GetNextElement() ) {
        $infoFields = $infoEl->GetFields();
        $infoProps = $infoEl->GetProperties();
		$CACHE_MANAGER->RegisterTag("iblock_id_".$infoFields['ID']);
		$newsDate = $infoFields['DATE_CREATE'];
	
		
		
		
        $infoList[] = array(
			'id' => $infoFields['ID'],
			'hlblockid' => $arParams["HLBCODE"],
			'infoname' => $infoFields['NAME'],
			'fulltext' => $infoFields['~DETAIL_TEXT'],
			'fulltext' => $infoFields['~DETAIL_TEXT'],
			'imgprvw' => CFile::ResizeImageGet($infoFields['PREVIEW_PICTURE'], Array("width" => $arParams["SMALLIMG"], "height" => $arParams["SMALLIMG"]), BX_RESIZE_IMAGE_EXACT, false),
			'imgfull' => CFile::ResizeImageGet($infoFields['DETAIL_PICTURE'], Array("width" => $arParams["FULLIMG"], "height" => $arParams["FULLIMG"]), BX_RESIZE_IMAGE_EXACT, false),
			'preview' => trim( $infoFields['~PREVIEW_TEXT'] ),
			'newsDate' => $newsDate,
			'comments' => $commentsarray
        );
    }
	$arResult = array( 'infoList' => $infoList );
    $this->IncludeComponentTemplate();
	$CACHE_MANAGER->RegisterTag("dmrftest_new");
	$CACHE_MANAGER->EndTagCache();
	$obCache->EndDataCache($arResult);

}
