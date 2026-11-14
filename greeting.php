<!DOCTYPE html>
<html>
<head>
    <title>User Greeting</title>
</head>
<body>

    <h2>Welcome to Our Website</h2>

    <form method="POST" action="">
        Enter Your Name:
        <input type="text" name="username" required>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php

    if (isset($_POST['submit'])) {

        $name = htmlspecialchars($_POST['username']);

        echo "<h3>Hello, " . $name . "!</h3>";
        echo "Welcome to our website!";
    }

    ?>

</body>
</html>
