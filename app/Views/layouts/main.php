<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema - Excursão Fia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="icon" type="image/png" href="<?= base_url('favicon.png') ?>">
    <style>
        @media print {

            /* 1. Remove cabeçalho e rodapé do navegador (data, hora, título) */
            @page {
                margin: 0;
            }

            body {
                margin: 1.5cm;
            }

            /* 2. Esconde o que tem a classe noPrint e o cabeçalho da tabela */
            .noPrint,
            thead {
                display: none !important;
            }

            /* 3. Quebra a página após cada linha da tabela (1 apartamento por folha) */
            table,
            tbody,
            tr,
            td {
                display: block;
                width: 100%;
                border: none !important;
            }

            tr {
                page-break-after: always;
                break-after: page;
                height: 100%;
            }

            /* Evita criar uma folha em branco extra no final da impressão */
            tr:last-child {
                page-break-after: auto;
                break-after: auto;
            }

            /* 4. Força todos os accordions a ficarem ABERTOS na impressão */
            .accordion-collapse {
                display: block !important;
                height: auto !important;
                visibility: visible !important;
            }

            /* Remove a setinha do botão do accordion na folha */
            .accordion-button::after {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <?= $this->include('partials/nav') ?>
    <main>
        <?= $this->renderSection('main') ?>
        <?php $this->renderSection('content') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>