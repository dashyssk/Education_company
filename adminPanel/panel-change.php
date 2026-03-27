<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/panel.css">
</head>

<body class="body">
    <section class="panel">
        <?php include('panel.php'); ?>
        <div class="content change">
            <h2 class="section-title">Зміна адмін панелі</h2>


            <p class="change__descr">На даній сторінці можна змінити наповнення та колір адмін панелі.</p>
            <div class="change-table">
                <div class="change-table__color">
                    <p class="change-table__paint-text">Основний колір</p>
                    <input type="text" id="colorPicker" style="display:none;">
                </div>



            </div>
        </div>
        <img src="/img/urkr.svg" class="content__bg">
    </section>
    <script src="/scripts/panel.js"></script>
</body>

</html>