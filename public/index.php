<?php

include '../app/views/Head.php';

require_once '../app/init.php';

$app = new App;


//Testi
/*
$sql = "SELECT id, name FROM courses";
$result = $conn->query($sql);

print_r($conn);
print_r($sql);
print_r($results);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
}
**/



//TEstit loppuu

include '../app/views/Foot.php';

?>
