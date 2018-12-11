<?php
require('getblock.php');
require('connect.php');

$id = $_GET['movie'];
$stmt = $bdd->prepare("SELECT * FROM movie WHERE id=".$id);
$stmt->execute();
$res = $stmt->fetch();


      getBlock('head.php', $res);?>
        <?php getBlock('header.php'); ?>
        <main>
          <section>
            <?php getBlock('infos.php', $res); ?>
          </section>
        </main>
      <?php getBlock('footer.php'); ?>
