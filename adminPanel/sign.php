<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Панель адміністратора</title>
    <meta name="description" content="Навчання у Великобританії">
    <meta name="keywords" content="освіта, Великобританія, навчання, абітурієнти, партнери, Англія, ВНЖ, виші, вступ, education">

    <meta property="og:title" content="Навчання у Великобританії">
    <meta property="og:description" content="Наша місія – зробити освіту у Великій Британії доступною та успішною для всіх, хто прагне розкрити свій потенціал та досягти поставлених цілей.">
    <meta property="og:type" content="article">
    <meta property="og:image" content="https://images.unsplash.com/photo-1464021025634-49b81a77a858?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80">
    <meta property="og:site_name" content="Навчання у Великобританії">

    <link rel="shourtcut icon" type="image/png" href="/img/favicon.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;700&family=Pontano+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/sign.css">
</head>

<body class="body">
    <section class="sign">
        <div class="form-block">
            <div class="line">
                <h2 class="section-title">Вхід</h2>
                <img class="form__span form__span_connect" src="/img/connection.svg" alt="connection">
            </div>


            <form action="" method="POST" class="form">
                <input name="login" placeholder="Ім'я" class="form-book__link form__input" required>
                <input name="password" type="password" class="form-book__link form__passw form__input" placeholder="Пароль" required>
                <div class="black-line"></div>
                <div class="form__btn">
                    <p class="form__text ">вхід доступний лише для адміністратора.
                        для реєстрації нового користувача, зверніться до адміністратора</p>
                    <button type="submit" class="btn">
                        <div class=" btn-consult__img"></div>
                        <span class="btn__text lng-btn__send">Увійти</span>
                    </button>
                </div>
            </form>

            <?php
            session_start(); 

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $db_path = "../BIYF.db"; 
                $dbc = mysqli_connect('localhost', 'root', '', $db_path);

                if (!empty($_POST['password']) and !empty($_POST['login'])) {
                    $login = $_POST['login'];
                    $password = $_POST['password'];

                    $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
                    $res = mysqli_query($dbc, $query);
                    $user = mysqli_fetch_assoc($res);

                    if (!empty($user)) {
                        $_SESSION['login'] = $login;
                        $_SESSION['password'] = $password;

                        header("Location: panel-main.php");
                        exit();
                    }
                }
                mysqli_close($dbc);
            }
            ?>

        </div>
    </section>


</body>

</html>