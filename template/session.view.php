<html>
	<head>
		<?php App::render('head', [
			'title' => $title
		]) ?>
	</head>
	<body>
		<?php App::render('navbar') ?>

		<div class="container">
            <form class="form-reg form-qestion" method="POST" action="index.php?a=session">
                <div class="title">Ответьте на вопросы</div>

                <input type="hidden" name="session_id" value="<?php echo $session['id']; ?>">
                
				<?php foreach($asks as $item) { ?>

					<label><?php echo $item['payload']; ?></label>
					<?php 
						if(intval($item['type']) !== 1) {
							$objs = json_decode($item['type']);
							echo "<select class='js-select-var' name='" . $item['id'] . "_answer' required>";
							foreach($objs as $obj) {
								echo "<option id=" . $obj . ">" . $obj . "</option>";
							}
							echo "</select>";
						} else {
							echo "<input type='text' name='" . $item['id'] . "_answer' required>";
						}
					?>					
                <?php } ?>

                <input class="btn-form" type="submit" value="Ответить на вопросы"> 
            </form>
		</div>
		<script>
		</script>
		<?php App::render('footer') ?>
	</body>
</html>