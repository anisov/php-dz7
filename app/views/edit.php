<form action="edituser?id=<?= $id ?>" method="post">
    <p>Имя</p>
    <input type="text" name="name" value="<?=$user->name?>"/> <br>
    <p>Пароль</p>
    <input type="password" name="password" value=""/> <br>
    <?= !empty($error['error-password']) ? $error['error-password'] : '' ?>
    <p>Повторите пароль</p>
    <input type="password" name="password2" value=""/> <br>
    <p>Возраст</p>
    <input type="text" name="age" value="<?=$user->age;?>"/> <br>
    <?= !empty($error['error-age']) ? $error['error-age'] : '' ?>
    <p>Описание</p>
    <input type="text" name="description" value="<?=$user->description;?>"/> <br>
    <input type="submit">
</form>