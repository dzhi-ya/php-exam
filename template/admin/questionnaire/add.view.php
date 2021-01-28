<?php App::render('admin/head') ?>

<div class="container">
    <legend>Добавить вопрос</legend>
    <a class="btn-primary" href="index.php?a=admin/questionnaire/index&session_id=<?php echo $_GET['session_id']?>">Назад</a>
    <br><br>
    <form class="form-horizontal" method="POST" action="index.php?a=admin/questionnaire/add" enctype="multipart/form-data">
    
        <fieldset>
            <input name="session_id" type="hidden" type="text" value="<?php echo $_GET["session_id"] ?>">

            <div class="form-group">
              <label class="col-md-4 control-label">Вопрос</label>  
              <div class="col-md-4">
                <input name="payload" type="text" class="form-control input-md" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-offset-4 col-md-4">
                <button type="submit" class="btn btn-primary">Добавить</button>
              </div>
            </div>

        </fieldset>
    </form>
</div>


<?php App::render('admin/footer') ?>