<?php
$link = mysqli_connect("localhost", "root", "", "tutorials");
if (isset($_GET['action']) && $_GET['action'] == "add") {

    $id = intval($_GET['id']);

    if (isset($_SESSION['cart'][$id])) {

        $_SESSION['cart'][$id]['quantity']++;

    } else {

        $sql_s = "SELECT * FROM `products` WHERE `id_product` = {$id}";
        $query_s = mysqli_query($link, $sql_s);
        if (mysqli_num_rows($query_s) != 0) {
            $row_s = mysqli_fetch_array($query_s);

            $_SESSION['cart'][$row_s['id_product']] = array(
                "quantity" => 1,
                "price" => $row_s['price']
            );


        } else {

            $message = "This product id it's invalid!";

        }

    }

}

?>



<?php

if (isset($message)) {

    echo "<h2>$message</h2>";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Шаверно</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/icon.png" type="image/x-icon"/>
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

    <link rel="stylesheet" href="css/style.css"/>
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css"/>
</head>
<body>

<div class="row" style="display: flex; align-content: center; background-color:#f5f4f2"> <!-- Основное меню -->

    <div class="col-md-3 fixed-top"> <!-- Каталог с кнопками -->

        <h1 style="color: #21201f"> Меню </h1>
        <br>
        <a href="#doner" class="btn btn-light btn-rounded" style="color: #000000">Донеры</a>
        </br>
        <br>
        <a href="#fry" class="btn btn-light btn-rounded" style="color: #000000">Картошка-бокс</a>
        </br>
        <br>
        <a href="#shvarma" class="btn btn-light btn-rounded" style="color: #000000">Шаверма</a>
        </br>
        <br>
        <a href="#salat" class="btn btn-light btn-rounded" style="color: #000000">Салаты</a>
        </br>
        <br>
        <a href="#snack" class="btn btn-light btn-rounded" style="color: #000000">Закуски</a>
        </br>
        <br>
        <a href="#drinks" class="btn btn-light btn-rounded" style="color: #000000">Напитки</a>
        </br>

    </div>
    <div class="col-md-6" style="margin-left: 450px"> <!-- Меню -->

        <footer id="doner"> <h1 style="color: #21201f; margin-bottom: 20px; margin-top: 20px"> Донеры </h1> </footer>
        <div class="row">

                <?php
                $link = mysqli_connect("localhost", "root", "", "tutorials");

                $sql = "SELECT * FROM `products` WHERE `id_product` BETWEEN 1 and 3 ORDER BY `id_product` ASC";
                $query = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($query)) {

                    ?>

            <div class="col-md-2 border rounded-6" style="background-color: white; height: 400px">
                    <h2> <img class="img-fluid rounded-6" style="margin-top: 10px" <?php echo "<img src='img/" . $row['avatar'] . "'  />"; ?> <!-- Строчки из списка продуктов -->
                        <?php echo $row['price'] ?>₽ </h2>
                        <div style="height: 100px"> <?php echo $row['name'] ?> </div>
                    <h6 style="color: #9e9b98"> <?php echo $row['description'] ?>  </h6>

                    <a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>" type="button"
                       class="btn btn-primary"
                       style="display: flex; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto"> Добавить в корзину </a>

            </div>
                    <?php

                }

                ?>



        </div>

        <footer id="fry">  <h1 style="color: #21201f; margin-bottom: 20px; margin-top: 20px"> Картошка-бокс </h1> </footer>
        <div class="row">

            <?php
            $link = mysqli_connect("localhost", "root", "", "tutorials");

            $sql = "SELECT * FROM `products` WHERE `id_product` BETWEEN 4 and 7 ORDER BY `id_product` ASC";
            $query = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($query)) {

                ?>

                <div class="col-md-2 border rounded-6" style="background-color: white; height: 400px">
                    <h2> <img class="img-fluid rounded-6" style="margin-top: 10px" <?php echo "<img src='img/" . $row['avatar'] . "'  />"; ?> <!-- Строчки из списка продуктов -->
                        <?php echo $row['price'] ?>₽ </h2>
                    <div style="height: 100px"> <?php echo $row['name'] ?> </div>
                    <h6 style="color: #9e9b98"> <?php echo $row['description'] ?>  </h6>

                    <a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>" type="button"
                       class="btn btn-primary"
                       style="display: flex; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto"> Добавить в корзину </a>

                </div>
                <?php

            }

            ?>



            <footer id="shvarma">  <h1 style="color: #21201f; margin-bottom: 20px; margin-top: 20px"> Шаверма </h1> </footer>
            <div class="row">

                <?php
                $link = mysqli_connect("localhost", "root", "", "tutorials");

                $sql = "SELECT * FROM `products` WHERE `id_product` BETWEEN 7 and 16 ORDER BY `id_product` ASC";
                $query = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($query)) {

                    ?>

                    <div class="col-md-2 border rounded-6" style="background-color: white; height: 400px">
                        <h2> <img class="img-fluid rounded-6" style="margin-top: 10px" <?php echo "<img src='img/" . $row['avatar'] . "'  />"; ?> <!-- Строчки из списка продуктов -->
                            <?php echo $row['price'] ?>₽ </h2>
                        <div style="height: 100px"> <?php echo $row['name'] ?> </div>
                        <h6 style="color: #9e9b98"> <?php echo $row['description'] ?>  </h6>

                        <a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>" type="button"
                           class="btn btn-primary"
                           style="display: flex; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto"> Добавить в корзину </a>

                    </div>
                    <?php

                }

                ?>



            </div>


            <footer id="salat">   <h1 style="color: #21201f; margin-bottom: 20px; margin-top: 20px"> Салаты </h1> </footer>
            <div class="row">

                <?php
                $link = mysqli_connect("localhost", "root", "", "tutorials");

                $sql = "SELECT * FROM `products` WHERE `id_product` BETWEEN 17 and 17 ORDER BY `id_product` ASC";
                $query = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($query)) {

                    ?>

                    <div class="col-md-2 border rounded-6" style="background-color: white; height: 400px">
                        <h2> <img class="img-fluid rounded-6" style="margin-top: 10px" <?php echo "<img src='img/" . $row['avatar'] . "'  />"; ?> <!-- Строчки из списка продуктов -->
                            <?php echo $row['price'] ?>₽ </h2>
                        <div style="height: 100px"> <?php echo $row['name'] ?> </div>
                        <h6 style="color: #9e9b98"> <?php echo $row['description'] ?>  </h6>

                        <a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>" type="button"
                           class="btn btn-primary"
                           style="display: flex; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto"> Добавить в корзину </a>

                    </div>
                    <?php

                }

                ?>



            </div>


            <footer id="snack"> <h1 style="color: #21201f; margin-bottom: 20px; margin-top: 20px"> Закуски </h1> </footer>
            <div class="row">

                <?php
                $link = mysqli_connect("localhost", "root", "", "tutorials");

                $sql = "SELECT * FROM `products` WHERE `id_product` BETWEEN 18 and 20 ORDER BY `id_product` ASC";
                $query = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($query)) {

                    ?>

                    <div class="col-md-2 border rounded-6" style="background-color: white; height: 400px">
                        <h2> <img class="img-fluid rounded-6" style="margin-top: 10px" <?php echo "<img src='img/" . $row['avatar'] . "'  />"; ?> <!-- Строчки из списка продуктов -->
                            <?php echo $row['price'] ?>₽ </h2>
                        <div style="height: 80px"> <?php echo $row['name'] ?> </div>
                        <h6 style="color: #9e9b98"> <?php echo $row['description'] ?>  </h6>

                        <a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>" type="button"
                           class="btn btn-primary"
                           style="display: flex; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto"> Добавить в корзину </a>

                    </div>
                    <?php

                }

                ?>



            </div>



            <footer id="drinks"> <h1 style="color: #21201f; margin-bottom: 20px; margin-top: 20px"> Напитки </h1> </footer>
            <div class="row">

                <?php
                $link = mysqli_connect("localhost", "root", "", "tutorials");

                $sql = "SELECT * FROM `products` WHERE `id_product` BETWEEN 21 and 24 ORDER BY `id_product` ASC";
                $query = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($query)) {

                    ?>

                    <div class="col-md-2 border rounded-6" style="background-color: white; height: 400px">
                        <h2> <img class="img-fluid rounded-6" style="margin-top: 10px" <?php echo "<img src='img/" . $row['avatar'] . "'  />"; ?> <!-- Строчки из списка продуктов -->
                            <?php echo $row['price'] ?>₽ </h2>
                        <div style="height: 80px"> <?php echo $row['name'] ?> </div>
                        <h6 style="color: #9e9b98"> <?php echo $row['description'] ?>  </h6>

                        <a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>" type="button"
                           class="btn btn-primary"
                           style="display: flex; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto"> Добавить в корзину </a>

                    </div>
                    <?php

                }

                ?>



            </div>






        </div>




    </div>
    <div class="col-md-3 border rounded-6 sticky-bottom" style="height: auto; margin-left: 1400px"> <!-- Корзина -->

        <h1 style="align-items: center">Корзина</h1> <!-- Надпись корзина -->
        <?php
        session_start();
        if (isset($_SESSION['cart'])){

            $link = mysqli_connect("localhost", "root", "", "tutorials");

            $sql = "SELECT * FROM `products` WHERE id_product IN (";

            foreach ($_SESSION['cart'] as $id => $value){
                $sql.=$id.",";
            }
            error_reporting(0);
            $sql=substr($sql, 0, -1).") ORDER BY `name` ASC";
            $query = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($query)) {  //Заполнение продуктов, которые мы добавили в корзину
                ?>
                    <div class="row rounded-6">
                        <img class="img-fluid rounded-6" style="margin-top: 10px; width: 150px; height: 150px" <?php echo "<img src='img/" . $row['avatar'] . "'  />"; ?>
                <p> <?php echo $row['name']?>&nbsp;в количестве&nbsp;<?php echo $_SESSION['cart'][$row['id_product']]['quantity']?> штук </p>
                    </div>
                <?php
            }
            ?>
            <hr />
            <a href="index.php?page=cart">Перейти в корзину</a>
            <?php

        }else{
            echo"<p>Ваша корзина пуста. Пожалуйста, добавьте несколько товаров!</p>";
        }

        ?>

    </div>

</div>

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>