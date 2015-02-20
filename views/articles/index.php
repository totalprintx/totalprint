<link type="text/css" rel="stylesheet" href="public/css/popup.css"/>
<script src="public/js/popup.js"></script>
<script src="public/js/article.js"></script>

<!-- MARKTITUP -->
<script type="text/javascript" src="public/MarkItUp/markitup/jquery.markitup.js"></script>
<script type="text/javascript" src="public/MarkItUp/markitup/sets/default/set.js"></script>
<link rel="stylesheet" type="text/css" href="public/MarkItUp/markitup/skins/markitup/style.css" />
<link rel="stylesheet" type="text/css" href="public/MarkItUp/markitup/sets/default/style.css" />

<form action="articles/saveArticle" method="post">
    <div id="popup">
    
        <div class="schliessen">X</div>
        
        <div id="popup_inhalt">
            <h2 align="center">Artikel erstellen</h2>
                <div class="row">
                    <div class="col-sm-3 col-md-6 col-lg-4">Titel</div>
                    <div class="col-sm-9 col-md-6 col-lg-8"><input name="titel" type="text" style="width:100%;"></div>
                    
                    <div class="col-sm-3 col-md-6 col-lg-4">Verfasser</div>
                    <div class="col-sm-9 col-md-6 col-lg-8"><input name="verfasser" type="text" style="width:100%;"></div>

                    <div class="col-sm-3 col-md-6 col-lg-4">Text</div>
                    <div class="col-sm-9 col-md-6 col-lg-8"><textarea id="markItUp" name="text"></textarea></div>

                    <div class="col-sm-3 col-md-6 col-lg-4">Bilder</div>
                    <div class="col-sm-9 col-md-6 col-lg-8">
                    <form action="articles/uploadPicture" method="submit" enctype="multipart/form-data">
                        <input type="hidden" name="max_file_size" value="10000">
                        <input name="thefile" type="file">
                        <input type="submit" name="userfile" value="hochladen">
                    </form>
                    </div>
                </div>
                <div  style="text-align:center;">
                    <button type="submit" id="publish_article" name="action_type" value="publish_article">ver&ouml;ffentlichen</button>
                    <button type="submit" id="save_article" name="action_type" value="save_article">speichern</button>
                </div>
        </div>
    </div>
</form>

<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title row">
		
			<div class="col-md-3">
				<div id="title"><h4><b>Artikel</b></h4></div>
			</div>
			
			<div class="col-md-6">
				<div class="col-md-6">
					<button id="btn_article_edit" class="btn btn-default" type="submit" style="float:right">Artikel bearbeiten</button>
				</div>
				<div class="col-md-6">
					<!-- OPEN POPUP -->
					<button id="btn_article_create" class="btn btn-default popup_oeffnen" type="submit">Neuen Artikel erstellen</button>
				</div>
			</div>
			
			<div class="col-md-3">
				<div class="input-group" style='float:right'>
					<form enctype="multipart/form-data" class="input-group">
						<input id="searchbox" class="form-control" placeholder="Artikel suchen..." onFocus="this.value=''">
						<span class="input-group-btn">
							<a id="btn_search" class="btn btn-default">Go!</a>
						</span>
					</form>
				</div>
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
		
		<div class="col-md-6">
			<div class="chooser" id="chooser_newestArticles" align="right" style="color:#337AB7">Neueste Artikel</div>
		</div>
		
		<div class="col-md-6">
			<div class="chooser" id="chooser_myArticles" style="color:grey">Meine Artikel</div>
		</div>
		
		<table 	id="dg_articles" 
						class="easyui-datagrid" 
						style="width:100%"
						url="articles/loadNewestArticles"
						method="get"
						rownumbers="false" pagination="false"
						singleSelect="true">
      <thead>
				<tr>
					<th field="id" width="5%" sortable="true">Nr.</th>
					<th field="titel" width="40%" sortable="true">Titel</th>
					<th field="verfasser" width="19%" sortable="true">Verfasser</th>
					<th field="erstellt" width="12%" sortable="true">Erstellt</th>
					<th field="veroeffentlicht" width="12%" sortable="true">Veröffentlicht</th>
					<th field="bearbeitet" width="12%" sortable="true">Zuletzt bearbeitet</th>
				</tr>
			</thead>			
		</table>
	</div>
</div>
	
