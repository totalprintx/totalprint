<!doctype html>
<html>
<head>
	<title>Projektname</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, user-scalable=no" />

	<link rel="stylesheet" href="http://lvps87-230-14-183.dedicated.hosteurope.de/public/css/basic.css">
	<script type="text/javascript" src="http://lvps87-230-14-183.dedicated.hosteurope.de/public/js/basic.js"></script>


	<!-- Sripte -->
	<?php 
		foreach ($this->js as $key => $value) {
			echo '<script type="text/javascript" src="' . URL . 'public/js/' . $value. '"></script>';
		}
	?>
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
            	<li class="active"><a href="example1">Example 1 (active)</a></li>
            	<li><a href="#example2">Example 2</a></li>
            	<li><a href="<?php echo URL ?>chat">Chat</a></li>
            	<li class="dropdown">
	              	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Example Dropdown <span class="caret"></span></a>
	              	<ul class="dropdown-menu" role="menu">
		                <li><a href="#">Example 1</a></li>
		                <li><a href="#">Example 2</a></li>
		                <li><a href="#">Example 3</a></li>
		                <li class="divider"></li>
		                <li><a href="#">Example 4</a></li>
	             	</ul>
	            </li>
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