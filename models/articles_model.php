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
				var_dump("publish_article!!!!!!!!");
				$statement = $this->db->prepare('INSERT INTO artikel (titel, verfasser_id, text, veroeffentlicht) VALUE (:titel, :verfasser_id, :text, :veroeffentlicht)');
				$statement->execute(array(
					':titel' => $data['titel'],
					':verfasser_id' => '1',	//abfragen
					':text' => $data['text'],
					':veroeffentlicht' => $date,
				));
			}
			if($data['action_type'] == "save_article") {
				var_dump("save_article!!!!!!!!");
				$statement = $this->db->prepare('INSERT INTO artikel (titel, verfasser_id, text, bearbeitet) VALUE (:titel, :verfasser_id, :text, :bearbeitet)');
				$statement->execute(array(
					':titel' => $data['titel'],
					':verfasser_id' => '1',	//abfragen
					':text' => $data['text'],
					':bearbeitet' => $date,
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
																						ORDER BY erstellt');
			
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
																						ORDER BY erstellt');
			
			$dataStatement->execute(array());
			
			$data = $dataStatement->fetchAll(PDO::FETCH_ASSOC);
			
			return json_encode($data);
		}
	}