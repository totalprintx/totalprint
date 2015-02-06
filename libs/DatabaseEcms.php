<?php

class DatabaseEcms extends PDO
{

	public function __construct()
	{
		parent::__construct(DB_ECMS_TYPE.':host='.DB_ECMS_HOST.';dbname='.DB_ECMS_NAME, DB_ECMS_USER, DB_ECMS_PASS);
		$this->exec("set names utf8");
	}
}
