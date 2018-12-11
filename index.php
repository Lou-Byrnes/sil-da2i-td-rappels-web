<?php
require('getblock.php');
require('connect.php');

$stmt = $bdd->prepare("SELECT title FROM movie");
$stmt->execute();
$ids = $stmt->fetch();


$stmt = $bdd->prepare("SELECT * FROM movie");
$stmt->execute();
$movies = $stmt->fetchAll();
?>

    <?php getBlock('head.php')?>
        <main>
          <section>
            <ul>
              <?php foreach($movies as $movie){ ?>
                <li>
                  <a href="movie.php?movie=<?php echo $movie['id']; ?>"> <?php echo $movie['title'] ?> </a>
                </li>
                <?php } ?>
            </ul>
          </section>
        </main>
    <?php getBlock('footer.php'); ?>
