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

	function loadArticle() {
		echo $this->model->loadArticle($_GET);
	}

	function loadPictures() {
		echo $this->model->loadPictures($_GET);
	}
	
	function loadArticles() {
		echo $this->model->loadArticles($_GET);
	}
}