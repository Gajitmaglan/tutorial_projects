<?php

session_start();
$_SESSION["message"] = '';
$mysqli = new mysqli('localhost', 'root', '', 'form_accounts');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] == $_POST['confirmpassword']) { // names of HTML fields

        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']); // md5() - hash password security
        $avatar_path = $mysqli->real_escape_string('images/' . $_FILES['avatar']['name']);

        if (preg_match('!image!', $_FILES['avatar']['type'])) {
            if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) {
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $avatar_path;
                $sql = "INSERT INTO users (username, email, password, avatar) "
                    . "values ('$username', '$email', '$password', '$avatar_path')";

                if ($mysqli->query($sql) === true) {
                    $_SESSION['message'] = "registration successful! added $username to the database!";
                    header('location: welcome.php');
                } else {
                    $_SESSION['message'] = "user couldn't be added to the db";
                }
            } else {
                $_SESSION['message'] = "file upload failed!";
            }
        } else {
            $_SESSION['message'] = 'please, only upload GIF, JPG, or PNG images!';
        }
    } else {
        $_SESSION['message'] = 'Two passwords do not match!';
    }
}




?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
    <div class="module">
        <h1>Create an account</h1>
        <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="alert alert-error"><?= $_SESSION["message"] ?></div>
            <input type="text" placeholder="User Name" name="username" required />
            <input type="email" placeholder="Email" name="email" required />
            <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
            <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
            <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
            <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
        </form>
    </div>
</div>