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
    [
        "id" => '1',
        "nome" => 'Karatê',
        "mensalidade" => '120',
        "modalidade" => 'Artes Marciais',
        "vagas_turma" => '7',
        "numero_meses" => '6',
        "confirmacao" => 'Matricula em Dia'
    ],
    [
        "id" => '2',
        "nome" => 'Natação',
        "mensalidade" => '180',
        "modalidade" => 'Esporte aquatico',
        "vagas_turma" => '11',
        "numero_meses" => '2',
        "confirmacao" => 'Matricula em Dia'
    ],
    [
        "id" => '3',
        "nome" => 'Acadêmia',
        "mensalidade" => '140',
        "modalidade" => 'Musculação',
        "vagas_turma" => 'Ilimitada',
        "numero_meses" => '14',
        "confirmacao" => 'Matricula Atrasada'
    ],
    [
        "id" => '4',
        "nome" => 'Crossfit',
        "mensalidade" => '170',
        "modalidade" => 'Crossfit',
        "vagas_turma" => '4',
        "numero_meses" => '9',
        "confirmacao" => 'Matricula Atrasada'
    ],
    [
        "id" => '5',
        "nome" => 'Zumba',
        "mensalidade" => '150',
        "modalidade" => 'Dança',
        "vagas_turma" => '3',
        "numero_meses" => '7',
        "confirmacao" => 'Matricula em Dia'
    ],
    [
        "id" => '6',
        "nome" => 'Funcional',
        "mensalidade" => '200',
        "modalidade" => 'Funcional',
        "vagas_turma" => '10',
        "numero_meses" => '17',
        "confirmacao" => 'Matricula Atrasada'
    ]
];

function buscasItem($id,$itens){
    foreach ($itens as $item){
        if($item['id'] == $id){
            return $item;
        }
    }
    return null;
}