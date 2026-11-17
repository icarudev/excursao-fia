<?= $this->extend('layouts/main') ?>
<?= $this->section('main') ?>

<div class="card col">
    <div class="card-header text-light bg-dark">
        <h4><?= isset($apartamentos) ? 'Editar ' : 'Novo ' ?> Apartamento</h4>
    </div>

    <form id="meuForm" class="m-3" action="<?= current_url() ?>" method="get">

        <!-- =========================== -->
        <!-- VIAGEM && MODELO && APELIDO -->
        <!-- =========================== -->
        <div class="row">
            <div class="col">
                <label class="fw-bold">Viagem: </label>
                <select class="form-control mb-3" name="viagem_id" onchange="this.form.submit()" required>
                    <option value="">Selecione a viagem...</option>

                    <?php if (!empty($viagens)): ?>
                        <?php foreach ($viagens as $viagem): ?>
                            <?php
                            $selecionado = ($_GET['viagem_id'] ?? old('viagem_id')) == $viagem['id'] ? 'selected' : '';
                            ?>
                            <!-- Corrigido: usando $viagem['id'] no value -->
                            <option value="<?= $viagem['id'] ?>" <?= $selecionado ?>>
                                <?= esc($viagem['local']) ?>
                            </option>
                        <?php endforeach ?>
                    <?php endif ?>
                </select>
            </div>

            <div class="col">
                <label class="fw-bold">Modelo:</label>
                <!-- Passando 'this' para a função -->
                <select id="modelos" class="form-control mb-3" name="modelos" onchange="getModelo()" required>
                    <option value="">Selecione o modelo...</option>
                    <!-- Corrigido: removido espaço antes de 'casal' -->
                    <option value="casal" <?= ($_GET['modelos'] ?? old('modelos')) == 'casal' ? 'selected' : '' ?>>
                        Casal
                    </option>
                    <option value="duplo" <?= ($_GET['modelos'] ?? old('modelos')) == 'duplo' ? 'selected' : '' ?>>
                        Duplo
                    </option>
                    <option value="triplo" <?= ($_GET['modelos'] ?? old('modelos')) == 'triplo' ? 'selected' : '' ?>>
                        Triplo
                    </option>
                    <option value="quadruplo"
                        <?= ($_GET['modelos'] ?? old('modelos')) == 'quadruplo' ? 'selected' : '' ?>>
                        Quadruplo
                    </option>
                </select>
            </div>

            <div class="col">
                <label class="fw-bold">Apelido (apartamento):</label>
                <input class="form-control mb-3" type="text" name="apelido"
                    value="<?= esc($_GET['apelido'] ?? old('apelido')) ?>" required>
            </div>
        </div>

        <!-- ===================================== -->
        <!-- ========= DADOS DAS PESSOAS ========= -->
        <!-- ===================================== -->
        <fieldset class="row" id="rowDados" disabled>

            <div class="col">
                <!-- ========= NOMES ========= -->
                <label class="fw-bold">Nomes: </label>
                <input class="form-control mb-2" type="text" name="nome[]" required>
                <input class="form-control mb-2" type="text" name="nome[]" required>
                <input style="display: none" class="form-control mb-2 tri" type="text" name="nome[]">
                <input style="display: none" class="form-control mb-2 quad" type="text" name="nome[]">

                <label class="fw-bold">Nomes (opcional): </label>
                <input class="form-control mb-2 " placeholder="(Opcional)" type="text" name="nome[]">
                <input class="form-control mb-2 " placeholder="(Opcional)" type="text" name="nome[]">

            </div>

            <div class="col">
                <!-- ========= CPF ========= -->
                <label class="fw-bold">CPF: </label>
                <input class="form-control mb-2" type="number" name="cpf[]" required>
                <input class="form-control mb-2" type="number" name="cpf[]" required>
                <input style="display: none" class="form-control mb-2 tri" type="number" name="cpf[]">
                <input style="display: none" class="form-control mb-2 quad" type="number" name="cpf[]">

                <label class="fw-bold">CPF (opcional): </label>
                <input placeholder="(Opcional)" class="form-control mb-2 " type="number" name="cpf[]">
                <input placeholder="(Opcional)" class="form-control mb-2 " type="number" name="cpf[]">

            </div>

            <div class="col">
                <!-- ========= RG ========= -->
                <label class="fw-bold">RG: </label>
                <input class="form-control mb-2" type="text" name="rg[]" required>
                <input class="form-control mb-2" type="text" name="rg[]" required>
                <input style="display: none" class="form-control mb-2 tri" type="text" name="rg[]">
                <input style="display: none" class="form-control mb-2 quad" type="text" name="rg[]">

                <label class="fw-bold">RG (opcional): </label>
                <input placeholder="(Opcional)" class="form-control mb-2 " type="text" name="rg[]">
                <input placeholder="(Opcional)" class="form-control mb-2 " type="text" name="rg[]">

            </div>

            <div class="col">
                <!-- ========= NASCIMENTO ========= -->
                <label class="fw-bold">Nascimento: </label>
                <input class="form-control mb-2" type="date" name="data_nascimento[]" required>
                <input class="form-control mb-2" type="date" name="data_nascimento[]" required>
                <input style="display: none" class="form-control mb-2 tri" type="date" name="data_nascimento[]">
                <input style="display: none" class="form-control mb-2 quad" type="date" name="data_nascimento[]">

                <label class="fw-bold">Nascimento (opcional): </label>
                <input placeholder="(Opcional)" class="form-control mb-2" type="date" name="data_nascimento[]">
                <input placeholder="(Opcional)" class="form-control mb-2 " type="date" name="data_nascimento[]">

            </div>

            <div class="col">
                <!-- ========= POLTRONA ========= -->
                <label class="fw-bold">Poltrona: </label>
                <input class="form-control mb-2" type="number" name="poltrona[]" required>
                <input class="form-control mb-2" type="number" name="poltrona[]" required>
                <input style="display: none" class="form-control mb-2 tri" type="number" name="poltrona[]">
                <input style="display: none" class="form-control mb-2 quad" type="number" name="poltrona[]">

                <label class="fw-bold">Poltrona (opcional): </label>
                <input placeholder="(Opcional)" class="form-control mb-2 " type="number" name="poltrona[]">
                <input placeholder="(Opcional)" class="form-control mb-2 " type="number" name="poltrona[]">

            </div>
        </fieldset>


        <br><br>
        <?= csrf_field() ?>
        <button type="submit" formaction="<?= base_url('apartamentos/salvar') ?>" formmethod="post"
            class="btn btn-success">
            Salvar
        </button>
    </form>

    <script>
        function getModelo() {
            let modelo = document.getElementById("modelos").value;
            let rowDados = document.getElementById("rowDados");

            // Seleciona TODOS os inputs com a classe .tri e .quad
            let camposTri = document.querySelectorAll(".tri");
            let camposQuad = document.querySelectorAll(".quad");

            if (modelo === "") {
                rowDados.disabled = true;
            } else {
                rowDados.disabled = false;

                // Uso correto do OU (||) comparando o valor nos dois lados
                if (modelo === "casal" || modelo === "duplo") {
                    camposTri.forEach(el => {
                        el.style.display = "none";
                        el.required = false;
                        el.disabled = true; // Evita enviar campos vazios no POST
                    });
                    camposQuad.forEach(el => {
                        el.style.display = "none";
                        el.required = false;
                        el.disabled = true;
                    });

                } else if (modelo === "triplo") {
                    camposTri.forEach(el => {
                        el.style.display = "block";
                        el.required = true;
                        el.disabled = false;
                    });
                    camposQuad.forEach(el => {
                        el.style.display = "none";
                        el.required = false;
                        el.disabled = true;
                    });

                } else if (modelo === "quadruplo") {
                    camposTri.forEach(el => {
                        el.style.display = "block";
                        el.required = true;
                        el.disabled = false;
                    });
                    camposQuad.forEach(el => {
                        el.style.display = "block";
                        el.required = true;
                        el.disabled = false;
                    });
                }
            }
        }

        // Executa ao carregar a página caso um modelo já venha selecionado via $_GET ou old()
        document.addEventListener("DOMContentLoaded", getModelo);
    </script>


</div>

<?= $this->endSection() ?>