<?php

class DatabaseTP extends PDO
{

	public function __construct()
	{
		parent::__construct(DB_TP_TYPE.':host='.DB_TP_HOST.';dbname='.DB_TP_NAME, DB_TP_USER, DB_TP_PASS);
		$this->exec("set names utf8");
	}
}
