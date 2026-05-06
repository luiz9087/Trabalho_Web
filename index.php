    <?php
    require 'dados.php';

    $categoriaSelecionada = $_GET['categoria'] ?? null;
    $escolhido = [];

    $escolhido = array_filter($itens, function($item) use ($categoriaSelecionada) {
        return !$categoriaSelecionada 
            || $categoriaSelecionada === 'Todas' 
            || $item['modalidade'] === $categoriaSelecionada;}
    );
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold text-primary">Academia Fit</h1>
            <p class="text-muted">Escolha sua modalidade favorita</p>
        </div>

    <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
        <a href="index.php?categoria=Todas" class="btn btn-outline-secondary">Todas</a>
        <a href="index.php?categoria=Musculação" class="btn btn-outline-secondary">Musculação</a>
        <a href="index.php?categoria=Crossfit" class="btn btn-outline-secondary">Crossfit</a>
        <a href="index.php?categoria=Natação" class="btn btn-outline-secondary">Natação</a>
        <a href="index.php?categoria=Artes Marciais" class="btn btn-outline-secondary">Artes Marciais</a>
        <a href="index.php?categoria=Dança" class="btn btn-outline-secondary">Dança</a>
        <a href="index.php?categoria=Funcional" class="btn btn-outline-secondary">Funcional</a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Atividade</th>
                            <th>Modalidade</th>
                            <th>Mensalidade</th>
                            <th>Vagas</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($escolhido as $item): ?>
                        <tr>
                            <td><?= $item["nome"] ?></td>
                            <td><?= $item["modalidade"] ?></td>
                            <td>R$ <?= number_format($item["mensalidade"], 2, ',', '.') ?></td>
                            <td><?= $item["vagas_turma"] ?></td>
                            <td>
                                <a href="detalhes.php?id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">
                                    Ver detalhes
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
