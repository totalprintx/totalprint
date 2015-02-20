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
	
	function saveData() {
		$this->model->saveData($_POST);
		header('Location: ' . URL . 'articles');
	}
	
	function saveArticle() {
		$this->model->saveArticle($_POST);
		//header('Location: ' . URL . 'articles');
	}
	
	function uploadPicture() {
		var_dump("articles works");
		$this->model->uploadPicture($_POST);
	}

	function loadMyArticles() {
		echo $this->model->loadMyArticles($_GET);
	}
	
	function loadNewestArticles() {
		echo $this->model->loadNewestArticles($_GET);
	}
	
	function searchArticles() {
		echo $this->model->searchArticles($_POST);
	}
}