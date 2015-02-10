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

			$statement = $this->db->prepare('INSERT INTO artikel (titel, verfasser_id, text, veroeffentlicht) VALUE (:titel, :verfasser_id, :text, :veroeffentlicht)');
			$statement->execute(array(
				':titel' => $data['titel'],
				':verfasser_id' => '1',	//abfragen
				':text' => $data['text'],
				':veroeffentlicht' => 1,
			));
		}

		/*function savePicture($data) {
			$statement = $this->db->prepare('INSERT INTO bild (type, data) VALUE (:type, :data)');
			$statement->execute(array(
				':type' => 1,
				':data' => 1,
			));
		}*/
	}