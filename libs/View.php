<?php

class View {
	function __construct() {
		$this->js = array();
		$this->systems = $this->getSystemInfo();
	}

	public function render($name, $noInclude = false)
	{
		if ($noInclude == true) {
			require 'views/' . $name . '.php';	
		}
		else {
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';	
		}
	}
	public function getSystemInfo() {
		$db = new Database();
        $dataStatement = $db->prepare
            ('SELECT * From systems');        
        $dataStatement->execute(array());

        $data = $dataStatement->fetchAll();

        return $data;
	}

	public function checkIfActivePage($requestUri)
	{
		// TODO: create dynamic function
		preg_match('@^(?:/projekte/k-k/)?([^/]+)@i',
	    	$_SERVER['REQUEST_URI'], $match);

	    if ($match['1'] == $requestUri)
	        echo 'active';
	}
}