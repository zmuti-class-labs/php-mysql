<?php
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'connect_db.php';

$sqlAddPets = "INSERT INTO pets(name, type, age) 
VALUES ('Bosco', 'Dog', 5),
('Max', 'Dog', 3),
('Luna', 'Cat', 2),
('Milo', 'Cat', 4),
('Kiwi', 'Parrot', 1),
('Noodle', 'Snake', 6)";

if (mysqli_query($conn, $sqlAddPets)) {
    echo "Pet added<br>";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
