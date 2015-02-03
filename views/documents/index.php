<!doctype html>
<html>
<head>
	<meta charset="utf-8">

	<title>Dokumentenverwaltung</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, user-scalable=no" />

	<link rel="stylesheet" href="ecms/css/filemanager.css">
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#splitcontainer").layout({ applyDemoStyles: true });
		});
	</script>

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
        		<div id="splitcontainer" class="panel-body">
        			<div id="splitleft" class="ui-layout-west"></div>
					<div id="splitright" class="ui-layout-center">
						
						<table id="tt" class="easyui-datagrid" style="width:525px;height:560px"
            				url="datagrid8_getdata.php"
            				sortName="Titel" sortOrder="asc"
            				rownumbers="false" pagination="true">
        					<thead>
            					<tr>
                					<th field="icon" width="30" sortable="true">Icon</th>
                					<th field="title" width="120" sortable="true" sortable="true">Titel</th>
					                <th field="filetype" width="50" align="right" sortable="true">Dateityp</th>
					                <th field="category" width="100" align="center" sortable="true">Kategorie</th>
					                <th field="author" width="80" align="right" sortable="true">Autor</th>
					                <th field="creationdate" width="120" sortable="true">Erstellungsdatum</th>
					            </tr>
					        </thead>
					    </table>

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
