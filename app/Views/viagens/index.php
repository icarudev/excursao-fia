<?= $this->extend('layouts/main') ?>
<?= $this->section('main') ?>
<div class="row">
    <div class="col-sm-6">
        <h2 class="m-2"> Viagens </h2>
    </div>
    <div class="col-sm-6 text-end">
        <a class="btn btn-secondary" href="<?= base_url('viagens/novo') ?>"> Adicionar uma viagem </a>
    </div>
</div>

<br>
<table class="table">
    <thead>
        <tr class="table-dark">
            <th>Local</th>
            <th>Hotel</th>
            <th>Guias</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($viagens as $v): ?>
            <tr class="fw-bold table-secondary">
                <td> <?= $v['local'] ?> </td>
                <td> <?= $v['hotel'] ?> </td>
                <td> <?= $v['guias'] ?> </td>
                <td class="align-items-center">

                    <a class="btn btn-danger " href="<?= base_url("viagens/deletar/" . $v['id']) ?>">
                        <i class="fa-solid fa-trash-can"> </i> </a>

                    <a class="btn btn-primary " href="<?= base_url("viagens/editar/" . $v['id']) ?>"> <i
                            class="fa-solid fa-pencil"></i> </a>

                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<?= $this->endSection() ?>