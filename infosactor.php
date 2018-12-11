<?php

foreach($data as $actor){
  echo'<figure class="frame">';
  echo '<p>'.$actor['lastname'].' '.$actor['firstname'].'</p>
  <img src="'.$actor['path'].'" alt="'.$actor['legend'].'" class="img-frame " width="200" height="auto"> </img>
  <figcaption>'.$actor['legend'].'</figcaption>';
  echo '</figure>';
};
?>
