<a href="createuser">Создать</a>
<table>
    <tr>
        <th>ID пользователя</th>
        <th>Имя пользователя</th>
        <th>Управление</th>
    </tr>
    <?php
    foreach ($users as $user) : ?>
        <tr>
            <td><a href="show.php?id=<?= $user->id; ?>"><?= $user->id ?></a></td>
            <td><a href="show.php?id=<?= $user->id; ?>"><?= $user->name ?></a></td>
            <td>
                <a href="edituser?id=<?= $user->id; ?>">edit</a>
                <a href="deleteuser?id=<?= $user->id; ?>">delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>