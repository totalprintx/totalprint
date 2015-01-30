<!doctype html>
<html>
<head>
	<meta charset="utf-8">

	<title>Dokumentenverwaltung</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, user-scalable=no" />

	<link rel="stylesheet" href="ecms/css/filemanager.css">
	<script type="text/javascript" src="ecms/jquery/jquery.layout-latest.js"></script>
	<script type="text/javascript" src="ecms/jquery/jquery-2.1.3.min.js"></script>

</head>
<body>
<div class="jumbotron">
	<div id="filemanager" class="panel panel-primary">
        <div class="panel-heading">
        	<div class="panel-title row">
        		<div class="col-lg-6">
					<div id="title"><h4><b>Dokumentenverwaltung</b></h4></div>
				</div>
  				<div class="col-lg-6">
    				<div class="input-group" id="searchbar">
    					<form action="ecms/search_function.php" method="post" enctype="multipart/form-data" class="input-group">
      						<input name="searchbox" id="searchbox" type="search" class="form-control" placeholder="Suchbegriff eingeben..." onFocus="this.value=''">
      						<span class="input-group-btn">
        						<button class="btn btn-default" type="submit">Go!<!-- <i class="icon-search" title="Search"></i> --></button>
      						</span>
	    				</form>
    				</div>
  				</div>
  			</div>
  	 	</div>
      	<div id="main" class="panel-body">
        	<div id="explorer" class="panel panel-primary">
        		<div class="panel-heading">
        			<h3 class="panel-title">Dateiexplorer</h3>
        		</div>
        		<div class="panel-body container">
        			<div class="row">
						<div class="col-sm-6" id="tree">Content</div>
						<div class="col-sm-6" id="content">Content</div>
					</div>
        		</div>
        	</div>
        	<div id="options">
        		<div id="file_upload" class="panel panel-primary">
        			<div class="panel-heading">
        				<h3 class="panel-title">Upload</h3>
        			</div>
        			<div class="panel-body">
        				Content
        			</div>
        		</div>
        		<div id="file_details" class="panel panel-primary">
        			<div class="panel-heading">
        				<h3 class="panel-title">Details</h3>
        			</div>
        			<div class="panel-body">
        				Content
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
</body>
</html>
