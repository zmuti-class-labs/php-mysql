<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "petshop";

$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL to create pets table
$sqlPets = "CREATE TABLE IF NOT EXISTS pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    age INT NOT NULL
);";

// SQL to create adoption table
$sqlAdoption = "CREATE TABLE IF NOT EXISTS adoption (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    pet_id INT NOT NULL,
    adoption_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (pet_id) REFERENCES pets(id)
);";

// Run the queries
if (
    mysqli_query($conn, $sqlPets) &&
    mysqli_query($conn, $sqlAdoption)
) {
    echo "All tables created successfully.".'<br>';
} else {
    echo "Error: " . mysqli_error($conn);
}
/*
//insert data
$sqlAddPets = "INSERT INTO pets(id,name,type,age)
VALUES ('002', 'Bosco', 'Dog', '5')";
if (mysqli_query($conn,$sqlAddPets)){
    echo"Pets added".'<br>';
}else{
    echo"Error".$sqlAddPets.'<br>'.mysqli_error($conn);
}

//select data
$sqldata = "SELECT id,name,type,age FROM pets";
$result = mysqli_query($conn, $sqldata);

if (mysqli_num_rows($result)>0){

    while ($row = mysqli_fetch_assoc($result)){
        echo"id: ". $row["id"]. " Name: ". $row["name"]. " Type: ". $row["type"]. " Age: ". $row["age"]."<br>";
    }
}else{
    echo"No results";
}

//Filter data 
$sqlFiltereddata = "SELECT id,name,type,age FROM pets WHERE type = 'Dog'";
$result = mysqli_query($conn, $sqlFiltereddata);

if (mysqli_num_rows($result)>0){

    while ($row = mysqli_fetch_assoc($result)){
        echo"id: ". $row["id"]. " Name: ". $row["name"]. " Type: ". $row["type"]. " Age: ". $row["age"]."<br>";
    }
}else{
    echo"No results";
}

//delete data
$sqldeletedata = "DELETE FROM pets WHERE id = 2";
if (mysqli_query($conn,$sqldeletedata)){
    echo"Pet Deleted :(";
}else{
    echo"Error" .mysqli_error($conn);
}

//delete data
$sqlupdatedata = "UPDATE pets SET name = 'Bosco' WHERE id = 4";
if (mysqli_query($conn,$sqlupdatedata)){
    echo"Pet name changed";
}else{
    echo"Error" .mysqli_error($conn);
}

mysqli_close($conn); */
?>
