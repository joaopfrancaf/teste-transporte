<?php

$entregas = [
    'A' => 3,
    'B' => 5,
    'C' => 2,
    'D' => 4,
    'E' => 1,
    'F' => 6,
    'G' => 3,
    'H' => 5,
    'I' => 2,
    'J' => 7,
];

$limite = 8;
$frota = [];

arsort($entregas); // ordena decrescentemente

while (!empty($entregas)) {
    $caminhao = [];

    foreach ($entregas as $entrega => $tempo) {
        $caminhao[$entrega] = $tempo;

        if (array_sum($caminhao) > $limite) { // remove o ultimo item que estorou o limite
            unset($caminhao[$entrega]);
            continue;
        }

        if (array_sum($caminhao) == $limite) {
            break;
        }
    }

    $frota[] = $caminhao;

    foreach ($caminhao as $entrega => $_) { // remove as entregas usadas
        unset($entregas[$entrega]);
    }

    arsort($entregas);
}

var_dump($frota);
echo("numero de caminhoes: ") . sizeof($frota) . "<br>";