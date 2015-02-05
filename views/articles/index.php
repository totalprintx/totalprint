<script></script>

<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="panel-title row">
			<div class="col-lg-6">
				<div id="title"><h4><b>Artikel</b></h4></div>
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
						Datum
					</th>
					<th>
						Titel
					</th>
					<th>
						Verfasser
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
	
