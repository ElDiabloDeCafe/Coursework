

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Корзина</title>
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

<?php

session_start();
if (file_exists('counter.txt')){
    $counter = file_get_contents('counter.txt');
    $counter++;
    $f = fopen('counter.txt','w+');
    fputs($f,$counter);
    fclose($f);
}
else{
    $f = fopen('counter.txt','w+');
    fputs($f,0);
    fclose($f);
}
$counter = file_get_contents('counter.txt');
//echo 'Ваш номер заказа: '.$counter;

?>
<div class="module-border-wrap"><div class="module">
 <?php echo 'Ваш номер заказа: '.$counter; ?>
    </div></div>

<a href="index.php?page=products" style="margin-left: auto;margin-right: auto; display: flex; margin-top: 25px">Вернуться на страницу с блюдами</a>











<!-- End your project here-->
<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>
</html>
