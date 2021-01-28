<?php App::render('admin/head') ?>

<div class="container" style="width: 400px;">
	<legend>Вход в админ-панель</legend>

	<form class="form-comment" method="POST" action="index.php?a=admin/login">
		<label>Логин:</label>
		<input type="text" name="login" required>

		<label>Пароль:</label>
		<input type="password" name="password" required>

		<button type="submit">Войти</button>   
	</form>  

    <div class="error">
        <?php echo App::flashGet('admin') ?>
    </div>   
</div>

<?php App::render('admin/footer') ?>