<?php

class Documents extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->render('documents/index');
	}
	
	function details() {
		$this->view->render('documents/index');
	}

	function searchDocuments() {
		echo $this->model->searchDocuments($_POST);
	}	
}