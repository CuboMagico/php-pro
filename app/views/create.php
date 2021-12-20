<form action="/user/create" method="post">
    <input type="text" name="name" placeholder="Seu nome">
    <?php echo getFlash("name"); ?>
    <br>
    
    <input type="email" name="email" placeholder="Seu email">
    <?php echo getFlash("email"); ?>
    <br>
    
    <input type="password" name="password" placeholder="Sua senha">
    <?php echo getFlash("password"); ?>
    <br>
    
    <input type="submit" value="Cadastrar">
</form>