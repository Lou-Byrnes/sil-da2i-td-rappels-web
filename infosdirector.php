<?php

$stmt = $bdd->prepare("SELECT idPerson FROM movieHasPerson WHERE role=\"director\"");
$stmt->execute();
$directorsId = $stmt->fetch();
foreach($directorsId as $directorId) {
        $query = $bdd->prepare("SELECT lastname, firstname FROM person WHERE id=".$directorId);
        $query->execute();
        $directors = $query->fetchAll();
        $director = $directors[0]['lastname'].' '.$directors[0]['firstname'];

        $query = $bdd->prepare("SELECT birthDate FROM person WHERE id=".$directorId);
        $query->execute();
        $birthsDate = $query->fetchAll();
        $birthDate = $birthsDate[0]['birthDate'];

        $query = $bdd->prepare("SELECT biography FROM person WHERE id=".$directorId);
        $query->execute();
        $biographies = $query->fetchAll();
        $biography = $biographies[0]['biography'];

        $query = $bdd->prepare("SELECT path FROM picture WHERE id=".$directorId);
        $query->execute();
        $paths = $query->fetchAll();
        $path = $paths[0]['path'];
}


?>
<div>
    <h2>Réalisateur du film : </h2>
    <p><?php echo $director ?></p>
    <img src="<?php echo $path ?>">
    <time>Date de naissance : <?php echo $birthDate ?></time>
    <p><?php echo $biography ?></p>
</div>
