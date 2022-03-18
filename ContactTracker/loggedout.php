<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require("includes/functions.php");

    if(check_login($_POST['user'], $_POST['pass'])){
        $_SESSION['user'] = "admin";
        header("Location: https://capulus-bibemus.greenriverdev.com/305-Team/MedContact/admin.php");
        exit();
    }
}

$page_title = "Logged Out!";
include("includes/header.php");
?>

<div class="jumbotron">
    <h1 class="display-4">Logged Out!</h1>
    <hr class="my-4">
</div>
</div>
</body>
</html>
