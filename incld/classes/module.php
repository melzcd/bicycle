<?php 
class Module {
	private $arOptions = Array();
	private $moduleName = "Lis";
	private $arOptList = Array();
	
	public function __construct ($arOptions) {
		if (!is_array($arOptions)) {
			$arOptions = array();
		}
		foreach ($this->arOptList as $optName => $defOoptVal) {
			if (is_array($defOoptVal)) {
				$this->addOption($optName, $arOptions[$optName] ? $arOptions[$optName] : $defOoptVal["val"], $defOoptVal["ar"]);
			} else {
				$this->addOption($optName, $arOptions[$optName] ? $arOptions[$optName] : $defOoptVal);
			}
			if (array_key_exists($optName, $arOptions)) {
				$this->setOptVal($optName, $arOptions[$optName]);
			}
		}
	}
	
	private function addOption ($optionName, $defaultVal = "", $accessRights = 00) {
		if (isset($this->arOptions[$optionName])) {
			throw new Exception("Попытка создать существующию опцию $this->$moduleName:$optionName");
		}
		$this->arOptions[$optionName] = array(
			"value" => $defaultVal,
			"def_value" => $defaultVal,
			"acess_rights" => $accessRights
		);
	}
	
	public function setOptVal ($optionName, $curVal = false) {
		if (!isset($this->arOptions[$optionName])) {
			throw new Exception("Попытка задать значение несуществующей опции $this->moduleName:$optionName");
		}
		
		//TODO проверка наличия прав на установку опции
		$this->arOptions[$optionName]["val"] = $curVal;
	}
	
	public function getOptVal ($optionName) {
		//TODO проверка наличия прав на чтение опции
		if (is_array($optionName)) {
			$arReturn = array();
			foreach ($optionName as $optName) {
				if (isset($this->arOptions[$optName])) {
					$arReturn[] = $this->arOptions[$optName];
				}
			}
			return $arReturn;
		} elseif (is_string($optionName)) {
			return $this->arOptions[$optionName]["val"];
		}
		return NULL;
	}
	
	private function chkAccess2Opt ($optionName) {
		$arTrace = array_reverse(debug_backtrace());
	}
}
?>