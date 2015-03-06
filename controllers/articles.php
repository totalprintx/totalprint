<?php

class Articles extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		if(Session::get("loggedIn") == false){
			header('location:http://lvps87-230-14-183.dedicated.hosteurope.de/login');
		}
	}
	
	function index() {
		$this->view->render('articles/index');
	}
	
	function details() {
		$this->view->render('articles/index');
	}
	
	function saveData() {
		$this->model->saveData($_POST);
		header('Location: ' . URL . 'articles');
	}
	
	function saveArticle() {
		$this->model->saveArticle($_POST);
		header('Location: ' . URL . 'articles');
	}

	function loadArticle() {
		echo $this->model->loadArticle($_GET);
	}

	function loadPictures() {
		echo $this->model->loadPictures($_GET);
	}
	
	function loadArticles() {
		if(isset($_GET['verfasser_id']) && $_GET['verfasser_id'] == 0)
			$_GET['verfasser_id'] = Session::get('user_id');
		echo $this->model->loadArticles($_GET);
	}

	function getStaff() {
		echo $this->model->getStaff($_GET);
	}
}