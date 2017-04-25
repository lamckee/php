<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <h2>Create a New Account</h2>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
        <div class="regisFrm">
            <form action="userAccount.php" method="post">
                <input type="text" name="first_name" placeholder="First name" required="">
                <input type="text" name="last_name" placeholder="Last name" required="">
                <input type="email" name="email" placeholder="E-mail" required="">
                <input type="text" name="phone" placeholder="Phone number" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <input type="password" name="confirm_password" placeholder="Confirm password" required="">
                <div class="send-button">
                    <input type="submit" name="signupSubmit" value="Create account">
                </div>
            </form>
        </div>
    </div>
  </body>
</html>
