<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-1">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url() ?>">
            <img src="<?php echo base_url('assets/images/logo_fia_tour.png') ?>" width="160" class="img-fluid" /><br>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav fs-5 gap-3">
                <li class=" nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('viagens') ?>">
                        <i class="fa-solid fa-map me-1"></i> Viagens
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('apartamentos') ?>">
                        <i class="fa-solid fa-building me-1"></i> Apartamentos
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('backup') ?>" class="nav-link active" onclick="alterarTexto(this)">
                        <i class="fa-solid fa-coins me-1"></i> Backup
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('pessoas') ?>">
                        <i class="fa-solid fa-user me-1"></i> Pessoas
                    </a>
                </li> -->

            </ul>
        </div>
    </div>
</nav>
<br>

<script>
    function alterarTexto(elemento) {
        const textoOriginal = elemento.innerText;
        elemento.innerText = 'Gerando arquivo...';
        elemento.classList.add('disabled');

        // Restaura o botao apos 3 segundos
        setTimeout(() => {
            elemento.innerText = textoOriginal;
            elemento.classList.remove('disabled');
        }, 3000);
    }
</script>