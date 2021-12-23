<ul>
    <li><a href="/">Home</a></li>
    <?php if (!logged()) : ?>
        <li><a href="/login">Login</a></li>
        <li><a href="/user/create">Sign Up</a></li>
    <?php endif; ?>
</ul>

<div>
    Bem vindo,    
    <?php if (logged()) : ?>
        <?php echo user()->name; ?>
        <a href="./logout">Fazer logout</a>
    <?php else : ?>
        visitante
    <?php endif; ?>
</div>