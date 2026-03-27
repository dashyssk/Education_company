<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/panel.css">
</head>

<style>
    .dt-column-color {
        background-color: <?php echo isset($_COOKIE['bg_color']) ? $_COOKIE['bg_color'] : '#D8E5F8'; ?>;
    }
</style>

<body class="body">
    <section class="panel">
        <?php include('panel.php'); ?>
        <div class="content users">
            <h2 class="section-title">Таблиця наявних облікових записів</h2>
            <p class="users__text">На даній сторінці можна переглянути таблицю наявних облікових записів, які були створені під час використання панелі. Також поруч вказана дата та обліковий запис, з використанням якого було надано доступ новому користувачеві. </p>
            <?php
                $db_path = "../BIYF.db"; 
                $dbc = mysqli_connect('localhost', 'root', '', $db_path);
            $query = "SELECT * FROM users";
            $result = mysqli_query($dbc, $query);

            echo '<table class="dt-table">';
            echo '<tr class="dt-row">';
            echo '<th class="dt-row__name dt-column-color">Ім’я (Логін)</th>';
            echo '<th class="dt-row__name dt-column-white">Пароль</th>';
            echo '<th class="dt-row__name dt-column-color">Дата створення</th>';
            echo '<th class="dt-row__name dt-column-white">Дії з записом</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr class="dt-row">';
                echo '<td class="dt-row__text dt-column-color">' . $row['login'] . '</td>';
                echo '<td class="dt-row__text dt-column-white">';
                echo '<input type="password" id="passw" class="passw" readonly value="' . $row['password'] . '">';
                echo '<button class="show">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">';
                echo '<path d="M1.75 6.5C3.85 2.5 10.15 2.5 12.25 6.5" stroke="black" stroke-linecap="round" stroke-linejoin="round" />';
                echo '<path d="M7 8.5C6.77019 8.5 6.54262 8.4612 6.3303 8.38582C6.11798 8.31044 5.92507 8.19995 5.76256 8.06066C5.60006 7.92137 5.47116 7.75601 5.38321 7.57403C5.29526 7.39204 5.25 7.19698 5.25 7C5.25 6.80302 5.29526 6.60796 5.38321 6.42597C5.47116 6.24399 5.60006 6.07863 5.76256 5.93934C5.92507 5.80005 6.11798 5.68956 6.3303 5.61418C6.54262 5.5388 6.77019 5.5 7 5.5C7.46413 5.5 7.90925 5.65804 8.23744 5.93934C8.56563 6.22064 8.75 6.60218 8.75 7C8.75 7.39782 8.56563 7.77936 8.23744 8.06066C7.90925 8.34196 7.46413 8.5 7 8.5Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />';
                echo '</svg>';
                echo '</button>';
                echo '</td>';
                echo '<td class="dt-row__text dt-column-color">' . $row['date'] . '</td>';
                echo '<td class="dt-row__text dt-column-white">
            <form method="post" action="">
                <input type="hidden" name="name" value="' . $row['login'] . '">
                <input type="submit" class="dt-delete" name="delete" value="Видалити">
            </form>
        </td>';
                echo '</tr>';
            }

            echo '</table>';

            $nameToDelete = "";

            if (isset($_POST['delete'])) {
                $nameToDelete = $_POST['name'];
                $nameToDelete = mysqli_real_escape_string($dbc, $nameToDelete);
                $query = "DELETE FROM users WHERE login = '$nameToDelete'";

                if (mysqli_query($dbc, $query)) {
                } else {
                }
            }

            mysqli_close($dbc);
            ?>

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
                    };
                });
            </script>

        </div>
    </section>
    <script src="/scripts/panel.js"></script>
</body>

</html>