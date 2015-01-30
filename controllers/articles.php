<?php

class Articles extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->render('articles/index');
	}
	
	function details() {
		$this->view->render('articles/index');
	}	
}