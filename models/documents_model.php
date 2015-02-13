<?php

	class Documents_Model extends Model {

		function searchDocuments($data) {
			$statement = $this->db->prepare('SELECT s.id as Nr, s.title as Titel, s.file_ext as Dateityp, c.title as Kategorie, s.author_id as Ersteller, s.upload_date as Erstellungsdatum FROM storage s, category c WHERE s.category_id = c.category_id AND (s.title LIKE :searchterm OR c.title LIKE :searchterm) order by upload_date ASC');

			//$statement->execute(array(':searchterm' => $data['searchbox'],));
			//$statement->execute(array(':searchterm' => "%".$data['searchterm']."%"));
			$statement->execute(array(':searchterm' => "%krank%"));
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);

			return json_encode($result);

		}

		function getDirList(){
			$statement = $this->db->prepare('SELECT * FROM directories');
			$statement->execute(array());
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			return json_encode($result);
		}
	}
