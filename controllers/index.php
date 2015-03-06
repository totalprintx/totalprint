<?php

class Index extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		Session::set("loggedIn", true);
		Session::set("user_id", 1);
		if(Session::get("loggedIn") != true){
		//	header('location:http://lvps87-230-14-183.dedicated.hosteurope.de/login');
		}
	}
	
	function index() {
		$this->view->render('index/index');
	}
	
	function details() {
		$this->view->render('index/index');
	}	
}