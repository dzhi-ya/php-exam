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
				<form class="form-reg" method="POST" action="index.php?a=reg">
					<div class="title">Регистрация</div>
					
                    <label>Имя:</label>
                    <input type="text" name="name" required="" value="<?php if( isset($_POST['name']) ) { echo $_POST['name']; } ?>">

                    <label>Email:</label>
                    <input type="email" name="email" required="" value="<?php if( isset($_POST['email']) ) { echo $_POST['email']; } ?>">

                    <label>Телефон:</label>
                    <input type="number" name="telephone" required="" value="<?php if( isset($_POST['telephone']) ) { echo $_POST['telephone']; } ?>">

                    <label>Пароль:</label>
                    <input type="password" name="password" required="">

                    <label>Повторите пароль:</label>
                    <input type="password" name="repeat_password" required="">

                    <input type="submit" value="Зарегистрироватся">      

					<div class="error"><?php echo App::flashGet('email')?></div>                    
                </form>						
			</div>
		</div>

		<?php App::render('footer') ?>
	</body>
</html>