<?php
include("includes/header.php");
?>

<!--Author of lines 27-46
    Daniel Svirida -->
<div class="container">

    <div class="col-12 d-flex jutify-content-center rounded m-3 p-3 pb-5 pt-5"> <!--d-flex justify-content-center put in by Daniel-->

        <div class="col ml-2 pt-2">
            <h1 class="mb-3">Sent: </h1>
            <?php
            //Turn on error reporting
            //        ini_set('display_errors', 1);
            //        error_reporting(E_ALL^ E_NOTICE);

            //Move form data into variables
            $name = $_POST['employee-name'];
            $email = $_POST['email'];
            $suggestion = $_POST['suggestion'];



            //Print
            echo "<p>Employee Name: $name </p>";
            echo "<p>Email: $email </p>";
            echo "<p>Suggestion: $suggestion </p>";

            include("includes/sendEmail.php");
            ?>
        </div>
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
</body>
</html>
<?php
    include("includes/footer.html");
?>