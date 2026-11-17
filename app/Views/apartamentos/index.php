<?= $this->extend('layouts/main') ?>
<?= $this->section('main') ?>

<!-- <div class="row align-items-center mb-3">
    <div class="col-sm-6">
        <h2 class="m-2"> Apartamentos </h2>
    </div>
    <div class="text-end">
        <div class="col-sm-6 text-end noPrint">
            <a class="btn btn-secondary" href="<?= base_url('apartamentos/novo') ?>"> <i class="fa-solid fa-plus"></i>
                Adicionar um Apartamento</a>
        </div>
        <button></button>
    </div>  
</div> -->

<div class="row align-items-center mb-3">
    <div class="col-sm-6">
        <h2 class="m-2">Apartamentos</h2>
    </div>


    <div class="col-sm-6 text-end noPrint">
        <div class="row text-end">
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-file"></i> Gerar PDF
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li> <a class="dropdown-item btn btn-primary" onclick="pdfOnibus()" href="#"> <i class="fa-solid fa-bus mr-2"></i> Onibus </a></li>
                        <li> <a class="dropdown-item btn btn-primary" onclick="pdfHotel()" href="#"> <i class="fa-solid fa-hotel mr2"></i> Hotel </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col ">
    <a class="btn btn-secondary me-2" href="<?= base_url('apartamentos/novo') ?>">
        <i class="fa-solid fa-plus"></i> Adicionar um Apartamento
    </a>
</div>

<div class="row mb-3">
    <div class="col-md-4 m-3">
        <form method="get" action="<?= current_url() ?>">
            <label for="viagem_id" class="form-label fw-bold noPrint ">Filtrar por Viagem:</label>
            <select name="viagem_id" id="viagem_id" class="form-select" onchange="this.form.submit()">
                <option class="noPrint" value="">Todas as Viagens</option>
                <?php foreach ($viagens as $v): ?>
                    <option value="<?= esc($v['id']) ?>" <?= ($viagemSelecionada == $v['id']) ? 'selected' : '' ?>>
                        <?= esc($v['local']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
</div>

<table class="table table-striped align-middle">
    <thead>
        <tr class="table-dark">
            <th>Chave</th>
            <th style="width: 150px;" class="noPrint">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($apartamentos as $a): ?>
            <?php $collapseId = 'collapse-' . $a['id']; ?>

            <tr class="fw-bold table-secondary">
                <td>
                    <div class="accordion" id="accordion-<?= $a['id'] ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <strong>
                                    <button class="accordion-button collapsed fw-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#<?= $collapseId ?>" aria-expanded="false"
                                        aria-controls="<?= $collapseId ?>">
                                        <?= 'Apelido: ' . esc($a['apelido']) ?>
                                    </button>
                                </strong>
                            </h2>
                            <div id="<?= $collapseId ?>" class="accordion-collapse collapse">
                                <div class="accordion-body fw-normal">

                                    <div>
                                        <strong id="modelo">Modelo do apartamento:</strong>
                                        <li class="fw-bold" id="modelo"> <?= strtoupper(esc($a['modelos'])) ?> </li>
                                    </div> <br>

                                    <strong>Pessoas no apartamento:</strong>

                                    <div class="row mt-2">
                                        <?php $temPessoa = false; ?>
                                        <?php foreach ($pessoas as $p): ?>
                                            <?php if ($p['apartamento_id'] == $a['id']): ?>
                                                <?php $temPessoa = true; ?>

                                                <div class="col-md-3 col-6 mb-3 fw-bold">
                                                    <div class="border rounded p-2">
                                                        <span> (NOME: <?= esc($p['nome']) ?>) </span> <br>
                                                        <span> (CPF: <?= esc($p['cpf']) ?>) </span> <br>
                                                        <span> (RG: <?= esc($p['rg']) ?>) </span> <br>
                                                        <span> (NASCIMENTO: <?= date('d/m/Y', strtotime(esc($p['data_nascimento']))) ?>) </span>
                                                        <span id="poltrona"> (POLTRONA: <?= esc($p['poltrona']) ?>) </span>
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php if (!$temPessoa): ?>
                                            <div class="col-12">
                                                <p class="mb-0">Nenhuma pessoa cadastrada neste apartamento.</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </td>

                <td class="noPrint">
                    <a class="btn btn-danger" href="<?= base_url('apartamentos/deletar/' . $a['id']) ?>" title="Deletar">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                    <a class="btn btn-primary" href="<?= base_url('apartamentos/editar/' . $a['id']) ?>" title="Editar">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    function pdfOnibus() {

        spanModelos = document.querySelectorAll('[id="modelo"]')

        spanModelos.forEach(elemento => {
            elemento.style.display = "none"
        })

        window.print()
        location.reload()
    }

    function pdfHotel() {
        poltrona = document.querySelectorAll('[id="poltrona"]')

        poltrona.forEach(element => {
            element.style.display = "none"
        })

        window.print()
        location.reload()
    }
</script>
<?= $this->endSection() ?>