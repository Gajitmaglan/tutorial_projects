<link rel="stylesheet" href="form.css" type="text/css">

<?php session_start() ?>

<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION["message"] ?></div>
        <span><img src="<?= $_SESSION['avatar'] ?>" alt=""></span> <br>
        welcome, <span class="user"><?= $_SESSION['username'] ?></span>

        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'form_accounts');
        $sql = 'SELECT username, avatar FROM users';
        $result = $mysqli->query($sql); // mysqli_result object
        ?>
        <div id='registered'>
            <span>All registered users</span>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<div class='userlist'>";
                echo "<span>$row[username]</span>";
                echo "<img src='$row[avatar]' />";
                echo "</div>";
            }
            ?>
        </div>
    </div>