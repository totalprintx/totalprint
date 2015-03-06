<link type="text/css" rel="stylesheet" href="public/css/popup.css"/>
<script src="public/js/popup.js"></script>
<script src="public/js/article.js"></script>

<!-- MARKTITUP -->
<script type="text/javascript" src="public/MarkItUp/markitup/jquery.markitup.js"></script>
<script type="text/javascript" src="public/MarkItUp/markitup/sets/default/set.js"></script>
<link rel="stylesheet" type="text/css" href="public/MarkItUp/markitup/skins/markitup/style.css" />
<link rel="stylesheet" type="text/css" href="public/MarkItUp/markitup/sets/default/style.css" />

<form action="articles/saveArticle" method="post" enctype="multipart/form-data">
	<div id="popup">
		<div id="popup_inhalt">
			<div class="schliessen" style="padding-top:4px">X</div>
			
				<h2 align="center">Artikel erstellen</h2>
					<div class="row">
						<div class="col-sm-3 col-md-6 col-lg-4">Titel</div>
						<div class="col-sm-9 col-md-6 col-lg-8"><input name="titel" type="text" style="width:100%; margin-bottom: 2px;"></div>
						
						<div class="col-sm-3 col-md-6 col-lg-4">Verfasser</div>
						<div class="col-sm-9 col-md-6 col-lg-8"><input name="verfasser" type="text" style="width:100%; margin-bottom: 2px;"></div>

						<div class="col-sm-3 col-md-6 col-lg-4">Rubrik</div>
						<div class="col-sm-9 col-md-6 col-lg-8"><input name="rubrik" type="text" style="width:100%; margin-bottom: 2px;"></div>

						<div class="col-sm-3 col-md-6 col-lg-4">Ort des Geschehens</div>
						<div class="col-sm-9 col-md-6 col-lg-8"><input name="ort" type="text" style="width:100%; margin-bottom: 2px;"></div>

						<div class="col-sm-3 col-md-6 col-lg-4">Text</div>
						<div class="col-sm-9 col-md-6 col-lg-8"><textarea id="markItUp" name="text"></textarea></div>

						<div class="col-sm-3 col-md-6 col-lg-4">Bilder</div>
						<div class="col-sm-9 col-md-6 col-lg-8">
							<input type="hidden" name="max_file_size" value="1000000">
							<input name="userfile1" type="file" id="userfile1" style="margin-bottom: 2px;">
							<input type="hidden" name="max_file_size" value="1000000">
							<input name="userfile2" type="file" id="userfile2" style="margin-bottom: 2px;"> 
							<input type="hidden" name="max_file_size" value="1000000">
							<input name="userfile3" type="file" id="userfile3">
						</div>
					</div>
					</br>
					<div style="text-align:center;">
						<button type="submit" id="publish_article" name="action_type" value="publish_article">ver&ouml;ffentlichen</button>
						<button type="submit" id="save_article" name="action_type" value="save_article">speichern</button>
					</div>
		</div>
	</div>
</form>


<form action="articles/updateArticle" method="post" enctype="multipart/form-data">
	<div id="popup_edit">
		<div id="popup_inhalt_edit">
			<div class="schliessen_edit" style="padding-top:4px">X</div>
			<h2 align="center">Artikel bearbeiten</h2>
		
			<div class="row">
				<div class="col-sm-3 col-md-6 col-lg-4">Titel</div>
				<div class="col-sm-9 col-md-6 col-lg-8"><input id="titel_edit" name="titel_edit" type="text" style="width:100%; margin-bottom: 2px;"></div>
				
				<div class="col-sm-3 col-md-6 col-lg-4">Verfasser</div>
				<div class="col-sm-9 col-md-6 col-lg-8"><input id="verfasser_edit" name="verfasser_edit" type="text" style="width:100%; margin-bottom: 2px;"></div>

				<div class="col-sm-3 col-md-6 col-lg-4">Rubrik</div>
				<div class="col-sm-9 col-md-6 col-lg-8"><input id="rubrik_edit" name="rubrik_edit" type="text" style="width:100%; margin-bottom: 2px;"></div>

				<div class="col-sm-3 col-md-6 col-lg-4">Ort des Geschehens</div>
				<div class="col-sm-9 col-md-6 col-lg-8"><input id="ort_edit" name="ort_edit" type="text" style="width:100%; margin-bottom: 2px;"></div>

				<div class="col-sm-3 col-md-6 col-lg-4">Text</div>
				<div class="col-sm-9 col-md-6 col-lg-8"><textarea id="markItUp2" name="text_edit"></textarea></div>

				<div><input id="id" name="id" type="hidden"></div>

				<div class="col-sm-3 col-md-6 col-lg-4">Bilder</div>
				<div class="col-sm-9 col-md-6 col-lg-8">
					<input id="picture1" style="background-color:#FFFFFF; border: 0px solid #FFFFFF; margin-bottom: 2px;"> </br>
					<input id="picture2" style="background-color:#FFFFFF; border: 0px solid #FFFFFF; margin-bottom: 2px;"> </br>
					<input id="picture3" style="background-color:#FFFFFF; border: 0px solid #FFFFFF;"> </br>
					<input type="hidden" name="max_file_size" value="1000000">
					<input name="userfile1" type="file" id="userfile1" style="margin-bottom: 2px;">
					<input type="hidden" name="max_file_size" value="1000000">
					<input name="userfile2" type="file" id="userfile2" style="margin-bottom: 2px;"> 
					<input type="hidden" name="max_file_size" value="1000000">
					<input name="userfile3" type="file" id="userfile3">
				</div>
			</div>
			</br>
			<div style="text-align:center;">
				<button type="submit" id="publish_article" name="action_type" value="publish_article">ver&ouml;ffentlichen</button>
				<button type="submit" id="save_article" name="action_type" value="save_article">speichern</button>
			</div>
		</div>
	</div>
</form>




<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title row">
			<div class="col-md-1">
				<div id="title"><h4><b>Artikel</b></h4></div>
			</div>
		</div>
	</div>
	<div id="main" class="panel-body" style="height:auto">
		<style>
			.chooser {
				cursor: pointer;
				size: 5;
				font-weight: bold;
			}
		</style>
		
		<div class="row">
			<div class="col-md-6">
				<div class="chooser" id="chooser_newestArticles" align="right" style="color:#337AB7">Neueste Artikel</div>
			</div>
				
			<div class="col-md-6">
				<div class="chooser" id="chooser_myArticles" style="color:grey">Meine Artikel</div>
			</div>
		</div>
		
		<div class="row" style="padding-top:20px">
			<div class="col-md-2">
				<button id="btn_article_create" class="btn btn-default article_create" type="submit">Neuen Artikel erstellen</button>
			</div>
			<div class="col-md-2">
				<button id="btn_article_edit" class="btn btn-default article_edit" type="submit" style="float:left">Artikel bearbeiten</button>
			</div>
		
			<div class="col-md-8">
				<div class="input-group" style='width:100%;float:right'>
					<form enctype="multipart/form-data" class="input-group">
						<select id="select_column" class="form-control" style="width:20%;height:34px;float:right;z-index:0;">
							<option value="id">Nr.</option>
							<option value="titel" selected="selected">Titel</option>
							<option value="verfasser">Verf.</option>
							<option value="rubrik">Rubrik</option>
							<option value="ort">Ort</option>
							<option value="erstellt">Erstellt</option>
							<option value="veroeffentlicht">Veröffentlicht</option>
							<option value="bearbeitet">Zuletzt bearbeitet</option>
						</select>
						<input name="searchbox" id="searchbox" style="width:50%;height:34px;float:right;z-index:0;" class="form-control" placeholder="Durchsuchen..." onFocus="this.value=''">
						<span class="input-group-btn">
							<a id="btn_search" class="btn btn-default" style="width:50px;height:34px">Go!</a>
						</span>
					</form>
				</div>
			</div>
		</div>
		
		<table 	id="dg_articles" 
						class="easyui-datagrid" 
						style="width:100%"
						url="articles/loadArticles"
						method="get"
						rownumbers="false" pagination="false"
						singleSelect="true">
      <thead>
				<tr>
					<th field="id" width="5%" 							sortable="true">Nr.</th>
					<th field="titel" width="20%" 					sortable="true">Titel</th>
					<th field="verfasser" width="15%" 			sortable="true">Verfasser</th>
					<th field="rubrik" width="10%" 					sortable="true">Rubrik</th>
					<th field="ort" width="10%" 						sortable="true">Ort</th>
					<th field="erstellt" width="14%" 				sortable="true">Erstellt</th>
					<th field="veroeffentlicht" width="14%" sortable="true">Veröffentlicht</th>
					<th field="bearbeitet" width="14%" 			sortable="true">Zuletzt bearbeitet</th>
				</tr>
			</thead>			
		</table>
	</div>
</div>
	
