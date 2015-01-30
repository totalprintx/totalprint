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
        						<button class="btn btn-default" type="submit">Go!</button>
      						</span>
	    				</form>
    				</div>
  				</div>
  			</div>
  	 	</div>
      	<div id="main" class="panel-body">
        	<div id="tree" class="panel panel-primary">
        		<div class="panel-heading">
        			<h3 class="panel-title">Archiv</h3>
        		</div>
        		<div class="panel-body">
        			Content
        		</div>
        	</div>
        	<div id="content" class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Dateien</h3>
        		</div>
        		<div class="panel-body">
        			Content
        		</div>
        		<div id="filemanager_footer" class="panel-footer">
        			<center>
	        			<nav id="pagenav">
	    					<ul class="pagination">
	    						<li>
			      					<a href="#" aria-label="Previous">
			        					<span aria-hidden="true">&laquo;</span>
			      					</a>
			   					</li>
			    				<li class="active"><a href="#">1</a></li>
			    				<li><a href="#">2</a></li>
			    				<li><a href="#">3</a></li>
			    				<li><a href="#">4</a></li>
			    				<li><a href="#">5</a></li>
			    				<li>
			      					<a href="#" aria-label="Next">
			        					<span aria-hidden="true">&raquo;</span>
			      					</a>
			    				</li>
			    			</ul>
						</nav>
					</center>
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
