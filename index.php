<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP 07</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
        $salario = $_GET['salario'] ?? 0;
        $salarioMinimo = 1380;
        $resultado = intdiv($salario, $salarioMinimo);
        $dinheiroAMais = $salario % $salarioMinimo;
        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    ?>

    <main>
        <h1>Informe seu salário</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="salario">Salário (R$)</label>
            <input type="number" name="salario" id="salario">
            <p>Considerado o salário mínimo de <strong> <?= numfmt_format_currency($padrao, $salarioMinimo, "BRL") ?></strong></p>
            <input type="submit" value="Calcular">
        </form>

        <section>
            <h2>Resultado Final</h2>
            <p>Quem recebe um salário de <?php echo numfmt_format_currency($padrao, $salario, "BRL")?> ganha <strong>
            <?= $resultado ?> salários mínimos + </strong> <?php
                if ($salario < $salarioMinimo) {
                    echo 0;
                } else {
                    echo numfmt_format_currency($padrao, $dinheiroAMais, "BRL");
                }
                ?></p>
        </section>
    </main>
</body>
</html>