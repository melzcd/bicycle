<?php

require_once "/incld/modules/basic_tools.php";

define("BASE_INCLUDED", true);

class Base {
	private $arOptions = Array(
		"siteName" => "Hellow world"
	);
	
	public function __construct() {
		echo 111;
	}
	
	
	
	private function loadModule($moduleName) {
		
	}
}

$SITE = new Base();
global $SITE;

?>