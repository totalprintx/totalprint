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
		<table class="table" border="1">
			<thead>
				<tr>
					<th>
						Nr.
					</th>
					<th>
						Titel
					</th>
					<th>
						Verfasser
					</th>
					<th>
						Erstellt
					</th>
					<th>
						Veröffentlicht
					</th>
					<th>
						Zuletzt bearbeitet
					</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($this->articles as $key => $value) {
						echo '<tr><td>'.$value["id"].'</td><td>'.$value["title"].'</td><td>'.$value["author"].'</td><td>'.$value["createDate"].'</td><td>'.$value["editDate"].'</td><td>'.$value["publishDate"].'</td></tr>';
					} 
				?>
			</tbody>
		</table>
	</div>
</div>
	
