<html>
	<head>
		<?php App::render('head', [
			'title' => $title
		]) ?>
	</head>
	<body>
		<?php App::render('navbar') ?>

		<?php App::render('header') ?>

		<div class="container">
			<div class="content">
				<form class="form-reg" method="POST" action="index.php?a=login">
					<div class="title">Форма входа</div>
					
                    <label>Email:</label>
                    <input type="email" name="email" required="" value="<?php if( isset($_POST['email']) ) { echo $_POST['email']; } ?>">

                    <label>Пароль:</label>
                    <input type="password" name="password" required="">

                    <input type="submit" value="Войти"> 

					<div class="error"><?php echo App::flashGet('login')?></div>                    
                </form>						
			</div>
		</div>

		<?php App::render('footer') ?>
	</body>
</html>