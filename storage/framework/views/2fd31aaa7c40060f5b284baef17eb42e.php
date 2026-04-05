<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Joia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Editar: <?php echo e($produto->name); ?></h4>
                        
                        <form action="<?php echo e(route('produtos.update', $produto->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?> <div class="mb-3">
                                <label class="form-label">Código (SKU)</label>
                                <input type="text" name="sku" class="form-control" value="<?php echo e($produto->sku); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nome da Peça</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($produto->name); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Detalhes do Banho</label>
                                <input type="text" name="plating_details" class="form-control" value="<?php echo e($produto->plating_details); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Foto Atual</label>
                                <?php if($produto->images->first()): ?>
                                    <img src="<?php echo e(asset('storage/' . $produto->images->first()->image_path)); ?>" width="100" class="mb-2 rounded border">
                                <?php endif; ?>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                <small class="text-muted">Deixe em branco para manter a foto atual.</small>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 mt-3">Salvar Alterações</button>
                            <a href="<?php echo e(route('produtos.index')); ?>" class="btn btn-link w-100 text-muted mt-2">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('dashboard'),'active' => request()->routeIs('dashboard')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('dashboard')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('dashboard'))]); ?>
        <?php echo e(__('Dashboard')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('produtos.index'),'active' => request()->routeIs('produtos.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('produtos.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('produtos.*'))]); ?>
        <?php echo e(__('Gerenciar Joias')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>

    <div class="inline-flex items-center px-1 pt-1">
</body>
</html><?php /**PATH C:\Users\erick\Downloads\PROJETO 1\loja-prata\resources\views/admin/produtos/edit.blade.php ENDPATH**/ ?>