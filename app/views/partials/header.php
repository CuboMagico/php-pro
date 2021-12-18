<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/login">Login</a></li>
    <li><a href="/user/create">Sign Up</a></li>
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