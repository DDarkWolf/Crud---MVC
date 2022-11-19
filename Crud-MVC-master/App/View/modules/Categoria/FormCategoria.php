<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        label,
        input {
            display: block;
        }
    </style>
</head>

<body>
    <form action="/categoria/save" method="post">
        <fieldset>
            <legend>Cadastro de Categoria</legend>
            <input type="hidden" id="id" name="id" value="<?= $model->id ?>"> <!-- Input do tipo hidden só para não aparecer na tela -->
            <!-- vai receber o id do model que é passado pela controller -->
            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" value="<?= $model->nome ?>" />
            <!-- vai receber o nome do model que é passado pela controller -->

            <button type="submit">Enviar</button>

        </fieldset>
    </form>

</body>

</html>