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
    <link rel="stylesheet" href="css/stylenews.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Новости</title>
</head>
<body>

<!-- Header -->
<header class="header">
    <div class="block">
        <script language="javascript" type="text/javascript">
            var d = new Date();
            var month=new Array("января","февраля","марта","апреля","мая","июня",
            "июля","августа","сентября","октября","ноября","декабря");
            document.write(d.getDate()+ " " + month[d.getMonth()]
            + " " + d.getFullYear() + "г.");
            </script>
             <div class="searh">
               <form>
                <input type="text" placeholder="Поиск...">
                <button type="submit"></button>
              </form>
            </div>
    </div>
</header>  <!-- /Header -->

    <div class="container">
        <div class="header__inner">
            <div class="header__logo">
                <img src="img/logo.png" alt="">
            </div>
        </div>
        <div class="container__nav">
          <nav class="nav">
            <a class="nav__link" href="#">Главная</a>
            <a class="nav__link" href="politics.php">Политика</a>
            <a class="nav__link" href="sport.php">Спорт</a>
            <a class="nav__link" href="auto.php">Авто</a>
            <a class="nav__link" href="it.php">IT</a>
            <a class="nav__link" href="sсience.php">Наука</a>
            <a class="nav__link" href="#">О нас</a>
         </nav>
       </div>
    </div>


<!-- Content -->
<div class="content">
  <div class="columns">
  <?
  $result = $mysqli->query('SELECT * FROM `news` order by date desc'); // запрос на выборку
  $sidecolnum = 4;
  $centercolnum = 6;

  ?>
<!-- Left ==================
============================= -->
  <div class="column__left">
    <? for ($i = 1; $i <= $sidecolnum; $i++):
      $row = mysqli_fetch_assoc($result); ?>
        <a class="article" href="detail.php?id=<?=$row['id']?>">
          <div class="article-body">
            <div class="article__photo">
              <img class="photo" src="<?= $row['photo'];?>" alt="">
            </div>
            <h2 class="article-title">
              <?= $row['title']; ?>
            </h2>
            <p class="article-content">
            <?= mb_strimwidth($row['text'], 0, 100, "..."); ?>
            </p>
            <footer class="article-info">
              <span><?= $row['category']; ?></span>
              <span><?= $row['source']; ?></span>
              <span><?= $row['date']; ?></span>
            </footer>
        </div>
      </a>
    <? endfor; ?>
</div>

      <!-- Main  ==================
============================= -->
   <div class="main-column">
   <? for ($i = 1; $i <= $centercolnum; $i++):
      $row = mysqli_fetch_assoc($result); ?>
           <a class="article" href="detail.php?id=<?=$row['id']?>">
            <div class="article-body-center">
              <div class="article__photo">
                <img class="photo__center" src="<?= $row['photo'];?>" alt="">
              </div>
              <!-- <div class="text"> -->
              <h2 class="article-title">
                <?= $row['title'];?>
              </h2>
              <p class="article-content">
                <?= mb_strimwidth($row['text'], 0, 200, "..."); ?>
              </p>
              <div class="article-info">
                <span><?=$row['category'];?></span>
                <span><?=$row['source'];?></span>
                <span><?=$row['date'];?></span>
              </div>
            </div>
          </a>
    <? endfor; ?>
    </div>

    <!-- Right ==================
============================= -->
    <div class="column__right">
    <? for ($i = 1; $i <= $sidecolnum; $i++):
      $row = mysqli_fetch_assoc($result); ?>
         <a class="article" href="detail.php?id=<?=$row['id']?>">
          <div class="article-body">
            <div class="article__photo">
              <img class="photo" src="<?= $row['photo'];?>" alt="">
            </div>
            <h2 class="article-title">
              <?= $row['title']; ?>
            </h2>
            <p class="article-content">
            <?= mb_strimwidth($row['text'], 0, 100, "..."); ?>
            </p>
            <footer class="article-info">
              <span><?= $row['category']; ?></span>
              <span><?= $row['source']; ?></span>
              <span><?= $row['date']; ?></span>
            </footer>
        </div>
      </a>
    <? endfor; ?>
    </div>
  </div>
</div>

<footer id = "footer">
<div class="row">
  <div class="left">
    <div class="footer__logo">
    <img src="img/logo2.png" alt="">
    </div>
    <div class="footer__copyright"> © Copyright ©2021 All rights reserved |  Made with enthusiasm 🤪</div>
  </div>
  <div class="center">
    <h3 class="foot__title">КАТЕГОРИИ</h3>
    <ul class = "foot__links">
      <li><a href="">Политика</a></li>
      <li><a href="">Спорт</a></li>
      <li><a href="">Авто</a></li>
      <li><a href="">IT</a></li>
      <li><a href="">Наука</a></li>
      <li><a href="">О нас</a></li>
    </ul>
  </div>
  <div class="right">
  <h3 class="foot__title">FOLLOW US</h3>
  <ul class="footer-social"> Dubinskaya Natalia
		<li><a href="https://vk.com/streetikk" target="_blank"><i class="fa fa-vk"></i></a></li>
		<li><a href="https://www.instagram.com/streetikk/" target="_blank"><i class="fa fa-instagram" ></i></a></li>
	</ul>
  <ul class="footer-social">Bystrevskaya Polina
		<li><a href="https://vk.com/ornofilm" target="_blank"><i class="fa fa-vk"></i></a></li>
		<li><a href="https://www.instagram.com/ornofilms/" target="_blank"><i class="fa fa-instagram"></i></a></li>
	</ul>
  </div>
</div>


</footer>




</body>
</html>