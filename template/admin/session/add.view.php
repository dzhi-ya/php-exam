<?php App::render('admin/head') ?>

<div class="container">
    <legend>Добавить новую сессию</legend>
    <a class="btn-primary" href="index.php?a=admin/session/index">Назад</a>
    <br><br>
    <form class="form-horizontal" method="POST" action="index.php?a=admin/session/add" enctype="multipart/form-data">
        <fieldset>

            <div class="form-group">
              <label class="col-md-4 control-label">Название</label>  
              <div class="col-md-4">
                <input name="name" type="text" class="form-control input-md" required>
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