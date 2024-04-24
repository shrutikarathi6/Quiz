<?php
include_once 'dbConnection.php';

mysqli_query($con, "CREATE TABLE IF NOT EXISTS feedback_log (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    subject VARCHAR(255),
    feedback TEXT,
    date DATE,
    time TIME
)");

mysqli_query($con, "CREATE TRIGGER IF NOT EXISTS after_feedback_insert
AFTER INSERT ON feedback
FOR EACH ROW
BEGIN
    INSERT INTO feedback_log (id, name, email, subject, feedback, date, time)
    VALUES (NEW.id, NEW.name, NEW.email, NEW.subject, NEW.feedback, CURDATE(), CURTIME());
END");

$ref = @$_GET['q'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$id = uniqid();
$feedback = $_POST['feedback'];
$q = mysqli_query($con, "INSERT INTO feedback VALUES ('$id', '$name', '$email', '$subject', '$feedback', CURDATE(), CURTIME())") or die("Error");

header("location:$ref?q=Thank you for your valuable feedback");
?>
