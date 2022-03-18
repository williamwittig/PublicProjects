<?php
$page_title = "Admin Page";
session_start();
if(!isset($_SESSION['user'])){
    require("includes/functions.php");
    header("Location: https://capulus-bibemus.greenriverdev.com/305-Team/MedContact/login.php");
    exit();
}

require('includes/connect.php');
include('includes/header.html');
?>

<table id="example" class="display nowrap">
    <thead>
    <tr>
        <!--<th>Remove</th>-->
        <th>Facility Name (Click facility to see more)</th>
        <th>City</th>
        <th>State</th>
        <th>Medical Records Phone</th>
        <th>Medical Records Fax</th>
        <th>Library Phone</th>
        <th>Library Fax</th>
        <th>Scans Available</th>
        <th>Push Options</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $sql = "SELECT `name`, `city`, `state`, `medPhone`, `medFax`, `libPhone`, `libFax`, `scans`, `push` FROM Facilities;";
    $result = $cnxn->query($sql);


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            //echo    "<td><button class='btn btn-secondary'>Remove</button></td>";
            echo    "<td>" .$row['name'] ."</td>";
            echo    "<td>" .$row['city'] ."</td>";
            echo    "<td>" .$row['state'] ."</td>";
            echo    "<td>" .$row['medPhone'] ."</td>";
            echo    "<td>" .$row['medFax'] ."</td>";
            echo    "<td>" .$row['libPhone'] ."</td>";
            echo    "<td>" .$row['libFax'] ."</td>";
            echo    "<td>" .$row['scans'] ."</td>";
            echo    "<td>" .$row['push'] ."</td>";
            echo    "</tr>";
        }
    }
    ?>

    </tbody>
</table>
<a class="btn btn-primary ml-5 mt-3" href="Form.php">Add A Facility</a>
<form action="removeFacility.php" method="post" id="deleteField" class="input-group mb-3 mt-3 mr-5" style="width: 300px; float: right;">
    <input type="text" class="form-control" name="deleteField" placeholder="Enter the facility name" aria-label="Recipient's username">
    <div class="input-group-append">
        <button class="btn btn-danger" type="submit">Remove</button>
    </div>
</form>

<?php
include("includes/footer.html");
?>

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
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
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script src="scripts/admin.js"></script>
</body>
</html>


