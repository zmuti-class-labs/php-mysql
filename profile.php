<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.html");
  exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Profile</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h2>Welcome, <?= htmlspecialchars($user['fullname']) ?></h2>

<div class="container">
  <h2>Edit Your Profile</h2>

  <!-- UPDATE FORM -->
  <form method="POST" action="crud.php" class="edit-form">
    <input type="hidden" name="action" value="update">
    <input type="text" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>" required><br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
    <button type="submit">Update</button>
  </form>

  <!-- DELETE FORM -->
  <form method="POST" action="crud.php" class="delete-form">
    <input type="hidden" name="action" value="delete">
    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
  </form>
</div>

</body>
</html>