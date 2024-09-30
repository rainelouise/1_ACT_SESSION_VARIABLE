<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start(); 

    if (isset($_POST['submitBtn'])) {
        if (isset($_SESSION['firstName'])) {
            $message = $_SESSION['firstName'] . " is already logged in. Wait for them to log out first.";
        } else {
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['password'] = $_POST['password'];
        }
    }
    ?>

    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="firstName" required><br><br>
        <label for="Password">Password</label>
        <input type="password" name="password" required>
        <p><input type="submit" value="Login" name="submitBtn"></p>
        <a href="unset.php">Logout</a>
    </form>

    <?php if (isset($message)): ?>
        <h3><?php echo $message; ?></h3>
    <?php endif; ?>

    <?php if (!isset($message) && isset($_SESSION['firstName'])): ?>
        <h2>User logged in: <?php echo $_SESSION['firstName']; ?></h2>
        <h2>Password: <?php echo $_SESSION['password']; ?></h2>
    <?php endif; ?>
    
</body>
</html>