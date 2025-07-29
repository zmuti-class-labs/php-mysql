<?php
include 'connect_db.php';

$sqldata = "SELECT id,name,type,age FROM pets";
$result = mysqli_query($conn, $sqldata);

if (mysqli_num_rows($result)>0){

    while ($row = mysqli_fetch_assoc($result)) {
    echo "Fetched Data:<br>";
    echo "id: " . $row["id"] . " Name: " . $row["name"] . " Type: " . $row["type"] . " Age: " . $row["age"] . "<br>";
}
}else{
    echo"No results";
}

//Filter data 
$sqlFiltereddata = "SELECT id,name,type,age FROM pets WHERE type = 'Dog'";
$result = mysqli_query($conn, $sqlFiltereddata);

if (mysqli_num_rows($result)>0){

    while ($row = mysqli_fetch_assoc($result)){
        echo"Filtered Data: <br>";
        echo"id: ". $row["id"]. " Name: ". $row["name"]. " Type: ". $row["type"]. " Age: ". $row["age"]."<br>";
    }
}else{
    echo"No results";
}

//delete data
$sqldeletedata = "DELETE FROM pets WHERE id = 2";
if (mysqli_query($conn,$sqldeletedata)){
    echo"Pet Deleted :(".'<br>';
}else{
    echo"Error" .mysqli_error($conn);
}

//update data
$sqlupdatedata = "UPDATE pets SET name = 'Kahawa' WHERE id = 6";
if (mysqli_query($conn,$sqlupdatedata)){
    echo"Pet name changed";
}else{
    echo"Error" .mysqli_error($conn);
}