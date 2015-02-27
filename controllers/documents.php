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

	function getDirList() {
		echo $this->model->getDirList();
	}

	function uploadFiles(){
/*		if(!$this->model->uploadFiles()){
			$this->view->messageBox = "test";
		}
		$this->view->messageBox = "test";*/
		$this->model->uploadFiles();
		header('Location: ' . URL . 'documents');
	}

	function resolveFileHistory(){
		echo $this->model->resolveFileHistory($_GET);
	}

	function fillDataGrid(){
		echo $this->model->fillDataGrid($_POST['dirId']);
	}

	function deleteFile(){
		echo $this->model->deleteFile($_GET);
	}
}