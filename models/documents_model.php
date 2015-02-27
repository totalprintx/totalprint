<?php

	class Documents_Model extends Model {

		function searchDocuments($data) {
			$statement = $this->db->prepare('SELECT s.id as Nr, 
													s.title as Titel, 
													s.file_ext as Dateityp, 
													c.title as Kategorie, 
													s.author_id as Ersteller, 
													s.upload_date as Erstellungsdatum 
											FROM 	storage s,
												 	category c 
											WHERE 	s.category_id = c.category_id 
											AND 	(s.title LIKE :searchterm1
											OR 		c.title LIKE :searchterm2) 
											order by upload_date ASC');

			$statement->execute(array(
										':searchterm1' => "%".$data['searchTerm']."%",
										':searchterm2' => "%".$data['searchTerm']."%",
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

		function deleteFile($data){
			$statement = $this->db->prepare('SELECT id FROM storage WHERE title = :fileName AND file_ext = :fileExt AND category_id = :dirId ORDER BY upload_date DESC');

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

		function fillDataGrid($dirId){
			$statement = $this->db->prepare('SELECT 
											s.id as Nr, 
											s.title as Titel, 
											s.file_ext as Dateityp, 
											d.title as Kategorie, 
											s.author_id as Ersteller, 
											s.upload_date as Erstellungsdatum 
								 			FROM storage s INNER JOIN directories d ON s.category_id = d.dir_id
								 			WHERE s.category_id = :dirId
											order by upload_date ASC');

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

		function uploadFiles(){
			foreach ($_FILES['filesToUpload']['name'] as $f => $name) {
				$this->uploadFile($name, $_FILES["filesToUpload"]["tmp_name"][$f]);             	 
			}
		}

		function uploadFile($file, $tmpname){
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
			$statement = $this->db->prepare('INSERT INTO storage (title, file_ext, category_id) VALUES (:filename, :fileextension, :dir)');
			
			if ($statement->execute(array(':filename' => pathinfo($file, PATHINFO_FILENAME),
											 ':fileextension' => pathinfo($file, PATHINFO_EXTENSION),
											  ':dir' => $dir))) {
				$target_file = $target_dir . $this->db->lastInsertId();
				move_uploaded_file($tmpname, $target_file);
			}
		}
	}
