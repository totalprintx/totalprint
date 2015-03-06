<?php 

	class Documents_Model extends Model {

		function searchDocuments($data) {
			$statement = $this->db->prepare('SELECT s.id as Nr, 
													s.title as Titel, 
													s.file_ext as Dateityp, 
													d.title as Kategorie, 
													s.author_id as Ersteller, 
													s.upload_date as Erstellungsdatum 
											FROM 	storage s,
												 	directories d 
											WHERE 	s.category_id = d.dir_id 
											AND 	(s.title LIKE :searchterm1
											OR 		d.title LIKE :searchterm2
											OR 		s.upload_date LIKE :searchterm3) 
											order by upload_date ASC');

			$statement->execute(array(
										':searchterm1' => "%".$data['searchTerm']."%",
										':searchterm2' => "%".$data['searchTerm']."%",
										':searchterm3' => "%".$data['searchTerm']."%",
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($rows);

		}

		function resolveFileHistory($data){
			$statement = $this->db->prepare('SELECT id, upload_date FROM storage WHERE title = :fileName AND file_ext = :fileExt AND category_id = :dirId ORDER BY upload_date DESC');

			$statement->execute(array(
										':fileName' => $data['fileName'],
										':fileExt' => $data['fileExt'],
										':dirId' => $data['dirId'],
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($rows);
		}

		function fillDataGrid($dirId){
			$statement = $this->db->prepare('SELECT DISTINCT Nr, Titel, Dateityp, Kategorie, Ersteller, Erstellungsdatum
												FROM (SELECT
														ecm.storage.id as Nr, 
														ecm.storage.title as Titel, 
														ecm.storage.file_ext as Dateityp, 
														ecm.directories.title as Kategorie, 
														CONCAT(erp.person.vorname, " ", erp.person.nachname) as Ersteller, 
														ecm.storage.upload_date as Erstellungsdatum 
											 			FROM ecm.storage 
														INNER JOIN ecm.directories ON ecm.storage.category_id = ecm.directories.dir_id
														LEFT JOIN erp.mitarbeiter
														ON ecm.storage.author_id = erp.mitarbeiter.id
														LEFT JOIN erp.person 
														ON erp.mitarbeiter.person_id = erp.person.id
											 			WHERE ecm.storage.category_id = 16
											 			ORDER BY ecm.storage.upload_date DESC) AS res
												GROUP BY Titel
												ORDER BY Titel ASC');

			$statement->execute(array(
										':dirId' => $dirId,
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($rows);

		}

		function getDirList(){
			$statement = $this->db->prepare('SELECT * FROM directories');
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			return json_encode($result);
		}

		function uploadFiles($authorId){
			foreach ($_FILES['filesToUpload']['name'] as $f => $name) {
				$this->uploadFile($name, $_FILES["filesToUpload"]["tmp_name"][$f], $authorId);             	 
			}
		}

		function uploadFile($file, $tmpname, $authorId){
			$target_dir = "../tp_storage/";

			$dir = $_POST['uploadTargetDir'];


			// if everything is ok, try to upload file
			/*if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			        header('Location: storage.php');
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			        header('Location: storage.php?message=Sorry, there was an error uploading your file.');
			}
			*/

			//DB
			$statement = $this->db->prepare('INSERT INTO storage (title, file_ext, category_id, author_id) VALUES (:filename, :fileextension, :dir, :authorId)');
			
			if ($statement->execute(array(':filename' => pathinfo($file, PATHINFO_FILENAME),
											 ':fileextension' => pathinfo($file, PATHINFO_EXTENSION),
											  ':dir' => $dir,
											  ':authorId' => $authorId,
											  ))) {
				$target_file = $target_dir . $this->db->lastInsertId();
				move_uploaded_file($tmpname, $target_file);
			}
		}

		function deleteFile($data){
			$statement = $this->db->prepare('SELECT id FROM storage WHERE title = :fileName AND file_ext = :fileExt AND category_id = :dirId');

			$statement->execute(array(
										':fileName' => $data['fileName'],
										':fileExt' => $data['fileExt'],
										':dirId' => $data['dirId'],
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {
				$id = $row['id'];
				$statement = $this->db->prepare('DELETE FROM storage WHERE id = :fileId');
				$statement->execute(array(
										':fileId' => $id,
									));

				unlink("../tp_storage/" . $id);
			}

			return json_encode(true);
		}

		function deleteDir($dirId){
			//file db drop - unlink
			$statement = $this->db->prepare('SELECT id FROM storage WHERE category_id = :dirId');

			$statement->execute(array(
										':dirId' => $dirId,
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

			if($rows){
				foreach ($rows as $row) {
					unlink("../tp_storage/" . $row['id']);
				}
			}

			$statement = $this->db->prepare('DELETE FROM storage WHERE category_id = :dirId');
			$statement->execute(array(
										':dirId' => $dirId,
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

			//child dir parent = parent
			$statement = $this->db->prepare('SELECT parent_id FROM directories WHERE dir_id = :dirId');

			$statement->execute(array(
										':dirId' => $dirId,
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
			$parentId = $rows[0]['parent_id'];
			
			$statement = $this->db->prepare('UPDATE directories SET parent_id = :parentId WHERE parent_id = :dirId');

			$statement->execute(array(
										':parentId' => $parentId,
										':dirId' => $dirId,
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

			//dir drop
			$statement = $this->db->prepare('DELETE FROM directories WHERE dir_id = :dirId');

			$statement->execute(array(
										':dirId' => $dirId,
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

			return json_encode(true);
		}

		function createDir($data){
			if(isset($data['parentId'])){
				$statement = $this->db->prepare('INSERT INTO directories (title, parent_id) VALUES (:dirName, :parentId)');

				$statement->execute(array(
											':dirName' => $data['dirName'],
											':parentId' => $data['parentId'],
										));
				$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
			}else{
				$statement = $this->db->prepare('INSERT INTO directories (title) VALUES (:dirName)');

				$statement->execute(array(
											':dirName' => $data['dirName'],
										));
				$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
			}

			return json_encode($rows);
		}

		function renameDir($data){

			$statement = $this->db->prepare('UPDATE directories SET title = :dirName WHERE dir_id = :dirId');

			$statement->execute(array(
										':dirName' => $data['dirName'],
										':dirId' => $data['dirId'],
									));
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

			return json_encode($rows);
		}

	}
