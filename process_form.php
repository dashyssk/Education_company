<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "da.bel@gmail.com";
    $subject = "BIYF повідомлення з сайту";
    $emailMessage = "Ім'я: $name\r\n
    Телефон: $phone\r\n
    Повідомлення: $message";

    $db_path = "../BIYF.db"; 
    $dbc = mysqli_connect('localhost', 'root', '', $db_path);

    if (!$dbc) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "INSERT INTO BIYF (Name, Telephone, Text, Date) VALUES ('$name', '$phone', '$message', NOW())";
    $result = mysqli_query($dbc, $query);

    if ($result) {
        if (mail($to, $subject, $emailMessage)) {
            echo "Дані надіслані та лист відправлено";

            $selectQuery = "SELECT * FROM BIYF";
            $result = mysqli_query($dbc, $selectQuery);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                    <tr>
                        <th>Ім'я</th>
                        <th>Телефон</th>
                        <th>Повідомлення</th>
                        <th>Дата відправки</th>
                    </tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['Telephone'] . "</td>
                        <td>" . $row['Text'] . "</td>
                        <td>" . $row['Date'] . "</td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "Немає даних для відображення";
            }
        } else {
            echo "Дані збережено, але виникла помилка з відправкою листа";
        }
    } else {
        echo "Виникла помилка при збережені: " . mysqli_error($dbc);
    }

    mysqli_close($dbc);
}
?>