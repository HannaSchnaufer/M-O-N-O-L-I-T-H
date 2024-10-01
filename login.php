<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Za M O N O L I T H</title>
<?php
session_start();
include 'konets.php'; // 

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Salted hashing

    // Query untuk mengecek username dan pw
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND pw = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        // Jika login sukses, set session dan redirect ke home page
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
    } else {
        echo "Username atau password salah!";
    }
}
?>

<style type="text/css">
    body {
        justify-content: center;
        align-content: center;
        background-color: #cccccc;
        padding: 50px;
    }

    h2 {
        text-align: center;
        background: white;
        color: #323779;
        margin-left: 20vh;
        margin-right: 20vh;
        padding: 8px;
        border-radius: 10px;
    }
    form {
        padding: 50px;
        margin-left: 140px;
        margin-right: 140px;
        border-radius: 8px;
        background: white;
    }

    form label {
        display: flex;
        margin-bottom: auto;
        color: #323779;
    }
    input {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        background-color: white;
        border: 1px solid #323779;
        border-radius: 7px;
        box-sizing: border-box;
    }
    button {
        margin: 2px;
        padding: 8px 12px;
        background-color: #345771;
        color: white;
        text-decoration: none;
        font-size: 16px;
    }

</style>

</head>
<body>
    <h2>Silahkan masukkan akun yang sudah terdaftar yah ^^</h2>
    <form method="POST" action="login.php">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
