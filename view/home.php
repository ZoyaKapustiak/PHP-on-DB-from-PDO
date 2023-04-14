<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
        <h1><?=$pageHeader?></h1>
        <?php if ($username !== null) : ?>
    <p>Рады вас приветствовать, <?=$username?>!</p>
        <a href="?action=tasks">Ваши задачи </a>
    <a href="?action=logout">Выйти</a>
    <?php else : ?>
        <a href="?action=security">Войти</a>
            <a href="/?controller=registration">[Зарегистрироваться]</a>
    <?php endif ?>
</body>
</html>
