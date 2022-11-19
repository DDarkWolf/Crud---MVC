<?php if (isset($_GET['erro'])) {
    echo 'Dados incorretos';
} ?>
<form action="/login/auth" method="POST">
    <label for="email">E-Mail:</label>
    <input type="email" name="email" id="email" />

    <label for="senha">senha:</label>
    <input type="password" name="senha" id="email" />

    <button type="submit">Entrar</button>
</form>