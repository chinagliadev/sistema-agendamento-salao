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
        <form action="" method="POST">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">
                <i class="bi bi-clock me-1"></i> Horário
              </label>
              <select class="form-select" name="hora" required>
                <option value="">Selecione</option>
                <option>09:00</option>
                <option>10:00</option>
                <option>11:00</option>
                <option>12:00</option>
                <option>13:00</option>
                <option>14:00</option>
                <option>15:00</option>
                <option>16:00</option>
                <option>17:00</option>
                <option>18:00</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">
                <i class="bi bi-calendar-event me-1"></i> Data
              </label>
              <input class="form-control" type="date" name="data" required>
            </div>
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
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-check-circle"></i> Confirmar Agendamento
        </button>
      </div>

    </div>
  </div>
</div>
