<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/panel.css">
</head>

<style>
    .data__item {
        background-color: <?php echo isset($_COOKIE['bg_color']) ? $_COOKIE['bg_color'] : '#D8E5F8'; ?>;
    }
</style>

<body class="body">
    <section class="panel">
        <?php include('panel.php'); ?>
        <div class="content data">
            <h2 class="section-title">База даних</h2>
            <p class="data__text">Ви можете обрати необхідну таблицю</p>
            <div class="data__box">
                <div class="data__tables">
                    <div class="data__item">
                        <div class="data__white">
                            <a href="data-users.php" class="data__btn btn">
                                <div class="btn-consult__img"></div>
                                <span class="btn__text ">Відкрити</span>
                            </a>
                        </div>
                        <div class="data__blue">
                            <h3 class="data__title">Таблиця наявних облікових записів</h3>
                            <p class="data__txt">В даній таблиці можна переглянути зареєстровані акаунти </p>
                        </div>
                    </div>
                    <div class="dots-line"></div>
                    <div class="data__item">
                        <div class="data__white">
                            <a href="data-biyf.php" class="data__btn btn">
                                <div class="btn-consult__img"></div>
                                <span class="btn__text ">Відкрити</span>
                            </a>
                        </div>
                        <div class="data__blue">
                            <h3 class="data__title">Таблиця даних з форми</h3>
                            <p class="data__txt">В даній таблиці можна переглянути відправлені запити з форми на сайті</p>
                        </div>
                    </div>
                </div>
                <p class="data__paragr">Дана панель була створена з метою пошуку інформації та відслідковування запитів. У вкладці “База даних” не можна створювати додаткові таблиці.
                    Над даною сторінкою ще буде проводитись робота та вдосконалення з метою поліпшення користувацького досвіду та розширення функціоналу.</p>
            </div>
        </div>
        <img src="/img/urkr.svg" class="content__bg">
    </section>
    <script src="/scripts/panel.js"></script>
</body>

</html>