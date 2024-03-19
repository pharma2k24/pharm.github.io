<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $medicine = $_POST["medicine"];
    $message = $_POST["message"];

    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    // Validate phone number
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    } elseif (!preg_match("/^\+?\d+$/", $phone)) {
        $errors[] = "Invalid phone number format";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate message
    if (empty($message)) {
        $errors[] = "Message is required";
    }

    if (empty($errors)) {
        // If there are no errors, you can proceed with further processing
        // For example, you can send the form data via email or save it to a database
        // Here you can redirect to a thank you page or perform any other action
        // For demonstration purposes, let's just display a success message
        echo "Form submitted successfully!";
    } else {
        // If there are errors, display them
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}

?>
