<?php
include("includes/header.php");
?>
<div class="container p-3">
<h1>Contact Us</h1>

<ul>
    <li>
        <p>By email: MedContact@ExampleEmail.com</p>
    </li>

    <li>
        <p>By phone number: 111.111.1111</p>
    </li>
</ul><br>

<h2>Send us a message!</h2>
<form action="mailto:MedContact@ExampleEmail.com"
method="POST"
enctype="multipart/form-data"
name="EmailForm"
>
    Name:<br>
    <input type="text" size="19" name="Contact-Name" class="form-control textbar"><br>
    Email:<br>
    <input type="email" name="Contact-Email" class="form-control textbar"> <br>
    Message:<br> 
    <textarea name="Contact-Message" rows='6' cols='20' class="form-control">
    </textarea><br><br> 
    <button type="submit" value="Submit"  class="btn btn-primary" >Send</button>
</form>
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
<?php
    include("includes/footer.html");
?>
</body>
</html>
