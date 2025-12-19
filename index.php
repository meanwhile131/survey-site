<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Шкала оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ к нему">
    <link rel="stylesheet" href="main.css">
    <title>Шкала оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ
        к нему</title>
</head>

<body>
    <header>
        <h3>Шкала оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ к
            нему
        </h3>
    </header>
    <main>
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
                    echo "<p class='question'>$question<br><div class='answer_container'>";
                    $category = explode('-', $id)[0];
                    foreach ($categories[$category][1] as $answer_id => list($answer_value, $answer_name)) {
                        echo "<label class='answer'><input type='radio' name='$id' value='$answer_id' required>$answer_name</label>";
                    }
                    echo "</div></p>";
                }
                ?>
                <br>
                <br>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </main>
</body>

</html>