<?php
require('connect.php');
require('getblock.php');
getblock('head.php', $res) ?>

<body>
	<?php getblock("header.php") ?>
<main>
	<?php getblock("infosdirector.php") ?>
  <?php getBlock("filmographie.php") ?>
</main>
	<?php getblock("footer.php") ?>
</body>
</html>
