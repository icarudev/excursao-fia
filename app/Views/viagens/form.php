<?= $this->extend('layouts/main') ?>
<?= $this->section('main') ?>

<div class="card col-md-6">
    <div class="card-header text-light  bg-dark">
        <h4> <?= isset($viagens) ? 'Editar ' : 'Nova ' ?> Viagem</h4>

    </div> <br>
    <form action="salvar" method="post">

        <div class="col">
            <label class="form-label fw-bold">LOCAL: </label>
            <input class="form-control" type="text" name="local" required>
        </div>

        <div class="col">
            <label class="form-label fw-bold">HOTEL: </label>
            <input class="form-control" type="text" name="hotel" required>
        </div>

        <div class="col">
            <label class="form-label fw-bold">GUIAS: </label>
            <input class="form-control" type="text" name="guias" required>
        </div>

        <br> <br>

        <button type="submit" class="btn btn-success"> Salvar </button>
    </form>


</div>


<?= $this->endSection() ?>