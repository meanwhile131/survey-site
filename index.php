<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Шкала оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ
        к нему</title>
</head>

<body>
    <h3>Шкала оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ к
        нему
    </h3>
    <div id="form_container">
        <form action="/results.php" method="post" autocomplete="off">
            <?php
            include "data.php";
            $keys = array_keys($questions);
            shuffle($keys);
            foreach ($keys as $key) {
                $questions_shuffled[$key] = $questions[$key];
            }
            foreach ($questions_shuffled as $id => $question) {
                echo "<label>$question<br><div class='answer_container'>";
                $category = explode('-', $id)[0];
                foreach ($categories[$category] as $answer_id => list($answer_value, $answer_name)) {
                    echo "<label class='answer'><input type='radio' name='$id' value='$answer_id'>$answer_name</label>";
                }
                echo "</div></label>";
            }
            ?>
            <br>
            <br>
            <button type="submit">Отправить</button>
        </form>
    </div>
</body>

</html>