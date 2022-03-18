<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Bootstrap CSS -->
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous"
    />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"
    />


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="icon" type="image/png" href="images/hospital.png" />
    <title>Facilities List</title>
</head>
<body>
<!-- Header -->
<div class="container">
    <div id="titlebar" class="row">
        <div class="col-sm-12 col-md-12 mt-2" >
            <form action=<?php
            if(isset($_SESSION['user'])){
                echo "'logout.php'";
            }else{
                echo "'login.php'";
            }
            ?>>
                <button type="submit" class="btn btn-dark float-right">
                    <?php
                    if(isset($_SESSION['user'])){
                        echo "Log Out";
                    }else{
                        echo "Log In";
                    }
                    ?>
                </button>
            </form>
            <a href = "index.php"><img height="90" src="images/hospital.png" alt="The website logo"></a><span style = "font-size: 200%; padding-left: 2%; color: #505050;"> Med Contact</span>
        </div>
    </div>
    <nav class="nav nav-tabs row d-flex">
        <a class="nav-item nav-link" href="index.php">Facility Contact Info</a>
        <a class="nav-item nav-link" onclick="print()">Print</a>
        <div class=" form-outline"></div>
    </nav>

