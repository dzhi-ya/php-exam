<?php App::render('admin/head') ?>

<div class="container">
    <legend>Управление сессиями</legend>

    <a class="btn btn-primary" href="index.php">На сайт</a>
    <a class="btn btn-primary" href="index.php?a=admin/session/add">Добавить сессию</a>

    <br/>
    <br/>
    <p>Сессия считается <span style="color:#cc1111cf">закрытой</span> после того, как эксперт ответит на вопросы представленные в ней</p>
    <br/>

    <table class="table">
        <tr>
            <td>Код</td>
            <td>Ссылка на опросную сессию</td>
            <td>Название сессии</td>
            <td>Статус</td>
            <td>Кол-во вопросов</td>
            <td>Действия</td>
            <td>Удалить</td>
        </tr>
        <?php
            foreach($data as $value) {
                echo "<tr>";
                    echo "<td>" . $value['id'] . "</td>";
                    echo '<td><a href="https://questionnaire.2315.pro/index.php?a=session&url=' . $value['url'] . '">' . 'Ссылка для эксперта' . '</td>';
                    echo "<td>" . $value['name'] . "</td>";
                    if($value['closed'] == 1){
                        $status = 'Закрыта';
                        $class = 'danger';
                    }else{
                        $status = 'Открыта';
                        $class = 'success';
                    }
                    echo "<td class=" . $class . ">" . $status . "</td>";
                    $countAsk = 0;
                    foreach($asks as $ask){
                        if ($ask['session_id'] == $value['id']){
                            $countAsk++;
                        } 
                    }
                    echo "<td>" . $countAsk . "</td>";
                    if($value['closed'] == 0){
                        echo "<td> <a href='/index.php?a=admin/questionnaire/index&session_id=" . $value['id'] . "&status=" . $value['closed']  . "'>Редактирвоать вопросы </a> </td>";
                    } else {
                        echo "<td> <a href='/index.php?a=admin/questionnaire/index&session_id=" . $value['id'] . "&status=" . $value['closed']  . "'>Просмотр результатов </a> </td>";
                    }
                    echo "<td><a href='index.php?a=admin/session/delete&id=" . $value['id'] . "' class='btn prymary-table danger'>Удалить</a>";
                echo "</tr>";
            }
        ?>
    </table>
</div>

<?php App::render('admin/footer') ?>