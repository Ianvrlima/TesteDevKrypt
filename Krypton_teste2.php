<!DOCTYPE html>
<html>
<head>
    <title>Tabela Krypton Atividades</title>
</head>
</html>
<?php

$atividades = array(
    array('Atividade' => 'tomar café da manhã', 'hora' => '06:30'),
    array('Atividade' => 'correr', 'hora' => '06:45'),
    array('Atividade' => 'tomar banho', 'hora' => '07:15'),
    array('Atividade' => 'transito', 'hora' => '07:40'),
    array('Atividade' => 'ler emails ', 'hora' => '08:15'),
    array('Atividade' => 'ir para cada dos avós', 'hora' => '09:00'),
    array('Atividade' => 'almoço em família', 'hora' => '12:00'),
    array('Atividade' => 'ver filme em casa', 'hora' => '14:00'),
    array('Atividade' => 'tomar banho', 'hora' => '17:00'),
    array('Atividade' => 'arrumar para aniversario', 'hora' => '17:20'),
    array('Atividade' => 'transito', 'hora' => '17:45'),
    array('Atividade' => 'comemoração do aniversario', 'hora' => '18:30'),
    array('Atividade' => 'transito', 'hora' => '21:30'),
    array('Atividade' => 'ligar video game', 'hora' => '22:00'),
    array('Atividade' => 'descansar', 'hora' => '23:00'),
);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pagina = isset($_POST['pagina']) ? $_POST['pagina'] : 1;
    $registrosPorPagina = 5;

    usort($atividades, function ($a, $b) {
        return strcmp($a['hora'], $b['hora']);
    });

    $indiceInicial = ($pagina - 1) * $registrosPorPagina;
    $indiceFinal = $indiceInicial + $registrosPorPagina - 1;
    $registrosPagina = array_slice($atividades, $indiceInicial, $registrosPorPagina);
    $resposta = array(
        'pagina' => $pagina,
        'registrosPorPagina' => $registrosPorPagina,
        'totalRegistros' => count($atividades),
        'dados' => $registrosPagina
    );

    header('Content-Type: application/json');
    echo json_encode($resposta);
}
?>
