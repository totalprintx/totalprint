<?php

	class Documents_Model extends Model {

		function searchDocuments($data) {
			$statement = $this->db->prepare('SELECT s.id, s.title, s.file_ext, c.title, s.author_id, s.upload_date as Nr., Titel, Dateityp, Kategorie, Ersteller, Erstellungsdatum
															FROM storage s, category c 
															WHERE s.category_id = c.category_id
	                  										AND (s.title LIKE '%$data['searchbox']%' 
	                  										OR c.title LIKE '%$data['searchbox']%') 
	                  										order by upload_date ASC');
			$statement->execute(array());
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			return json_encode($result);

		}
	}
