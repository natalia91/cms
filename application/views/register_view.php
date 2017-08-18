<?php if($message == 'adduser' ) :?>
<div class="green_message">Вы успешно зарегистрированы!</div>
<?php endif;?>

<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $user->id ?>">
	<p>Введите ваше имя</p>
    <p><input type="text" name="name" value="<?php echo $user->name ?>"></p>
    <p>Введите ваш e-mail</p>
    <p><input type="text" name="email" value="<?php echo $user->email ?>"></p>
	<p>Введите ваш телефон в формате +380ххххххххх</p>
    <p><input type="text" name="phone" value="<?php echo $user->phone ?>"></p>

    <p><input type="submit" name="register" value="Зарегистрироваться"></p>
</form>