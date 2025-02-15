<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты тестировния</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <h3>Результаты тестирования</h3>
    <?php
    include "data.php";
    $points = array_fill(1, count($categories), 0);
    foreach ($_POST as $question_id => $response) {
        list($category, $question) = explode("-", $question_id);
        $points[$category] += $categories[$category][$response][0];
    }
    $result = "";
    if ($points[1] < 9 && $points[2] < 9 && $points[3] < 12 && $points[4] < 12) {
        $result = "В результате тестирования по шкале оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ к нему, у вашего ребенка не выявлено признаков интернет-аддикции. Если продолжаете сомневаться, обратитесь с ребенком к врачу для очной консультации.";
    } elseif (($points[1] < 12 || $points[2] < 12) && $points[3] < 12 && $points[4] < 12) {
        $result = "В результате тестирования по шкале оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ к нему, у вашего ребенка не выявлено достоверных признаков интернет-аддикции, однако имеется значительный риск ее формирования. Пожалуйста, обратитесь с ребенком к врачу, на данном этапе возможна успешная профилактика дальнейшего развития зависимости.";
    } elseif ($points[3] < 12 && $points[4] < 12) {
        $result = "В результате тестирования по шкале оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ к нему, у вашего ребенка с высокой вероятностью имеется интернет-зависимость, предположительно 1-й стадии. Пожалуйста, обратитесь с ребенком к врачу для верификации диагноза и разработки индивидуальной программы лечения и реабилитации.";
    } elseif ($points[3] < 18 || $points[4] < 18) {
        $result = "В результате тестирования по шкале оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ к нему, у вашего ребенка с высокой вероятностью имеется интернет-зависимость, предположительно 1-й стадии с намечающимся переходом во 2-ю стадию. Пожалуйста, обратитесь с ребенком к врачу для верификации диагноза и разработки индивидуальной программы лечения и реабилитации.";
    } elseif ($points[1] < 12 && $points[2] < 12 && $points[3] >= 12 && $points[4] >= 12) {
        $result = "В результате тестирования по шкале оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ к нему, относительно состояния вашего ребенка получены противоречивые данные, не поддающиеся интерпретации. Пожалуйста, понаблюдайте за ребенком внимательно несколько дней и повторите тестирование или обратитесь с ребенком к врачу для очной консультации.";
    } else {
        $result = " В результате тестирования по шкале оценки зависимости от персонального компьютера, интернета и мобильных устройств, обеспечивающих доступ к нему, у вашего ребенка с высокой вероятностью имеется интернет-зависимость, предположительно 2-й стадии. Пожалуйста, обратитесь с ребенком к врачу для верификации диагноза и разработки индивидуальной программы лечения и реабилитации.";
    }
    echo "$result<br><br><pre>";

    print_r($points);

    echo "</pre>";
    ?>
</body>

</html>