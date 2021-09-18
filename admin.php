<?php

          $db_host='localhost';
          $db_name='newsdb';
          $db_user='admin_news';
          $db_pass='1327';
          $conn = mysqli_connect($db_host, $db_user, $db_pass);
          mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
          $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styleadmin.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Админка новостей</title>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">
                    <img src="img/logo2.png" alt="">
                </div>
                <h1 class="header__title">
                    Администрирование новостей
                </h1>
                <div class="data">
                    <script language="javascript" type="text/javascript">
                        var d = new Date();

                        var day = new Array("Воскресенье", "Понедельник", "Вторник",
                            "Среда", "Четверг", "Пятница", "Суббота");

                        var month = new Array("января", "февраля", "марта", "апреля", "мая", "июня",
                            "июля", "августа", "сентября", "октября", "ноября", "декабря");

                        document.write(day[d.getDay()] + " " + d.getDate() + " " + month[d.getMonth()]
                            + " " + d.getFullYear() + "г.");
                    </script>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="menu">
            <ul>
                <li><a href=""> Добавить новость</a> </li>
                <li><a href=""> Добавить раздел</a></li>
                <li><a href="news.php" target="_blank"> Посмотреть сайт</a></li>
            </ul>
            <div class="searh">
                <form>
                    <input type="text" placeholder="Поиск...">
                    <button type="submit"></button>
                </form>
            </div>
        </div>

        <div class="content">
            <?
            $result = $mysqli->query('SELECT * FROM `news`'); // запрос на выборку
             while($row = mysqli_fetch_assoc($result)): ?>
            <div class="news">
                <div class="news__title ">
                    <?= $row['title']; ?></div>
                <div class="news__functions">
                    <a class="title" href="add.php"> Редактировать </a>
                    <a class="title" href=""> Деактивировать</a>
                    <a class="title" href=""> Удалить</a>
                </div>
                <div class="news__text">
                     <?= $row['text'];?>
                </div>
                <div class="news__data">
                    <?= $row['date']; ?>
                </div>
            </div>
            <?endwhile; ?>
        </div>



    <footer class="footer"> &copy;2021 Dubinskaya Natalia</footer>
</body>

</html>