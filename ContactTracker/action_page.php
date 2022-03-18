<!--
  Action_page.php
  Live Draft(PHP Working) : https://jjonas2.greenriverdev.com/305-temp/Bootstrap%201/TestSprint/Form.html

Author: Jacob Jonas
Submission from Form Summary
 -->
<?php
include("includes/header.php");
require("includes/connect.php");
?>

<!--Author of lines 27-46
    Daniel Svirida -->
<div class="container">

    <div class="col-12 d-flex jutify-content-center rounded m-3 p-3 pb-5 pt-5"> <!--d-flex justify-content-center put in by Daniel-->

        <div class="col ml-2 pt-2">
            <h1 class="mb-3">Results: </h1>
            <?php
            require('includes/functions.php');
            //Turn on error reporting
            //        ini_set('display_errors', 1);
            //        error_reporting(E_ALL^ E_NOTICE);

            // Validation
            $fname = "";
            $city = "";
            $state = "";
            $mrp = "";
            $mfax = "";
            $lphone = "";
            $lfax = "";
            $scans = "";
            $pushoption = "";

            $isValid = true;

            if(!validString($_POST['facilityName'])) {
                echo "<p class='text-danger'>Facility name is required.</p>";
                $isValid = false;
            } else {
                $fname = $_POST['facilityName'];
            }

            if(!validString($_POST['city'])) {
                echo "<p class='text-danger'>Facility city is required.</p>";
                $isValid = false;
            } else {
                $city = $_POST['city'];
            }

            if(!validState($_POST['state'])) {
                echo "<p class='text-danger'>Facility state is required.</p>";
                $isValid = false;
            } else {
                $state = $_POST['state'];
            }

            if(!validPhone($_POST['recordsPhone']) && !empty($_POST['recordsPhone'])) {
                echo "<p class='text-danger'>Medical Records phone number is not valid</p>";
                $isValid = false;
            } else {
                $mrp = $_POST['recordsPhone'];
            }

            if(!validPhone($_POST['recordsFax']) && !empty($_POST['recordsPhone'])) {
                echo "<p class='text-danger'>Medical Records fax number is not valid</p>";
                $isValid = false;
            } else {
                $mfax = $_POST['recordsFax'];
            }

            if(!validPhone($_POST['libraryPhone']) && !empty($_POST['libraryPhone'])) {
                echo "<p class='text-danger'>Library phone number is not valid</p>";
                $isValid = false;
            } else {
                $lphone = $_POST['libraryPhone'];
            }

            if(!validPhone($_POST['libraryFax']) && !empty($_POST['libraryPhone'])) {
                echo "<p class='text-danger'>Library fax number is not valid</p>";
                $isValid = false;
            } else {
                $lfax = $_POST['libraryFax'];
            }

            if(!validScans(implode(", ", $_POST['scans'])) && !empty(implode(", ", $_POST['scans']))) {
                echo "<p class='text-danger'>Scans are not valid</p>";
                $isValid = false;
            } else {
                $scans = implode(", ", $_POST['scans']);
            }

            if(!validPush($_POST['push'])) {
                echo "<p class='text-danger'>Selected push option is not valid</p>";
                $isValid = false;
            } else {
                $pushoption = $_POST['push'];
            }

            //If the data is not valid, stop processing
            if (!$isValid) {
                return;
            }

            /*
            $fname = "";
            $city = "";
            $state = "";
            $mrp = "";
            $mfax = "";
            $lphone = "";
            $lfax = "";
            $scans = "";
            $pushoption = "";
             */


            //Print
            echo "<p>Facility Name: $fname </p>";
            echo "<p>City: $city </p>";
            echo "<p>State: $state </p>";

            if($mrp != "") {
                if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $mrp,  $matches ) )
                {
                    $mrp = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
                    echo "<p>Medical Records Phone: $mrp </p>";
                }
                if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $mfax,  $matches ) )
                {
                    $mfax = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
                    echo "<p>Medical Records Fax: $mfax </p>";
                }}

            if ($lphone != "") {

                if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $lphone,  $matches ) )
                {
                    $lphone = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
                    echo "<p>Film Libary Phone: $lphone </p>";

                }
                if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $lfax,  $matches ) )
                {
                    $lfax = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
                    echo "<p>Film Libary Fax: $lfax </p>";

                }}
            echo "<p>Scans: $scans </p>";
            echo "<p>Push Options : $pushoption</p>";
            echo "<p>Uploaded On : " . date("m/d/y") . "</p>";

            $sql = "INSERT INTO Facilities (`name`, `city`, `state`, `medPhone`, `medFax`, `libPhone`, `libFax`, `scans`, `push`)
                VALUES ('$fname', '$city', '$state', '$mrp', '$mfax', '$lphone', '$lfax', '$scans', '$pushoption');";
            $result = @mysqli_query($cnxn, $sql);

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