<?php 
class Test {
	private $arOptions = array(
		"test" => 1223,
		"lol" => '123'
	);
	
	public function __get($varName) {
		if ($varName == "Opt") {
			return $this->arOptions; 
		}
	}
}

//$oTest = new Test();
$arTest = array(
	"opt1" => 1,
	"opt22" => 22
);
list($opt22) = $arTest;
print_r($a ? 12 : 11);
?>