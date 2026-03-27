<!DOCTYPE html>
<html lang="en">

<head>
<?php include('head.php'); ?>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/panel.css">
</head>

<body class="body">
    <section class="panel main">
        <?php include('panel.php'); ?>
        <div class="content">
            <h1 class="title">Вітаємо в адмін панелі</h1>
            <div class="main__text">
                <p class="main__paragr">В адмін панелі можна переглядати корпоративну інформацію, а саме: отримані дані з форми. Для зручності в роботі додана можливість фільтрування.</p>
                <p class="main__paragr"> Адмін панель буде оновлюватися та покращувати можливості.</p>
            </div>
            <p class="main__version">Наявна версія: 0.0.1</p>
            <a href="panel-change.php" class="main__btn btn">
                <div class="btn-consult__img"></div>
                <span class="btn__text ">Розпочати</span>
            </a>
            
        </div>
        <img src="/img/urkr.svg" class="content__bg">
    </section>
</body>

</html>