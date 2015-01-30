<?php
	if(isset($_POST['submit']) && $_POST['submit']=="Senden"){
 		// Das Formular wurde gesendet
	}else{
 		// Das Formular muss angezeigt werden



	if(isset($_FILES['thefile']['tmp_name']) && $_FILES['thefile']['type']=="application/msword"){
 	// weiter mit der Verarbeitung
	}else{
	 	if(isset($_FILES['thefile']['tmp_name'])){
	        die("Dieses File ist kein MS-Word Dokument sondern hat den Mime-Type ".$_FILES['thefile']['type']);
	 	}else{
	        die("Kein File übertragen") 
	        // man muss hier nicht zwingenderweise abbrechen,
	        // das File kann auch freiwillig übermittelt worden sein,
	        // je nach Anforderung
 	}
}
?>