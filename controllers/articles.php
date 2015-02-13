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
		header('Location: ' . URL . 'articles');
	}
	
	function uploadPicture() {
		$this->model->uploadPicture($_FILES);
	}

	function loadMyArticles() {
		echo $this->model->loadMyArticles($_GET);
	}
	
	function loadNewestArticles() {
		echo $this->model->loadNewestArticles($_GET);
	}
}