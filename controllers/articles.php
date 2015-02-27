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
	
	function loadArticle() {
		echo $this->model->loadArticle($_GET);
	}
	
	function saveArticle() {
		$this->model->saveArticle($_POST);
		header('Location: ' . URL . 'articles');
	}

	function loadMyArticles() {
		echo $this->model->loadMyArticles(Session::get("id"));
	}
	
	function loadNewestArticles() {
		echo $this->model->loadNewestArticles();
	}
	
	function searchArticles() {
		echo $this->model->searchArticles($_POST);
	}
}