<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user === 'admin' && $pass === 'admin123') { // Change to use hashed password in database
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
    } else {
        echo 'Invalid credentials';
    }
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>