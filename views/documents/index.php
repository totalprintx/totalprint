<script src="public/js/filemanager.js"></script>
<div id="filemanager" class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title row">
        	<div class="col-lg-6">
				<div id="title"><h4><b>Dokumentenverwaltung</b></h4></div>
			</div>
  			<div class="col-lg-6">
    			<div class="input-group" id="searchbar">
    				<form class="input-group">
      					<input name="searchbox" id="searchbox" type="search" class="form-control" placeholder="Suchbegriff eingeben..." onFocus="this.value=''">
      					<span class="input-group-btn">
        					<a id="submitsearch" class="btn btn-default">Go!</a>
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
                    <ul id="dirlist"></ul>
                </div>
				<div id="splitright" class="ui-layout-center">
					<table      id="dg_documents" 
                                class="easyui-datagrid" 
                                style="width:100%;height:96%"
            			        sortName="Titel" 
                                sortOrder="asc"
            			        rownumbers="false" 
                                pagination="false"
                                singleSelect="true">
        				<thead>
            				<tr>
                				<th field="Nr" width="5%" sortable="true">Nr.</th>
                				<th field="Titel" width="25%" sortable="true" sortable="true">Titel</th>
					            <th field="Dateityp" width="10%" align="right" sortable="true">Dateityp</th>
					            <th field="Kategorie" width="20%" align="center" sortable="true">Kategorie</th>
					            <th field="Ersteller" width="20%" align="right" sortable="true">Ersteller</th>
					            <th field="Erstellungsdatum" width="20%" sortable="true">Erstellungsdatum</th>
					        </tr>
					    </thead>
					</table>
				</div>
        	</div>
            <script type="text/javascript">$("#splitcontainer").layout({ applyDemoStyles: true});</script>

        </div>
        <div id="options">
        	<div id="file_upload" class="panel panel-primary">
        		<div class="panel-heading">
        			<h3 class="panel-title">Upload</h3>
        		</div>
        		<div class="panel-body">
                <center>
        			<form action="documents/uploadFiles" method="post" enctype="multipart/form-data">
                        <ul id="filesToUpload">
                        </ul>
                            <!-- <input id="uploadFile" placeholder="Choose File" disabled="disabled" /> -->
                            <div class="fileUpload btn btn-primary">
                                <span>Datei auswälen</span>
                                <input id="uploadBtn" type="file" class="upload" />
                            </div>

                        <!--  <input type="file" name="fileToUpload" id="fileToUpload"> -->
                        <br/>Zielverzeichnis:<br/>
                            <select id="uploadTargetDir" name="uploadTargetDir" size="1"></select>
                        <br/>
                        <input type="submit" value="Hochladen" name="submit" class="btn btn-primary">
                    </form>
                    </center>
        		</div>
        	</div>
        	<div id="" class="panel panel-primary">
        		<div class="panel-heading">
        			<h3 class="panel-title">Datei Infos</h3>
        		</div>
        		<div class="panel-body">
                <?php 
    
        echo $this->messageBox;
?>
        			Keine Datei ausgewählt
        		</div>
        	</div>
            <div id="" class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Verzeichnis Optionen</h3>
                </div>
                <div class="panel-body">
                    <ul style="padding: 5px">
                        <li><a href="#">Neues Verzeichnis erstellen</a></li>
                        <li><a href="#">Verzeichnis verschieben</a></li>
                        <li><a href="#" onclick="deleteDir();return false;">Verzeichnis löschen</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
