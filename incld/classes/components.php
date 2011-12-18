<?php
require_once("/incld/classes/module.php");

if (!defined("BASE_INCLUDED")) {
	die;
}

class Component implements Module {
	private $arResult;
	private $arOptList = array(
		"componentsFolder" => array("/incld/comp/", 09),
		"componentFileName" => "comp.php",
		"nsSeporator" => ":",
		"nsPattern" => "^[a-z0-9]+$",
		"templateFolders" => array(
			"template/",
			"/templates/"
		)
	);
	
	public function __construct($componentName, $arParams, $arOptions = array()) {
		$this->$moduleName = "Компоненты модели";
		foreach ($this->arOptList as $optName => $defOoptVal) {
			if (is_array($defOoptVal)) {
				$this->addOption($optName, $arOptions[$optName] ? $arOptions[$optName] : $defOoptVal["val"], $defOoptVal["ar"]);
			} else {
				$this->addOption($optName, $arOptions[$optName] ? $arOptions[$optName] : $defOoptVal);
			}
		}
		parent::__construct($arOptions);
		$this->includeComponent($componentName, $arParams);
	}
	
	private function includeComponent($componentName, $arParams) {
		$compFileName = $this->resolveComponentName($componentName);
		$this->arResult = function ($incFile, $arParams) use ($compFileName, $arParams) {
			include ($incFile);
			return $arResult;
		};
	}
	
	private function resolveComponentName($componentName) {
		list ($nsSep, $nsPattern, $compFolder) = $this->getOptVal(array("nsSeporator", "nsPattern", "componentsFolder"));
		$arComponentName = explode($nsSep, $componentName);
		if (count($arComponentName) == 2) {
			foreach ($arComponentName as $folrdName) {
				if (!preg_match($pattern, $folrdName)) {
					throw new Exception("Неверное имя компонента $componentName");
				}
			}
		} else {
			throw new Exception("Неверное имя компонента $componentName");
		}
		return $compFolder . "/" . $arComponentName[0] . "/" . $arComponentName[1] . "/" . $this->arOptions["componentFileName"];		
	}
	
	private function includeComponentTemplate($templateName) {
		
	}
}
?>