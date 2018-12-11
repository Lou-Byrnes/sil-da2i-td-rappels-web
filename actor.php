<?php
require('connect.php');
require('getblock.php');
getblock('head.php', $res);
$id = $_GET['movie'];
$stmt = $bdd->prepare("SELECT DISTINCT mp.*, pp.*, p.*, pc.* FROM movieHasPerson mp
                        INNER JOIN personHasPicture pp ON mp.idPerson = pp.idPerson AND mp.role = 'actor'
                        INNER JOIN picture pc ON pp.idPicture = pc.idPicture
                        INNER JOIN movie mv ON mp.idMovie = mv.id
                        INNER JOIN person p ON mp.idPerson = p.id
                        WHERE mv.id =".$id);
$stmt->execute();
$res = $stmt->fetchAll();

?>

<body>
	<?php getblock("header.php") ?>
<main>
	<?php getblock("infosactor.php", $res) ?>
</main>
	<?php getblock("footer.php") ?>
</body>
</html>
