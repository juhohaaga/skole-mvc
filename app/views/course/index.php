<?php

/*
* Kurssin perus-view, template yksittäiselle kurssille
*/

?>
<p><a href="/skole-mvc/public/home/index/" class="btn btn-primary">Takaisin</a></p>

<div class="card">
   <div class="card-body">
    <h4 class="card-title"><?php echo $data['name']; ?></h4>
    <span class="badge badge-pill badge-primary">ID: <?php echo $data['cid']; ?></span>
    <p class="card-text">

      <?php echo $data['desc']; ?>
    </p>
    <a href="/skole-mvc/public/course/delete/<?php echo $data['cid']; ?>" class="btn btn-primary">Poista</a>
  </div>
</div>
