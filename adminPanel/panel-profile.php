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
        <div class="content profile">
            <h2 class="section-title">Обліковий запис</h2>
            <p class="profile__text">На даній сторінці можна змінити власний обліковий запис або
                додати новий для нового користувача адмін панелі. <br>
                Видалити записи можна у таблиці облікових записів.</p>
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $db_path = "../BIYF.db"; 
                $dbc = mysqli_connect('localhost', 'root', '', $db_path);

                if (!empty($_POST['password']) && !empty($_POST['login'])) {
                    $login = $_POST['login'];
                    $password = $_POST['password'];

                    $query = "SELECT * FROM users WHERE login='$login'";
                    $result = mysqli_query($dbc, $query);

                    if (mysqli_num_rows($result) > 0) {
                        $updateQuery = "UPDATE users SET password='$password' WHERE login='$login'";
                        mysqli_query($dbc, $updateQuery);

                        $password = $_POST['password'];
                    } else {
                    }
                }
                mysqli_close($dbc);
            }
            ?>
            <form class="profile__box profile__now" method="post">
                <div class="profile__now-items">
                    <div class="profile__now_item">
                        <h4 class="profile__title">Ім’я</h4>
                        <input type="text" class="input" readonly name="login" value="<?php echo htmlspecialchars($login); ?>">
                    </div>

                    <div class="profile__now_item">
                        <h4 class="profile__title">Пароль</h4>
                        <input type="password" class="passw input" name="password" value="<?php echo htmlspecialchars($password); ?>">
                        <button class="show">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                <path d="M1.75 6.5C3.85 2.5 10.15 2.5 12.25 6.5" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 8.5C6.77019 8.5 6.54262 8.4612 6.3303 8.38582C6.11798 8.31044 5.92507 8.19995 5.76256 8.06066C5.60006 7.92137 5.47116 7.75601 5.38321 7.57403C5.29526 7.39204 5.25 7.19698 5.25 7C5.25 6.80302 5.29526 6.60796 5.38321 6.42597C5.47116 6.24399 5.60006 6.07863 5.76256 5.93934C5.92507 5.80005 6.11798 5.68956 6.3303 5.61418C6.54262 5.5388 6.77019 5.5 7 5.5C7.46413 5.5 7.90925 5.65804 8.23744 5.93934C8.56563 6.22064 8.75 6.60218 8.75 7C8.75 7.39782 8.56563 7.77936 8.23744 8.06066C7.90925 8.34196 7.46413 8.5 7 8.5Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="submit" class="profile__btn btn">
                    <div class=" btn-consult__img"></div>
                    <span class="btn__text lng-btn__send">Зберегти</span>
                </button>
            </form>


            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $login = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : "";
                $password = isset($_POST["passw"]) ? htmlspecialchars($_POST["passw"]) : "";

                $dbc = mysqli_connect('localhost', 'root', '', 'BIYF');

                $check_query = "SELECT * FROM users WHERE login = '$login'";
                $result = mysqli_query($dbc, $check_query);

                if (mysqli_num_rows($result) > 0) {
                } else {
                    $insert_query = "INSERT INTO users (login, password, date) VALUES ('$login', '$password', NOW())";
                    $result = mysqli_query($dbc, $insert_query);
                }

                mysqli_close($dbc);
            }
            ?>


            <form class="profile__box profile__now" method="post">
                <div class="profile__now-items">
                    <div class="profile__now_item">
                        <h4 class="profile__title">Ім’я</h4>
                        <input type="text" class="input" name="username">
                    </div>

                    <div class="profile__now_item">
                        <h4 class="profile__title">Пароль</h4>
                        <input type="password" class="passw input" name="passw">
                        <button class="show">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                <path d="M1.75 6.5C3.85 2.5 10.15 2.5 12.25 6.5" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 8.5C6.77019 8.5 6.54262 8.4612 6.3303 8.38582C6.11798 8.31044 5.92507 8.19995 5.76256 8.06066C5.60006 7.92137 5.47116 7.75601 5.38321 7.57403C5.29526 7.39204 5.25 7.19698 5.25 7C5.25 6.80302 5.29526 6.60796 5.38321 6.42597C5.47116 6.24399 5.60006 6.07863 5.76256 5.93934C5.92507 5.80005 6.11798 5.68956 6.3303 5.61418C6.54262 5.5388 6.77019 5.5 7 5.5C7.46413 5.5 7.90925 5.65804 8.23744 5.93934C8.56563 6.22064 8.75 6.60218 8.75 7C8.75 7.39782 8.56563 7.77936 8.23744 8.06066C7.90925 8.34196 7.46413 8.5 7 8.5Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="submit" class="profile__btn btn">
                    <div class=" btn-consult__img"></div>
                    <span class="btn__text lng-btn__send">Зберегти</span>
                </button>
            </form>


        </div>

        <img src="/img/urkr.svg" class="content__bg">
    </section>
    <script>
        let buttons = document.querySelectorAll(".show");

        buttons.forEach(function(button) {
            let input = button.previousElementSibling;

            button.onclick = function() {
                if (input.getAttribute("type") == "password") {
                    input.removeAttribute("type");
                    input.setAttribute("type", "text");
                } else {
                    input.removeAttribute("type");
                    input.setAttribute("type", "password");
                }

                return false;
            };
        });

        
    </script>
    <script src="/scripts/panel.js"></script>
</body>

</html>