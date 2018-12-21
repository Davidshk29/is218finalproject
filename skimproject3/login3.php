
<?php include 'form1.php';

session_start();
$_SESSION['email'] = $email;
if($_SESSION['email']) {
}
else {
}

if($log_out)
    session_destroy();

  ?>