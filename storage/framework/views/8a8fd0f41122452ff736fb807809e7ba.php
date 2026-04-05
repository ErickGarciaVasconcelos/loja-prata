<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - Suas Pratas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --admin-dark: #1e1e2d;
            --admin-accent: #6c757d;
            --admin-bg: #f4f7f6;
        }

        body {
            background-color: var(--admin-bg);
            font-family: 'Montserrat', sans-serif;
            color: #444;
        }

        .admin-header {
            background: white;
            padding: 20px 0;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 30px;
        }

        .admin-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--admin-dark);
            margin: 0;
        }

        .card-panel {
            background: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8f9fa;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            font-weight: 600;
            color: #888;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
        }

        .table tbody td {
            padding: 15px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f8f9fa;
        }

        .img-preview {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .sku-badge {
            background: #e9ecef;
            color: #495057;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .btn-action {
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 6px 12px;
            transition: all 0.2s;
        }

        .btn-edit {
            color: #0d6efd;
            background: #eef5ff;
            border: none;
        }

        .btn-edit:hover { background: #0d6efd; color: white; }

        .btn-delete {
            color: #dc3545;
            background: #fff5f5;
            border: none;
        }

        .btn-delete:hover { background: #dc3545; color: white; }

        .btn-new {
            background: var(--admin-dark);
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .btn-new:hover { color: white; opacity: 0.9; }
    </style>
</head>
<body>

<header class="admin-header">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="admin-title">Gerenciar Pratas</h1>
        <a href="<?php echo e(route('produtos.create')); ?>" class="btn-new">
            + Nova Joia
        </a>
    </div>
</header>

<main class="container">
    <?php if(session('sucesso')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-left: 5px solid #198754 !important;">
            <?php echo e(session('sucesso')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card card-panel">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>SKU</th>
                        <th>Detalhes do Banho</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <?php if($p->images->first()): ?>
                                    <img src="<?php echo e(asset('storage/'.$p->images->first()->image_path)); ?>" class="img-preview me-3">
                                <?php else: ?>
                                    <div class="img-preview me-3 bg-light d-flex align-items-center justify-content-center">
                                        <small class="text-muted">Sem foto</small>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <span class="d-block fw-semibold"><?php echo e($p->name); ?></span>
                                    <small class="text-muted">ID: #<?php echo e($p->id); ?></small>
                                </div>
                            </div>
                        </td>
                        <td><span class="sku-badge"><?php echo e($p->sku); ?></span></td>
                        <td><span class="text-muted small"><?php echo e($p->plating_details); ?></span></td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="<?php echo e(route('produtos.edit', $p->id)); ?>" class="btn btn-action btn-edit">
                                    Editar
                                </a>
                                
                                <form action="<?php echo e(route('produtos.destroy', $p->id)); ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja remover esta peça permanentemente?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-action btn-delete">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="<?php echo e(url('/')); ?>" class="text-muted small text-decoration-none">← Voltar para a Vitrine Pública</a>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\erick\Downloads\PROJETO 1\loja-prata\resources\views/admin/produtos/index.blade.php ENDPATH**/ ?>