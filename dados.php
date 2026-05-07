<?php 

$modalidades = [
    'Musculação',
    'Crossfit',
    'Funcional',
    'Artes Marciais',
    'Natação',
    'Dança'
];

$itens = [
    ["id" => '1', "nome" => 'Karatê', "mensalidade" => 120, "modalidade" => 'Artes Marciais', "vagas_turma" => 7],
    ["id" => '2', "nome" => 'Natação', "mensalidade" => 180, "modalidade" => 'Natação', "vagas_turma" => 11],
    ["id" => '3', "nome" => 'Academia', "mensalidade" => 140, "modalidade" => 'Musculação', "vagas_turma" => 200],
    ["id" => '4', "nome" => 'Crossfit', "mensalidade" => 170, "modalidade" => 'Crossfit', "vagas_turma" => 4],
    ["id" => '5', "nome" => 'Zumba', "mensalidade" => 150, "modalidade" => 'Dança', "vagas_turma" => 0],
    ["id" => '6', "nome" => 'Funcional', "mensalidade" => 200, "modalidade" => 'Funcional', "vagas_turma" => 10]
];

function buscarItemPorId($id, $lista) {
    foreach ($lista as $item) {
        if ($item['id'] == $id) return $item;
    }
    return null;
}