<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
</head>

<body>

    <h1>Noticias</h1>
    <hr>
    <ul>
        <?php foreach ($noticias as $noticia) : ?>
            <li><a href="<?= BASE_URL ?>/noticia/verNoticia/<?= $noticia['id'] ?>"><?= $noticia['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>

    <hr>

    <p><a href="<?= BASE_URL ?>">Voltar para Home</a></p>


</body>

</html>