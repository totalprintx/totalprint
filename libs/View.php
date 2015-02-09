<?php

class View {
	function __construct() {
		$this->js = array();
		$this->systems = $this->getSystemInfo();
		$this->articles = $this->getArticles();
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
		$db = new DatabaseTP();
		$dataStatement = $db->prepare('SELECT * From systems');        
		$dataStatement->execute(array());

		$data = $dataStatement->fetchAll();

		return $data;
	}
	
	public function getArticles() {
		$db = new DatabaseEcms();
		$dataStatement = $db->prepare('SELECT * FROM artikel');
		/*$dataStatement = $db->prepare('	SELECT ecm.artikel.id, titel, CONCAT(vorname, nachname) as verfasser, erstellt, veroeffentlicht, bearbeitet 
																		FROM ecm.artikel, erp.mitarbeiter, erp.person
																		WHERE ecm.artikel.id = erp.mitarbeiter.id AND erp.mitarbeiter.person_id = erp.person.id');
		*/
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