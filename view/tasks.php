<head>
    <meta charset="UTF-8">
    <title>Задачи</title>
</head>
<body>

<h1><?=$pageHeader?></h1>
<a href="?action=logout">Выйти</a>
<a href="?action=home">Главная страница</a>
<h1>Ваши задачи:</h1>
<?php foreach ($tasks as $task => $value ) : ?>
<ol>
    <li><?php echo $value->getDescription() ?></li>
    <a href="/?controller=tasks&action=done&key=<?=$value->getId()?>">Выполнено</a>
</ol>
<?php endforeach ?>
<h1>Список выполненных задач:</h1>
<?php foreach ($tasksIsDone as $task => $value ) : ?>
    <ol>
        <li><?php echo $value->getDescription()?></li>
        <a href="/?controller=tasks&action=delete&key=<?=$value->getId()?>">Удалить</a>
    </ol>
<?php endforeach ?>
<h3>Введите новую задачу</h3>
<form method="post" action="/?controller=tasks&action=add">
    <input type="text" name="task" placeholder="Введите задачу">
    <input type="number" name="priority" placeholder="Введите приоритет задачи">
    <input type="submit" value="Новая задача">
</form>

</body>