
<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>

    <h2>Student Registration Form</h2>

    <form method="POST" action="">

        Enter Name:
        <input type="text" name="name" required>
        <br><br>

        Enter Roll Number:
        <input type="number" name="roll" required>
        <br><br>

        Enter Email:
        <input type="email" name="email" required>
        <br><br>

        Select Course:
        <select name="course" required>
            <option value="">Select Course</option>
            <option value="Java">Java</option>
            <option value="Python">Python</option>
            <option value="PHP">PHP</option>
        </select>
        <br><br>

        <input type="submit" name="submit" value="Register">

    </form>

    <?php

    if (isset($_POST['submit'])) {

        $name = htmlspecialchars($_POST['name']);
        $roll = htmlspecialchars($_POST['roll']);
        $email = htmlspecialchars($_POST['email']);
        $course = htmlspecialchars($_POST['course']);

        echo "<h2>Student Details</h2>";

        echo "Name: " . $name . "<br>";
        echo "Roll Number: " . $roll . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Course: " . $course . "<br>";

        echo "<h3>Registration Successful!</h3>";
    }

    ?>

</body>
</html>
