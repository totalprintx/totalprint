<?php

class Chat extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->render('chat/index');
	}
	
	function details() {
		$this->view->render('chat/index');
	}	
}