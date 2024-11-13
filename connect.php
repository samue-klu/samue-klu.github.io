<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parentName = $_POST['Parent_Name'];
    $parentNumber = $_POST['parentNumber'];
    $childName = $_POST['childName'];
    $childAge = $_POST['childAge'];

    // Validate input
    if (empty($parentName) || empty($parentNumber) || empty($childName) || empty($childAge)) {
        echo 'Please fill in all the required fields.';
        exit;
    }

    // Sanitize input
    $parentName = htmlspecialchars($parentName);
    $parentNumber = htmlspecialchars($parentNumber);
    $childName = htmlspecialchars($childName);
    $childAge = htmlspecialchars($childAge);

    // Set up email headers
    $to = 'eaglesftbll@gmail.com'; // Replace with your email address
    $subject = 'New Registration Request';
    $headers = "From: $to\r\n";
    $headers .= "Reply-To: $to\r\n";

    // Prepare the email body
    $body = "Parent Name: $parentName\n";
    $body .= "Parent Number: $parentNumber\n";
    $body .= "Child's Name: $childName\n";
    $body .= "Child's Age: $childAge\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo 'Registration request sent successfully.';
    } else {
        echo 'Unable to send registration request. Please try again.';
    }
}
?>
