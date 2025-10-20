<?php

$entregas = [
    'A' => 20,
    'B' => 50,
    'C' => 32,
    'D' => 12,
    'E' => 80,
];

//questao 1
$autonomia = 25 * 4; // 100 km
$resultado = [];
$chaves = array_keys($entregas);
$total = count($chaves);

for ($i = 1; $i < (1 << $total); $i++) { //gera todas as combinações possíveis.
    $comb = [];
    $distancia = 0;

    for ($j = 0; $j < $total; $j++) { // monta a lista de entregas + soma a distância.
        if ($i & (1 << $j)) {
            $entrega = $chaves[$j];
            $distancia += $entregas[$entrega];
            $comb[] = $entrega;
        }
    }

    if ($distancia <= $autonomia) { //filtra se esta dentro da economia
        $resultado[] = [
            'entregas' => implode(", ", $comb),
            'distancia' => $distancia
        ];
    }
}

//questao 2
$tanque_inicial_l = 25;
$consumo_km_por_l = 4;

$distancia_total = array_sum($entregas);
$litros_necessarios = $distancia_total / $consumo_km_por_l;
$litros_adicionais = max(0, $litros_necessarios - $tanque_inicial_l);


//resultados
echo "combinacoes dentro da autonomia";
foreach ($resultado as $r) {
    echo "- entrega: {$r['entregas']} ({$r['distancia']} km) <br>";
}

echo "litros adicionais necessários para passar por todos: {$litros_adicionais} L <br>";
