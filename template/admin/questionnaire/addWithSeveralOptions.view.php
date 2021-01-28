<?php App::render('admin/head') ?>

<div class="container">
    <legend>Добавить вопрос</legend>
    <a class="btn-primary" href="index.php?a=admin/questionnaire/index&session_id=<?php echo $_GET['session_id']?>">Назад</a>
    <br><br>
    <form class="form-horizontal" method="POST" action="index.php?a=admin/questionnaire/addWithSeveralOptions" enctype="multipart/form-data">
    
        <fieldset>
            <input name="session_id" type="hidden" type="text" value="<?php echo $_GET["session_id"] ?>">

            <div class="form-group">
              <label class="col-md-4 control-label">Вопрос</label>  
              <div class="col-md-4">
                <input name="payload" type="text" class="form-control input-md" required>
              </div>
              <div class="block-input">
                <div class="col-md-2">
                  <label>Вариант ответа</label>
                  <input name="variant[0]" type="text" class="form-control input-md" required/>
                  <a class="btn prymary-table danger js-remove-variant">Удалить</a>
                </div>
              </div>
            </div>
            <br>
            <input name="variant_json" type="hidden">

            <div class="form-group" style="displey:flex">
              <div class="col-md-offset-4 col-md-4">
                <a class="btn btn-primary js-add-variant">Добавить вариант ответа +</a>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <button type="submit" class="btn btn-primary" style="float:right">Сохранить</button>
              </div>
            </div>

        </fieldset>
    </form>
</div>


<?php App::render('admin/footer') ?>

<script>
  $( document ).ready(function() {
    window.countOfFields = 0; 

    $('.js-add-variant').click(function(){
      var contDiv = $('.block-input');
      window.countOfFields++;
      contDiv.append('<div class="col-md-2"><label>Вариант ответа</label><input name="variant['+ window.countOfFields +']" type="text" class="form-control input-md" required/><a class="btn prymary-table danger js-remove-variant">Удалить</a></div>');
      let i = 0; 
      var variant = [];
      while (i <= window.countOfFields) { 
        variant[variant.length] = $('input[name="variant['+ i +']"]').val();
        i++;
      }
      $('input[name="variant_json"]').val(JSON.stringify(variant));
    })

    $(document).on('input', '.input-md',function(){
      let i = 0; 
      var variant = [];
      while (i <= window.countOfFields) { 
        variant[variant.length] = $('input[name="variant['+ i +']"]').val();
        i++;
      }
      $('input[name="variant_json"]').val(JSON.stringify(variant));
      console.log(JSON.stringify(variant));
    });
     

    $(document).on('click', '.js-remove-variant',function(){
      window.countOfFields=window.countOfFields-1;
      $(this).closest('.col-md-2').remove();
    });
  });
</script>
