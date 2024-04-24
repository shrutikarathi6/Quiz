<?php
session_start();
if(isset($_SESSION["email"])){
    session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$password=md5($password); 


if ($count == 1) {
    $triggerQuery = "CREATE TRIGGER login_success_trigger AFTER INSERT ON user_login_table FOR EACH ROW BEGIN INSERT INTO log_table (log_message) VALUES ('Successful login attempt for email: $email'); END;";
} else {
    $triggerQuery = "CREATE TRIGGER login_failure_trigger AFTER INSERT ON user_login_table FOR EACH ROW BEGIN INSERT INTO log_table (log_message) VALUES ('Unsuccessful login attempt for email: $email'); END;";
}


mysqli_query($con, $triggerQuery);

$result = mysqli_query($con,"SELECT name FROM user WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);

if($count==1){
    while($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
    }
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    header("location:account.php?q=1");
} else {
    header("location:$ref?w=Wrong Username or Password");
}
?>
