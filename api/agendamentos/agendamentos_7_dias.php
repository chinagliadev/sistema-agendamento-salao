<?php
require_once '../../dao/AgendamentoDAO.php';

header('Content-Type: application/json');

$dao = new AgendamentoDAO();
echo json_encode($dao->agendamentosUltimos7Dias());
