<?php if(logged()) { redirect("/"); } ?>

<h2>Login</h2>

<form action="/login" method="POST">
    <?php echo getFlash("login"); ?>
    <input type="text" name="email" placeholder="Seu email" value="maciel@gmail.com">
    <input type="password" name="password" placeholder="Sua senha" value="123">
    <input type="submit" value="Login">
</form>