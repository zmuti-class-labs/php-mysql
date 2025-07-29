<?php
session_start();
include 'connectdb.php';

$action = $_POST['action'] ?? '';

if ($action === 'signup') {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (fullname, email, password) VALUES ('$name', '$email', '$pass')";
    if (mysqli_query($conn, $query)) {
        echo "Signup successful! <a href='login.html'>Login now</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} elseif ($action === 'login') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if (password_verify($pass, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: profile.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }

} elseif ($action === 'delete') {
    $userId = $_SESSION['user']['id'] ?? 0;
    $query = "DELETE FROM users WHERE id = $userId";
    mysqli_query($conn, $query);
    session_destroy();
    echo "Account deleted. <a href='signup.html'>Sign up again</a>";
    
} elseif ($action === 'update') {
    if (!isset($_SESSION['user'])) {
        echo "You must be logged in to update your profile.";
        exit;
    }

    $id = $_SESSION['user']['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    $query = "UPDATE users SET fullname='$fullname', email='$email' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['user']['fullname'] = $fullname;
        $_SESSION['user']['email'] = $email;
        echo "Profile updated successfully. <a href='profile.php'>View Profile</a>";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

?>