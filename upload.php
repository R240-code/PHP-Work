<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] == 0) {

        $file = $_FILES["myfile"];

        $allowedTypes = ["image/jpeg", "image/png", "application/pdf"];

        $fileType = mime_content_type($file["tmp_name"]);

        if (!in_array($fileType, $allowedTypes)) {

            $message = "Invalid file type!";

        } elseif ($file["size"] > 2 * 1024 * 1024) {

            $message = "File size must be below 2 MB!";

        } else {

            if (!is_dir("uploads")) {
                mkdir("uploads");
            }

            $fileName = uniqid() . "_" . basename($file["name"]);

            if (move_uploaded_file($file["tmp_name"], "uploads/" . $fileName)) {
                $message = "File uploaded successfully!";
            } else {
                $message = "File upload failed!";
            }
        }

    } else {
        $message = "Please select a file!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>File Upload Validation</title>

    <style>

        body {
            font-family: Arial;
            background: #f2f2f2;
        }

        .container {
            width: 350px;
            margin: 100px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
            text-align: center;
        }

        input {
            margin: 20px;
        }

        button {
            padding: 10px 20px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        #error {
            color: red;
        }

        .success {
            color: green;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Upload Your File</h2>

    <form method="POST" enctype="multipart/form-data"
          onsubmit="return validateFile()">

        <input type="file" id="myfile" name="myfile"
               accept=".jpg,.jpeg,.png,.pdf">

        <p id="error"></p>

        <button type="submit">Upload File</button>

    </form>

    <h3 class="success">
        <?php echo htmlspecialchars($message); ?>
    </h3>

</div>

<script>

function validateFile() {

    let fileInput = document.getElementById("myfile");

    let error = document.getElementById("error");

    let file = fileInput.files[0];

    error.innerHTML = "";

    if (!file) {

        error.innerHTML = "Please select a file!";
        return false;

    }

    let allowedTypes = [
        "image/jpeg",
        "image/png",
        "application/pdf"
    ];

    if (!allowedTypes.includes(file.type)) {

        error.innerHTML = "Only JPG, PNG and PDF files are allowed!";
        return false;

    }

    if (file.size > 2 * 1024 * 1024) {

        error.innerHTML = "File size must be below 2 MB!";
        return false;

    }

    return true;

}

</script>

</body>
</html>