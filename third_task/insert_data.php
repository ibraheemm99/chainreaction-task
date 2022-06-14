<?php

function checkInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function validateRequiredInput($input, $input_name, $errors)
{
    if ($input === "") {
        $errors[] = $input_name . " is required! <br/>";
    }
    return $errors;
}

function validateMobileFormat($input, $input_name, $errors)
{
    $regex = "/^07([7-9]{1}[0-9]{7})$/i";
    if (!preg_match($regex, $input)) {
        $errors[] = $input_name . " is invalid format!";
    }
    return $errors;
}

$location = "index.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require "dbconfig.php";
    $errors = [];
    $success = "";

    $first_name = checkInput($_POST["first_name"] ?? '');
    $last_name = checkInput($_POST["last_name"] ?? '');
    $mobile = checkInput($_POST["mobile"] ?? '');

    $errors = validateRequiredInput($first_name, 'First Name', $errors);
    $errors = validateRequiredInput($last_name, 'Last Name', $errors);
    $errors = validateRequiredInput($mobile, 'Mobile Number', $errors);
    $errors = validateMobileFormat($mobile, 'Mobile Number', $errors);

    if (count($errors) == 0) {
        $sql = "INSERT INTO contacts (first_name, last_name, mobile)
            VALUES ('$first_name', '$last_name', '$mobile')";

        $stmt = $conn->prepare("INSERT INTO contacts (first_name, last_name, mobile)
        VALUES (? ,? ,?)");
        $stmt->bind_param("sss", $first_name, $last_name, $mobile);

        $stmt->execute();
        $_SESSION['success'] = 'New contact created successfully';

        // if ($conn->query($sql) === true) {
        //     $_SESSION['success'] = 'New contact created successfully';
        // } else {
        //     $errors[] = "Error: " . $sql . "<br>" . $conn->error;
        // }
        $stmt->close();
    }

    $_SESSION['errors'] = $errors;

    $conn->close();
}

header("Location: $location");
exit;
