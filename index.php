<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "tutorials");
if (isset($_GET['page'])){

    $pages = array("products", "cart");

    if(in_array($_GET['page'], $pages)) {

        $_page = $_GET['page'];

    } else {

        $_page="products";

    }


    }else {
        $_page="products";

    }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Шаверно</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/icon.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />

      <link rel="stylesheet" href="css/style.css" />
      <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->






            <?php require($_page.".php") ?>







    <!-- End your project here-->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
