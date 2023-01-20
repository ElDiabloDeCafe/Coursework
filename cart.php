<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "", "tutorials");

    if(isset($_POST['submit'])){

    foreach ($_POST['quantity'] as $key => $val) {

            if($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }

        }

    }
    if (isset($_POST['talon'])){
        session_start();
        //mysqli_query($link, "UPDATE `talon` SET `talon_num` = `talon_num` + 1 WHERE `id_talon` = 1" );
        //$talon_num = mysqli_query($link, "SELECT `talon_num` FROM `talon` WHERE `id_talon` = 1");
        header("Location: ./talon.php");

    }

?>
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
<body class="align-items-center justify-content-center" style="background-color:#f5f4f2">
<h1 style="text-align: center; color: black">Корзина заказа</h1>
<h5 style="text-align: center">Чтобы удалить товар из корзины, поменяйте значение его количества на 0 </h5>
<a href="index.php?page=products">Вернуться на страницу с блюдами</a>
<form method="post" action="index.php?page=cart">

    <div class="row" style="display: flex; align-content: center; background-color:#f5f4f2">

        <?php
        error_reporting(0);;
            session_start();
            $link = mysqli_connect("localhost", "root", "", "tutorials");
            $sql = "SELECT * FROM `products` WHERE id_product IN (";

            foreach ($_SESSION['cart'] as $id => $value){
                $sql.=$id.",";
            }

            $sql=substr($sql, 0, -1).") ORDER BY `name` ASC"    ;
            $query = mysqli_query($link, $sql);
            $totalprice=0;
            while ($row = mysqli_fetch_array($query)) {
                    $subtotal = $_SESSION['cart'][$row['id_product']]['quantity'] * $row['price'];
                    $totalprice += $subtotal;
                ?>

                    <div class="col-md-2 border rounded-6" style="background-color: white; height: 360px; margin-left: 20px">
                        <h2> <img class="img-fluid rounded-6" style="margin-top: 10px; margin-right: auto; margin-left: auto; display: flex" <?php echo "<img src='img/" . $row['avatar'] . "'  />"; ?>
                            </h2>

                        <div style="display: flex;margin-left: auto; margin-right: auto; height: 50px"><?php echo $row['name']?> </div>
                        <h6 style="color: #9e9b98"> <?php echo $row['description'] ?>  </h6>
                    <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" />x</td>
                    <td><?php echo $row['price']?>₽ =</td>
                    <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity'] * $row['price'] ?>₽</td>

                    </div>
                <?php
            }

        ?>

    </div>

            <div style="text-align: center">Total Price: <?php echo $totalprice ?>₽ </div>



    <br />
    <div class="d-grid gap-2 d-md-block">

    <button type="submit" name="submit" class="btn btn-primary" style="margin-left: auto;margin-right: auto; display: flex"> Обновить корзину</button>
    <button type="submit" name="talon" class="btn btn-primary" style="margin-left: auto;margin-right: auto; display: flex; margin-top: 25px" > Оплатить заказ</button>
        </div>
</form>
<br />


<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>
</html>