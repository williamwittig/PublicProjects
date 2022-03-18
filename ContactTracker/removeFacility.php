<?php
$page_title = "Admin Page";
session_start();
if(!isset($_SESSION['user'])){
    require("includes/functions.php");
    header("Location: https://capulus-bibemus.greenriverdev.com/305-Team/MedContact/login.php");
    exit();
}

include("includes/header.php");
require("includes/connect.php");
?>

<div class="container">

    <div class="col-12 d-flex jutify-content-center rounded m-3 p-3 pb-5 pt-5"> <!--d-flex justify-content-center put in by Daniel-->

        <div class="col ml-2 pt-2">
            <h1 class="mb-3">Removed Facility: </h1>
            <?php
            require('includes/functions.php');

            $facilityName = $_POST['deleteField'];

            if($facilityName == "") {
                echo "<p class='text-danger'>Please input a facility to remove</p>";
            } else {
                $sql = "DELETE FROM `Facilities` WHERE name = '".$facilityName."' LIMIT 1;";
                $result = @mysqli_query($cnxn, $sql);

                echo "<p>Facility Removed: ". $facilityName . "</p>";
            }




            ?>

            <div class="text-center">
                <a class="btn btn-primary mt-3" href="index.php" role="button">Back to List</a>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"
    ></script>
    <script src="scripts/script.js"></script>
</div>
</body>
</html>
<?php
include("includes/footer.html");
?>