<?= $this->extend('layouts/main') ?>
<?= $this->section('main') ?>
<div class="row">
    <div class="col-sm-6">
        <h2> - Pessoas </h2>
    </div>
    <div class="col-sm-6">
        <a class="btn btn-secondary" href="<?= base_url('viagens/novo') ?>"> Adicionar uma viagem </a>
    </div>
</div>

<br>
<table class="table">
    <thead>
        <tr class="table-primary">
            <th>Local</th>
            <th>Hotel</th>
            <th>Guias</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php foreach ($pessoas as $p): ?>
                <td> <?= $p['local'] ?> </td>
                <td> <?= $p['hotel'] ?> </td>
                <td> <?= $p['guias'] ?> </td>
                <td class="align-items-center">

                    <a class="btn btn-danger " href="<?= base_url("pessoas/deletar/" . $p['id']) ?>">
                        <i class="fa-solid fa-trash-can"> </i> </a>

                    <a class="btn btn-primary " href="<?= base_url("pessoas/editar/" . $p['id']) ?>"> <i
                            class="fa-solid fa-pencil"></i> </a>

                </td>
            <?php endforeach; ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection() ?>