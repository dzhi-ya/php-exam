<?php App::render('admin/head') ?>

<div class="container">
    <legend>Изменить вопрос</legend>
    <a class="btn-primary" href="index.php?a=admin/questionnaire/index&session_id=<?php echo $data['session_id']?>">Назад</a>
    <br><br>
    <form class="form-horizontal" method="POST" action="index.php?a=admin/questionnaire/edit" enctype="multipart/form-data">
        <fieldset>
            <input name="id" type="hidden" type="text" value="<?php echo $data['id'] ?>">
            <input name="session_id" type="hidden" type="text" value="<?php echo $data['session_id'] ?>">

            <div class="form-group">
              <label class="col-md-4 control-label">Вопрос</label>  
              <div class="col-md-4">
                <input name="payload" type="text" class="form-control input-md" value="<?php echo $data['payload']?>" required>
              </div>
            </div>
            <input name="type" type="hidden" value="<?php echo $data['type']?>"/>
            <?php  
              if(intval($data['type']) !== 1) {
                $objs = json_decode($data['type']);
                $count = 0;
                echo "<br>";
                foreach($objs as $obj) {
                  echo "<input name='variant[" . $count . "]' type='text' class='form-control js-tmp input-md' value='" . $obj . "' required/>";
                  $count++;
                }
              }
            ?>
          
            <div class="form-group">
              <div class="col-md-offset-4 col-md-4">
                <button type="submit" class="btn btn-success">Сохранить</button>
              </div>
            </div>
        </fieldset>
    </form>
</div>
<script>
  $( document ).ready(function() {
     $(document).on('input', '.input-md',function(){
      let i = 0; 
      var variant = [];
      while (i <= $(".js-tmp").length - 1) { 
        variant[variant.length] = $('input[name="variant['+ i +']"]').val();
        i++;
      }
      $('input[name="type"]').val(JSON.stringify(variant));
      console.log(JSON.stringify(variant));
    });
  });
</script>


<?php App::render('admin/footer') ?>