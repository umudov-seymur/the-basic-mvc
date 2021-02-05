<?php require __DIR__.'/partials/header.php';?>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= $task->name ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php require __DIR__.'./partials/footer.php';?>