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

		function getDirList(){
			$statement = $this->db->prepare('SELECT * FROM directories');
			$statement->execute(array());
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			return json_encode($result);
		}
	}
