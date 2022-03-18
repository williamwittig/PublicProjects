<?php
    include("includes/header.php");
    ?>

    <form id="suggest-form" action="suggest-summary.php" method="post">
        <div class="form-group">
            <label for="employee-name">Employee Name</label>
            <input
                type="text"
                class="form-control textbar"
                id="employee-name"
                name="employee-name"
            />
            <span id="err-name" class="text-danger error"
            >Please enter your name</span
            >
        </div>
        <div class="form-group">
            <label for="email">Employee Email</label>
            <input
                name="email"
                id="email"
                class="form-control"
                placeholder="Email"
                type="email"
            />
            <span id="err-email" class="text-danger error"
            >Please enter a valid email</span
            >
        </div>
        <div class="form-group">
            <label for="suggestion">Suggestion</label>
            <textarea class="form-control" rows="5" id="suggestion" name="suggestion"></textarea>
            <span class="text-danger error" id="err-suggestion">Please write your suggestion</span>
        </div>
        <div class="">
            <button type="submit" class="btn btn-primary btn-block">
                Submit
            </button>
        </div>
    </form>

<?php
include("includes/footer.html");
?>
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
></script>
<!-- Bootstrap tooltips -->
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"
></script>
<!-- Bootstrap core JavaScript -->
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"
></script>
<!-- MDB core JavaScript -->
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"
></script>
<script src="scripts/suggest.js"></script>
</body>
</html>

