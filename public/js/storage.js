var selectedDirID;
var dirMap = {};

$(function(){
	if($('#filemanager').length){
		getDirList();

/*		$("#uploadBtn").on('change', function () {
			$('#filesToUpload').append('<li><img src="res/remove.png"/>'+this.value+'</li>');
		});*/

	}
});

function handleRowClick(){
		var row = $('#dg_documents').datagrid('getSelected');
		var firstLink = true;
		fileList = $('#fileHistory');
		fileList.html('<center><li><img src="res/loader.gif"/></li></center>');

		if(selectedDirID == null){

			for(var key in dirMap)
			{
    			if(dirMap[key]==row['Kategorie'])
         			selectedDirID = key;
			}
		}

		if (row){
			$.ajax({
				type: "GET",
				url: "documents/resolveFileHistory",
				// url: "http://www.carteam.lvps87-230-14-183.dedicated.hosteurope.de/communities.php",
				dataType: 'json',
				data: {fileName:row['Titel'], fileExt:row['Dateityp'], dirId:selectedDirID},
				success: function(resultData) {
							fileList.html("");
							$.each(resultData, function(){
								if(firstLink){
									fileList.append('<li><a href="http://localhost/tp_storage/' + this['id'] + '" download="' + row['Titel'] + '.' + row['Dateityp'] + '"><b>' + row['Titel'] + '</b></a></li>');
									firstLink = false;
								}else{
									fileList.append('<li><a href="http://localhost/tp_storage/' + this['id'] + '" download="' + row['Titel'] + '.' + row['Dateityp'] + '">' + this['upload_date'] + '</a></li>');
								}
								
							});
					}

			});
		}
}

function getDirList(){
	$.ajax({
				type: "GET",
				url: "documents/getDirList",
				// url: "http://www.carteam.lvps87-230-14-183.dedicated.hosteurope.de/communities.php",
				dataType: 'json',
				data: "",
				success: function(resultData) {
						generateDirMap(resultData);
						fillUploadTargetList();
						generateDirList(resultData);
					}

			});
}

function generateDirMap(resultData){
	$.each(resultData, function(){
		dirMap[this.dir_id] = this.title;
	});
}

function fillUploadTargetList(){
	$.each(dirMap, function (i, val) {
		$('#uploadTargetDir').append('<option value="'+ i +'">' + val + '</option>');
	});
}

function toggleDir(id){
	$('#' + id).find("ul:first").toggle();
	$('#' + id).find("a:first img").attr("src", ($('#' + id).find("ul:first").is(':hidden') ? 'res/plus.png' : 'res/minus.png'));
}

function loadFiles(id){
	selectedDirID = id;
	checkSelectedDir();
	$("#dg_documents").datagrid({

									onClickRow:function(){
										handleRowClick();
									},

									method:"POST",
									queryParams: { dirId: selectedDirID},
									url:"documents/fillDataGrid"});
}

function checkSelectedDir(){
	$.each($('#dirlist').find("li a"), function() {
		if(this.parentElement.id == selectedDirID){
			this.id = "selectedDir";
		} else {
			this.removeAttribute('id');
		}
	});
}

function generateDirList(resultData){
	//Dir Ordnung
	while(true){
		var tempArr = [];

		$.each(resultData, function(){
			if(this.parent_id == null){
				$('#dirlist').append('<li id="'+this.dir_id+'"><a href="#">'+this.title+'</a></li>');
			} else if($('#' + this.parent_id).length) {

				if($('#' + this.parent_id + ':has(ul)').length){
					$('#' + this.parent_id).find("ul:first").append('<li id="'+this.dir_id+'"><a href="#">'+this.title+'</a></li>');
				} else {
					$('#' + this.parent_id)
						.append('<ul><li id="'+this.dir_id+'"><a href="#">'+this.title+'</a></li></ul>');
				}

			} else {
				tempArr.push(this);
			}
		});

		resultData = tempArr;
		if(resultData.length<=0)
			break;
	}

	//Toggle
	$('#dirlist').find("li:has(ul)").find("a:first")
		.click(function(event){
			if(this == event.target){
				toggleDir(this.parentElement.id);
				loadFiles(this.parentElement.id);
			}
		})
		.prepend('<img src="res/plus.png"/> ')
		.parent().find("ul:first").hide();

	//others
	$('#dirlist').find("li:not(:has(ul))").find("a")
		.click(function(event){
			if(this == event.target){
				loadFiles(this.parentElement.id);
			}
		})
		.prepend('<img src="res/dot.png"/> ');
}

function deleteFile(){
	var row = $('#dg_documents').datagrid('getSelected');
	if(confirm("Datei " + row['Titel'] + "." + row['Dateityp'] + " wirklich löschen?")){
		$.ajax({
				type: "GET",
				url: "documents/deleteFile",
				// url: "http://www.carteam.lvps87-230-14-183.dedicated.hosteurope.de/communities.php",
				dataType: 'json',
				data: {fileName:row['Titel'], fileExt:row['Dateityp'], dirId:selectedDirID},
				success: function(resultData) {
						$('#dg_documents').datagrid('reload');	
					}

			});
	}
}

function deleteDir(){
	if(confirm("Verzeichnis " + dirMap[selectedDirID] + " und Inhalt löschen? (Unterordner bleiben erhalten)")){
		$.ajax({
				type: "GET",
				url: "documents/deleteDir",
				// url: "http://www.carteam.lvps87-230-14-183.dedicated.hosteurope.de/communities.php",
				dataType: 'json',
				data: {dirId:selectedDirID},
				success: function(resultData) {
						window.location.reload();
					}

			});
	}
}

function createDir(){
	var dirName = prompt("Verzeichnis erstellen");
	if (dirName != null) {
		$.ajax({
				type: "GET",
				url: "documents/createDir",
				// url: "http://www.carteam.lvps87-230-14-183.dedicated.hosteurope.de/communities.php",
				dataType: 'json',
				data: {dirName:dirName, parentId: selectedDirID},
				success: function(resultData) {
						window.location.reload();	
					}

			});
	}
}

function renameDir(){
	var dirName = prompt("Verzeichnis umbenennen", dirMap[selectedDirID]);
	if (dirName != null) {
		$.ajax({
				type: "GET",
				url: "documents/renameDir",
				// url: "http://www.carteam.lvps87-230-14-183.dedicated.hosteurope.de/communities.php",
				dataType: 'json',
				data: {dirName:dirName, dirId: selectedDirID},
				success: function(resultData) {
						window.location.reload();	
					}

			});
	}
}