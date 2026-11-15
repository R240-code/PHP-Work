<?php
$name = $email = $mobile = $password = "";
$nameErr = $emailErr = $mobileErr = $passwordErr = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name Validation
    $name = $_POST["name"];

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $nameErr = "Only alphabets and spaces are allowed";
    }

    // Email Validation
    $email = $_POST["email"];

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $emailErr = "Enter a valid email address";
    }

    // Mobile Validation
    $mobile = $_POST["mobile"];

    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $mobileErr = "Mobile number must contain exactly 10 digits";
    }

    // Password Validation
    $password = $_POST["password"];

    if (!preg_match("/^(?=.*[A-Za-z])(?=.*[0-9])(?=.*[@#$%&*!]).{8,}$/", $password)) {
        $passwordErr = "Password must contain 8 characters, a letter, a number and a special character";
    }

    if ($nameErr == "" && $emailErr == "" &&
        $mobileErr == "" && $passwordErr == "") {

        $success = "Form Submitted Successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>

    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
        }

        form {
            width: 350px;
            margin: 50px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
        }

        input {
            width: 95%;
            padding: 10px;
            margin: 8px 0;
        }

        button {
            padding: 10px 20px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 13px;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>

<form method="POST" action="">

    <h2>Registration Form</h2>

    <label>Name:</label>
    <input type="text" name="name"
           value="<?php echo htmlspecialchars($name); ?>">
    <span class="error"><?php echo $nameErr; ?></span>

    <label>Email:</label>
    <input type="text" name="email"
           value="<?php echo htmlspecialchars($email); ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <label>Mobile Number:</label>
    <input type="text" name="mobile"
           value="<?php echo htmlspecialchars($mobile); ?>">
    <span class="error"><?php echo $mobileErr; ?></span>

    <label>Password:</label>
    <input type="password" name="password">
    <span class="error"><?php echo $passwordErr; ?></span>

    <br><br>

    <button type="submit">Submit</button>

    <h3 class="success"><?php echo $success; ?></h3>

</form>

</body>
</html>
