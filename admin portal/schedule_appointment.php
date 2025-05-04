<?php
include('db_connection.php'); // Make sure you have a working db_connection.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST["customer_name"];
    $customer_contact = $_POST["customer_contact"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $service = $_POST["service"];
    $reason = $_POST["reason"];

    $sql = "INSERT INTO appointments (customer_name, customer_contact, date, time, location, service, reason) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $customer_name, $customer_contact, $date, $time, $location, $service, $reason);

    if ($stmt->execute()) {
        echo "<script>alert('Appointment scheduled successfully!'); window.location.href='appointment_form.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
