<?php

/*
* Template lomakkeelle
*/

?>

<form action="/skole-mvc/public/course/insert" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Kurssin nimi</label>
    <input name="course-name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nimi">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Kurssin kuvaus</label>
    <input name="course-desc" type="text" height="2" class="form-control" id="formGroupExampleInput2" placeholder="Kuvaus">
  </div>
 <input type="submit">Lähetä</input>
</form>