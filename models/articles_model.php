<?php

	class Articles_Model extends Model {
		function saveData($data) {
			$statement = $this->db->prepare('INSERT INTO artikel_bild (artikel_id, bild_id) VALUE (:artikel_id, :bild_id)');
			$statement->execute(array(
				':artikel_id' => 1,
				':bild_id' => 1,
			));
		}


		function saveArticle($data) {
			$date = new DateTime();
			$date = $date->format('Y-m-d');
			var_dump("expression articles_model");
			if($data['action_type'] == "publish_article") {
				$statement = $this->db->prepare('INSERT INTO artikel (titel, verfasser_id, text, veroeffentlicht, rubrik, ort) VALUE (:titel, :verfasser_id, :text, :veroeffentlicht, :rubrik, :ort)');
				$statement->execute(array(
					':titel' => $data['titel'],
					':verfasser_id' => '1',	//abfragen
					':text' => $data['text'],
					':veroeffentlicht' => $date,
					':rubrik' => $data['rubrik'],
					':ort' => $data['ort'],
				));
			}
			if($data['action_type'] == "save_article") {
				$statement = $this->db->prepare('INSERT INTO artikel (titel, verfasser_id, text, bearbeitet, rubrik, ort) VALUE (:titel, :verfasser_id, :text, :bearbeitet, :rubrik, :ort)');
				$statement->execute(array(
					':titel' => $data['titel'],
					':verfasser_id' => '1',	//abfragen
					':text' => $data['text'],
					':bearbeitet' => $date,
					':rubrik' => $data['rubrik'],
					':ort' => $data['ort'],
				));
			}
			// picture upload 1
			var_dump($_FILES['userfile1']['size']);
			if($_FILES['userfile1']['size'] > 0) {
				$fileName = $_FILES['userfile1']['name'];
				$tmpName = $_FILES['userfile1']['tmp_name'];
				$fileSize = $_FILES['userfile1']['size'];
				$fileType = $_FILES['userfile1']['type'];
			
				$fp = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);
			
				if(!get_magic_quotes_gpc())
				{
				$fileName = addslashes($fileName);
				}
			
				$statement = $this->db->prepare('INSERT INTO bild (name, size, type, content) VALUE (:name, :size, :type, :content)');
				$statement->execute(array(
				':name' => $fileName,
				':size' => $fileSize,
				':type' => $fileType,
				':content' => $content,
				));
			} 
			// picture upload 2
			if($_FILES['userfile2']['size'] > 0) {
				$fileName = $_FILES['userfile2']['name'];
				$tmpName = $_FILES['userfile2']['tmp_name'];
				$fileSize = $_FILES['userfile2']['size'];
				$fileType = $_FILES['userfile2']['type'];
			
				$fp = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);
			
				if(!get_magic_quotes_gpc())
				{
				$fileName = addslashes($fileName);
				}
			
				$statement = $this->db->prepare('INSERT INTO bild (name, size, type, content) VALUE (:name, :size, :type, :content)');
				$statement->execute(array(
				':name' => $fileName,
				':size' => $fileSize,
				':type' => $fileType,
				':content' => $content,
				));
			} 

			// picture upload 3
			if($_FILES['userfile3']['size'] > 0) {
				$fileName = $_FILES['userfile3']['name'];
				$tmpName = $_FILES['userfile3']['tmp_name'];
				$fileSize = $_FILES['userfile3']['size'];
				$fileType = $_FILES['userfile3']['type'];
			
				$fp = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);
			
				if(!get_magic_quotes_gpc())
				{
				$fileName = addslashes($fileName);
				}
			
				$statement = $this->db->prepare('INSERT INTO bild (name, size, type, content) VALUE (:name, :size, :type, :content)');
				$statement->execute(array(
				':name' => $fileName,
				':size' => $fileSize,
				':type' => $fileType,
				':content' => $content,
				));
			} 
		}

		/*function savePicture($data) {
			$statement = $this->db->prepare('INSERT INTO bild (type, data) VALUE (:type, :data)');
			$statement->execute(array(
				':type' => 1,
				':data' => 1,
			));
		}*/
		
		function loadNewestArticles() {
			$dataStatement = $this->db->prepare('	SELECT ecm.artikel.id, titel, ecm.artikel.verfasser_id, CONCAT(vorname, nachname) as verfasser, erstellt, veroeffentlicht, bearbeitet 
																						FROM ecm.artikel
																						LEFT JOIN erp.mitarbeiter
																						ON ecm.artikel.verfasser_id = erp.mitarbeiter.id
																						LEFT JOIN erp.person 
																						ON erp.mitarbeiter.person_id = erp.person.id
																						ORDER BY erstellt
																						DESC
																						LIMIT 0,50' );
			
			$dataStatement->execute(array());
			
			$data = $dataStatement->fetchAll(PDO::FETCH_ASSOC);
			
			return json_encode($data);
		}
		
		function loadMyArticles() {
			$dataStatement = $this->db->prepare('	SELECT ecm.artikel.id, titel, ecm.artikel.verfasser_id, CONCAT(vorname, nachname) as verfasser, erstellt, veroeffentlicht, bearbeitet 
																						FROM ecm.artikel
																						LEFT JOIN erp.mitarbeiter
																						ON ecm.artikel.verfasser_id = erp.mitarbeiter.id
																						LEFT JOIN erp.person 
																						ON erp.mitarbeiter.person_id = erp.person.id
																						WHERE ecm.artikel.verfasser_id = 1
																						ORDER BY erstellt
																						DESC
																						LIMIT 0,50');
			
			$dataStatement->execute(array());
			
			$rows = $dataStatement->fetchAll(PDO::FETCH_ASSOC);
			
			return json_encode($rows);
		}
		
		function searchArticles($data) {
			$dataStatement = $this->db->prepare('	SELECT ecm.artikel.id, titel, ecm.artikel.verfasser_id, CONCAT(vorname, nachname) as verfasser, erstellt, veroeffentlicht, bearbeitet 
																						FROM ecm.artikel
																						LEFT JOIN erp.mitarbeiter
																						ON ecm.artikel.verfasser_id = erp.mitarbeiter.id
																						LEFT JOIN erp.person 
																						ON erp.mitarbeiter.person_id = erp.person.id
																						WHERE ecm.artikel.verfasser_id = 1 AND ecm.artikel.titel LIKE :searchTerm
																						ORDER BY erstellt
																						DESC');
			$dataStatement->execute(array(
															':searchTerm' => "%".$data['searchTerm']."%",
															));
			$rows = $dataStatement->fetchAll(PDO::FETCH_ASSOC);
			
			return json_encode($rows);
		}
	}