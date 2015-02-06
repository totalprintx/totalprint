<link type="text/css" rel="stylesheet" href="public/css/popup.css"/>
<script src="public/js/popup.js"></script>
<script src="public/js/article.js"></script>

<!-- MARKTITUP -->
<script type="text/javascript" src="public/MarkItUp/markitup/jquery.markitup.js"></script>
<script type="text/javascript" src="public/MarkItUp/markitup/sets/default/set.js"></script>
<link rel="stylesheet" type="text/css" href="public/MarkItUp/markitup/skins/markitup/style.css" />
<link rel="stylesheet" type="text/css" href="public/MarkItUp/markitup/sets/default/style.css" />

<form action="articles/saveData" method="post">
	<label for="example1">Test</label>
	<input type="text" name="example" id="example1">
	<button type="submit">Senden</button>
</form>

<form action="articles/saveArticle" method="post">
    <!-- OPEN POPUP -->
    <button><a href="#" class="popup_oeffnen">Popup &ouml;ffnen</a></button>

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
                    <div class="col-sm-9 col-md-6 col-lg-8"><textarea name="text"></textarea></div>

                    <div class="col-sm-3 col-md-6 col-lg-4">Bilder</div>
                    <div class="col-sm-9 col-md-6 col-lg-8">
                        <!--<form enctype="multipart/form-data" action="articles/savePicture" method="post">
                            <input type="hidden" name="max_file_size" value="1000">
                            <input name="thefile" type="file">
                            <input type="submit" value="senden">
                        </form>-->
                    </div>
                </div>
                <div  style="text-align:center;">
                    <button type="submit" id="publish">vero&uml;ffentlichen</button>
                </div>
        </div>
    </div>
</form>

<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title row">
			<div class="col-md-8">
				<div id="title"><h4><b>Artikel</b></h4></div>
			</div>
			<div class="col-md-4">
				<div class="col-md-4">
				<button class="btn btn-default" type="submit" style="float:right">Artikel erstellen</button>
				</div>
				<div class="col-md-8">
					<div class="input-group" style='float:right'>
						<form action="ecms/search_function.php" method="post" enctype="multipart/form-data" class="input-group">
							<input name="searchbox" id="searchbox" type="search" class="form-control" placeholder="Artikel suchen..." onFocus="this.value=''">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit">Go!</button>
							</span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="main" class="panel-body">
		<table 	id="tt" 
						class="easyui-datagrid" 
						style="width:100%;height:96%"
						url="search_function.php"
            sortName="Titel" sortOrder="asc"
            rownumbers="false" pagination="true">
      <thead>
				<tr>
					<th field="id" width="5%" sortable="true">Nr.</th>
					<th field="title" width="25%" align="left" sortable="true">Titel</th>
					<th field="author" width="10%" align="left" sortable="true">Verfasser</th>
					<th field="created" width="20%" align="left" sortable="true">Erstellt</th>
					<th field="published" width="20%" align="left" sortable="true">Veröffentlicht</th>
					<th field="lastEdited" width="20%" align="left" sortable="true">Zuletzt bearbeitet</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($this->articles as $key => $value) {
						echo '<tr><td>'.$value["id"].'</td><td>'.$value["titel"].'</td><td>'.$value["verfasser_id"].'</td><td>'.$value["erstellt"].'</td><td>'.$value["veroeffentlicht"].'</td><td>'.$value["bearbeitet"].'</td></tr>';
					} 
				?>
			</tbody>
		</table>
	</div>
</div>
	
