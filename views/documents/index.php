<div id="filemanager" class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title row">
        	<div class="col-lg-6">
				<div id="title"><h4><b>Dokumentenverwaltung</b></h4></div>
			</div>
            <!-- action="documents/searchDocuments" method="post" enctype="multipart/form-data" -->
  			<div class="col-lg-6">
    			<div class="input-group" id="searchbar">
    				<form class="input-group">
      					<input name="searchbox" id="searchbox" type="search" class="form-control" placeholder="Suchbegriff eingeben..." onFocus="this.value=''">
      					<span class="input-group-btn">
        					<button id="submitsearch" class="btn btn-default" type="submit">Go!</button>
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
        		<div id="splitleft" class="ui-layout-west">
                    
                </div>
				<div id="splitright" class="ui-layout-center">
					<table      id="tt" 
                                class="easyui-datagrid" 
                                style="width:100%;height:96%"
                                url=""
            			        sortName="Titel" 
                                sortOrder="asc"
            			        rownumbers="false" 
                                pagination="false">
        				<thead>
            				<tr>
                				<th field="Nr." width="5%" sortable="true">Nr.</th>
                				<th field="Titel" width="25%" sortable="true" sortable="true">Titel</th>
					            <th field="Dateityp" width="10%" align="right" sortable="true">Dateityp</th>
					            <th field="Kategorie" width="20%" align="center" sortable="true">Kategorie</th>
					            <th field="Ersteller" width="20%" align="right" sortable="true">Autor</th>
					            <th field="Erstellungsdatum" width="20%" sortable="true">Erstellungsdatum</th>
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
        	<div id="" class="panel panel-primary">
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
