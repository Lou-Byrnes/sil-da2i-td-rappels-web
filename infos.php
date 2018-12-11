<?php
	include('connect.php');
	$stmt = $bdd->prepare("SELECT idPerson FROM movieHasPerson WHERE idMovie=".$data['id']);
	$stmt->execute();
	$ids = $stmt->fetchAll();
	$mainactors = '';
	foreach($ids as $person) {
				$query = $bdd->prepare("SELECT lastname, firstname FROM person WHERE id=".$person['idPerson']);
				$query->execute();
				$res = $query->fetchAll();
				$mainactor .= $res[0]['lastname'].' '.$res[0]['firstname'].', ';
	}
	$stmt = $bdd->prepare("SELECT * FROM movie WHERE id=".$data['id']);
	$stmt->execute();
	$result = $stmt->fetch();
	$synopsis = $result['synopsis'];

	$rating = $result['rating'];
?>

<div>
  <h1><?php echo $data['title'] ?></h1>
  <p><?php echo $data['title'] ?> was released on <time datetime="<?php echo $data['releaseDate'] ?>"><?php echo $data['releaseDate'] ?></time>.</p>
</div>

<div>
    <h2>Acteurs principaux :</h2>
    <div>
        <p> Les acteurs principaux sont  <?php echo $mainactor ?> ...</p>
    </div>
</div>
<div>
    <h2>Synopsis : </h2>
    <div>
      <p>
        <?php echo $synopsis?> <br/>
         Ce film est noté <meter min="0" max="5" value="<?php echo $rating?>"></meter>
      </p>
    </div>
</div>
<div class="full-width">
								<h1> Présentation des acteurs : </h1><br/>
								<?php  getblock('frame.php') ?>
</div>
