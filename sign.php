<?php
include_once 'dbConnection.php';
ob_start();

$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$password = $_POST['password'];


$name = ucwords(strtolower(addslashes(stripslashes($name))));
$gender = addslashes(stripslashes($gender));
$email = addslashes(stripslashes($email));
$college = addslashes(stripslashes($college));
$mob = addslashes(stripslashes($mob));
$password = md5(addslashes(stripslashes($password)));

$q3 = mysqli_query($con, "INSERT INTO user VALUES ('$name', '$gender', '$college', '$email', '$mob', '$password')");

if ($q3) {
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;

    header("location:account.php?q=1");

    $trigger_query = "CREATE TRIGGER user_insert_trigger AFTER INSERT ON user FOR EACH ROW BEGIN DECLARE email_content VARCHAR(255); SET email_content = CONCAT('New user registered: ', NEW.name, '. Email: ', NEW.email); -- You can add code here to send an email using MySQL's email functionality or call a stored procedure that handles sending emails. END;";
    mysqli_query($con, $trigger_query);
} else {
    
    header("location:index.php?q7=Email Already Registered!!!");
}

ob_end_flush();
?>
