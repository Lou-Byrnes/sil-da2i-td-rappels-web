<?php
	include('connect.php');
	$id = $_GET['movie'];
	$stmt = $bdd->prepare("SELECT idPerson FROM movieHasPerson WHERE  role = 'actor' AND idMovie=".$id);
	$stmt->execute();
	$ids = $stmt->fetchAll();
		foreach($ids as $person) {
			//var_dump($person['idPerson']);
				$query = $bdd->prepare("SELECT idPicture FROM personHasPicture WHERE idPerson=".$person['idPerson']);
				$query->execute();
				$idPictures = $query->fetchAll();
				foreach($idPictures as $idPicture){
					$query = $bdd->prepare("SELECT * FROM picture WHERE id=".$idPicture['idPicture']);
					$query->execute();
					$pictures = $query->fetch();
					//var_dump($pictures['legend']);
				echo'<figure class="frame">
					<img src="'.$pictures['path'].'" alt="'.$pictures['legend'].'" class="img-frame " width="200" height="auto"> </img>
					<figcaption>'.$pictures['legend'].'</figcaption>
				</figure>';
				}
	}

	?>
