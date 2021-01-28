<?php App::render('admin/head') ?>

<div class="container">
    <legend>Управление опросами</legend>

    <a class="btn btn-primary" href="index.php?a=admin/session/index">Назад к управлению сессиями</a>
    <?php
        if(intval($_GET["status"]) == 0) {
            echo "<a class='btn btn-primary' href='index.php?a=admin/questionnaire/add&session_id=" . $_GET["session_id"] . "'>Добавить вопрос</a>";
            echo "<a class='btn btn-primary' href='index.php?a=admin/questionnaire/addWithSeveralOptions&session_id=" . $_GET["session_id"] . "'>Добавить вопрос с вариантами ответа</a>";
        }
    ?>

    <br />
    <br />
    <table class="table">
        <tr>
            <td>Код</td>
            <td>Вопрос</td>
            <td>Варианты ответа</td>
            <td>Ответ</td>
            <td>Действие</td>
        </tr>
        <?php
            foreach($data as $value) {
                echo "<tr>";
                    echo "<td>" . $value['id'] . "</td>";
                    echo "<td>" . $value['payload'] . "</td>";
                    if(intval($value['type']) !== 1) {
                        echo "<td>" . $value['type'] . "</td>";
                    } else {
                        echo "<td>Вопрос без вариантов ответа</td>";
                    }

                    echo "<td>" . $value['anwser'] . "</td>";
                    if(intval($_GET["status"]) == 0) {
                        echo "<td class='actions'><a href='index.php?a=admin/questionnaire/delete&id=" . $value['id'] . "&session_id=" . $_GET["session_id"] . "' class='btn prymary-table danger'>Удалить</a><a href='index.php?a=admin/questionnaire/edit&id=" . $value['id'] . "' class='btn prymary-table success'>Изменить</a></td>";
                    } else {
                        echo "<td class='actions'>Сессия закрыта</td>";
                    }
                echo "</tr>";
            }
        ?>
    </table>
</div>

<?php App::render('admin/footer') ?>