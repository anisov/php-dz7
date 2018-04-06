<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Авторизация</a></li>
                <li><a href="registration">Регистрация</a></li>
                <li><a href="userlist">Список пользователей</a></li>
                <li><a href="filelist">Список файлов</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="form-container">
        <form class="form-horizontal" action=""  enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="login" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" name="login" class="form-control" id="login" placeholder="Логин">
                    <?= !empty($error['error-login']) ? $error['error-login'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Пароль">
                    <?= !empty($error['error-password']) ? $error['error-password'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password2" class="col-sm-2 control-label">Пароль (Повтор)</label>
                <div class="col-sm-10">
                    <input type="password" name="password2" class="form-control" id="password2" placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Имя</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Дмитрий">
                    <?= !empty($error['error-password']) ? $error['error-password'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="col-sm-2 control-label">Возраст</label>
                <div class="col-sm-10">
                    <input type="text" name="age" class="form-control" id="age" placeholder="21">
                    <?= !empty($error['error-age']) ? $error['error-age'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" id="description" placeholder="Описание">
                </div>
            </div>
            <div class="form-group">
                <label for="photo" class="col-sm-2 control-label">Фото</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control" id="photo" placeholder="Фото">
                    <?= !empty($error['error-photo']) ? $error['error-photo'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                    <br><br>
                    Зарегистрированы? <a href="index.php">Авторизируйтесь</a>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
