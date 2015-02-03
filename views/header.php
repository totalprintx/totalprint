<!doctype html>
<html>
<head>
	<meta charset="utf-8">

	<title>ECM</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, user-scalable=no" />

	<link rel="stylesheet" href="public/css/basic.css">
	<script type="text/javascript" src="public/js/basic.js"></script>

	<!-- Sripte -->
	<?php 
		foreach ($this->js as $key => $value) {
			echo '<script type="text/javascript" src="' . URL . 'public/js/' . $value. '"></script>';
		}
	?>
	
	<script type="text/javascript" src="libs/jquery/jquery-1.4.4.min.js"></script>
  <script type="text/javascript" src="libs/jquery/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="libs/jquery/jquery.js"></script>
	<script type="text/javascript" src="libs/jquery/jquery.layout.js"></script>
	
</head>
<body>
	<?php Session::init(); ?>
	<nav class="navbar navbar-default">
        <div class="navbar-header">
	        <button type="button" class="system-change navbar-toggle collapsed">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
	    </div>
        <div id="navbar" class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
            	<li class="active"><a href="articles">Artikel</a></li>
            	<li><a href="documents">Dokumente</a></li>
	        </ul>
	        <ul class="nav navbar-nav navbar-right">
	        	<li><a href="/profile">Profil</a></li>
	        </ul>
    	</div><!--/.nav-collapse -->
	</nav>
	<div class="system-nav">
		<ul>
			<?php foreach ($this->systems as $key => $value) {
				echo '<li><a href="'. $value["link"] .'" title="'. $value["name"] .'">'. $value["shortcut"] .'</a></li>';
			} ?>
		</ul>
	</div>
	<div class="container">