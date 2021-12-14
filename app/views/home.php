<h1>Essa é a home dos users</h1>

<ul>
    <?php foreach ($users as $user): ?>
        <li><?php echo $user->name; ?> | <a href='<?php echo "./user/$user->id"; ?>'>detalhes</a></li>
    <?php endforeach; ?>
</ul>