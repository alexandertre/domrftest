<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"AJAX_MODE" => array(),
		"HLBCODE"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "ID Highload блока",
            "TYPE"      =>  "STRING",
            "DEFAULT"   =>  ""
        ),
		"IBLOCK_CODE"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "Код инфоблока новостей",
            "TYPE"      =>  "STRING",
            "DEFAULT"   =>  ""
        ),
		"SMALLIMG"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "Размер изображения в списке новостей",
            "TYPE"      =>  "STRING",
            "DEFAULT"   =>  "128"
        ),
		"FULLIMG"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "Размер изображения в детальной новости",
            "TYPE"      =>  "STRING",
            "DEFAULT"   =>  "512"
        ),
	),
);
?>


