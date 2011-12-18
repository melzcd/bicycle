<?php
include_once ('mysql.php');
//Аплоаддир
$uploaddir = "images/";
//Максимальный размер файла
$max_filesize = 1048576; //Дублируется в форме загрузки
//Размеры изображений
$thumbs[1] = array("w"=>"240", "h"=>"180");
$thumbs[2] = array("w"=>"120", "h"=>"90");
//Длинна генерируемого имени
$name_l = 6;
//Дополнение имени если оно занято - кол-во символов
$name_incrs = 1;
$invite = true;
$robot = "noreply@imgpage.ru";
$default_ar = 6;
$arMainErrors = array(
	"low_rights" => "<color=\"red\">Видимо у вас недостаточно прав.</color>",
);
?>