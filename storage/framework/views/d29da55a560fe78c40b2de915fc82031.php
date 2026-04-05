<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Orçamento - Joias em Prata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fcfcfc; color: #222; font-family: 'Segoe UI', sans-serif; }
        .navbar { background-color: #ffffff; border-bottom: 1px solid #eaeaea; }
        .brand-logo { font-weight: 300; letter-spacing: 3px; text-transform: uppercase; color: #111; font-size: 1.5rem; text-decoration: none; }
        .btn-voltar { background-color: #fff; color: #111; border: 1px solid #111; border-radius: 0; text-transform: uppercase; font-size: 0.85rem; padding: 10px 20px; text-decoration: none; }
        .btn-voltar:hover { background-color: #f0f0f0; color: #000; }
        .btn-enviar { background-color: #25D366; color: #fff; border-radius: 0; text-transform: uppercase; font-size: 0.85rem; padding: 10px 20px; border: none; display: inline-block; text-decoration: none; }
        .btn-enviar:hover { background-color: #128C7E; color: #fff; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="brand-logo" href="<?php echo e(url('/')); ?>">Reis da Prataria</a>
            <a href="<?php echo e(url('/')); ?>" class="text-dark text-decoration-none small" style="text-transform: uppercase; letter-spacing: 1px;">← Voltar ao Catálogo</a>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="mb-4" style="font-weight: 300;">Seu Orçamento</h2>

        <?php if(session('sucesso')): ?>
            <div class="alert alert-success mb-4" style="border-radius: 0;">
                <?php echo e(session('sucesso')); ?>

            </div>
        <?php endif; ?>

        <?php if(count($orcamento) > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Código</th>
                            <th>Produto</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orcamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-muted"><?php echo e($item['id']); ?></td>
                                <td style="font-weight: 500;"><?php echo e($item['nome']); ?></td>
                                <td class="text-end">
                                    <form action="<?php echo e(route('orcamento.remove', $index)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-sm btn-link text-danger text-decoration-none" style="font-size: 0.75rem; text-transform: uppercase;">
                                            [ Remover ]
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="<?php echo e(url('/')); ?>" class="btn btn-voltar">Adicionar mais peças</a>
                
                <a href="<?php echo e(route('orcamento.whatsapp')); ?>" class="btn btn-enviar" target="_blank">
                    Enviar pelo WhatsApp
                </a>
            </div>
        <?php else: ?>
            <div class="alert alert-secondary text-center py-5" style="border-radius: 0;">
                <p class="mb-3">Sua lista de orçamento está vazia.</p>
                <a href="<?php echo e(url('/')); ?>" class="btn btn-voltar">Ver Catálogo</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html><?php /**PATH C:\Users\erick\Downloads\PROJETO 1\loja-prata\resources\views/paginas/orcamento.blade.php ENDPATH**/ ?>