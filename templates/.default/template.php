<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php
extract( $arResult );
?>
<?php if((isset($_GET['id']))||(isset($_GET['ID']))){ 
foreach($infoList as $tableelem){
if($tableelem['id'] == $_GET['id']){	
?>
<div class="elm">
<img src="<?php echo $tableelem['imgfull']['src'];?>" />
<h2><?php echo $tableelem['infoname']; ?></h2>
<span class="small"><?php echo $tableelem['newsDate']; ?></span>
<div class="fulltext"><?php echo $tableelem['fulltext']; ?></div>
</div>
<br>
<?php
$APPLICATION->IncludeComponent(
	"domrftest:dmrftestcomments", 
	".default", 
	array(
		"AJAX_MODE" => "Y",
		"CACHE_PERIOD" => "0",
		"HLBCODE" => $tableelem['hlblockid'],
		"ID" => $tableelem['id'],
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);
 ?>
<?php }}} else {?>
<?php foreach($infoList as $tableelem){ ?>
<div class="elm">
<h2><a href="?id=<?php echo $tableelem['id']; ?>"><?php echo $tableelem['infoname']; ?></a></h2>
<img src="<?php echo $tableelem['imgprvw']['src'];?>" /><br>
<span class="small"><?php echo $tableelem['newsDate']; ?></span>
<div class="preview"><?php echo $tableelem['preview']; ?></div>
</div>
<?php }} ?>
