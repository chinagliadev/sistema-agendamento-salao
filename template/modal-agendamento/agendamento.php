<?php
require_once './dao/ProfissionalDAO.php';

$profissionalDAO = new ProfissionalDAO();
$listaProfissionais = $profissionalDAO->listarProfissionais();
?>

<div class="modal fade" id="modal-agendamento" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg rounded-4">

      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title" id="titulo-modal">
          <i class="bi bi-calendar-check me-2"></i>
          Agendar Serviço
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="formAgendamento" action="./controller/gerenciar_agendamento.php" method="POST">
          <input type="hidden" id="idUsuario" name="idUsuario">
          <input type="hidden" id="idServico" name="idServico">
          <input type="hidden" name="acaoAgendamento" value="agendar">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">
                <i class="bi bi-clock me-1"></i> Horário
              </label>
              <select id="horario" class="form-select" name="hora" required>
                <option value="">Selecione</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">
                <i class="bi bi-calendar-event me-1"></i> Data
              </label>
              <input id="data" class="form-control" type="date" name="data" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">
              <i class="bi bi-person-badge me-1"></i> Profissional
            </label>

            <select name="profissional_id" class="form-select" required>
              <option value="">Selecione um profissional</option>

              <?php foreach ($listaProfissionais as $profissional): ?>
                <option value="<?= $profissional['id_profissional']; ?>">
                  <?= $profissional['nome']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>


          <div id="alerta-erro" class="alert alert-danger small d-none">
            <i class="bi bi-exclamation-triangle-fill me-1"></i>
            <span class="msg-texto"></span>
          </div>

          <div class="alert alert-info small">
            <i class="bi bi-info-circle me-1"></i>
            Escolha a data e o horário desejado para o atendimento.
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle"></i> Cancelar
        </button>
        <button form="formAgendamento" type="submit" class="btn btn-primary">
          <i class="bi bi-check-circle"></i> Confirmar Agendamento
        </button>
      </div>

    </div>
  </div>
</div>