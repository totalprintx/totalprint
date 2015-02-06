<form action="articles/saveData" method="post">
	<label for="example1">Test</label>
	<input type="text" name="example" id="example1">
	<button type="submit">Senden</button>
</form>

<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title row">
			<div class="col-md-8">
				<div id="title"><h4><b>Artikel</b></h4></div>
			</div>
			<div class="col-md-4">
				<div class="input-group" style='float:right'>
					<form action="ecms/search_function.php" method="post" enctype="multipart/form-data" class="input-group">
						<input name="searchbox" id="searchbox" type="search" class="form-control" placeholder="Suchbegriff eingeben..." onFocus="this.value=''">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Go!</button>
						</span>
					</form>
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
					<th field="title" width="25%" sortable="true" sortable="true">Titel</th>
					<th field="author" width="10%" align="right" sortable="true">Verfasser</th>
					<th field="created" width="20%" align="center" sortable="true">Erstellt</th>
					<th field="published" width="20%" align="right" sortable="true">Veröffentlicht</th>
					<th field="lastEdited" width="20%" sortable="true">Zuletzt bearbeitet</th>
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
	
