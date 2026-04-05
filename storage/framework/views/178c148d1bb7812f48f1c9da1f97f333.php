

<?php $__env->startSection('title', 'Coleção Completa - Reis da Prataria'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .page-header {
        background-color: var(--cor-secundaria);
        padding: 80px 0 60px 0;
        text-align: center;
    }
    .page-title {
        font-family: 'Playfair Display', serif;
        font-weight: 400;
        font-size: 2.5rem;
        color: var(--cor-texto);
        margin-bottom: 15px;
    }
    .linha-decorativa {
        width: 60px;
        height: 2px;
        background-color: var(--cor-champanhe);
        margin: 0 auto;
    }

    /* Estilos dos Cards (Herdados do padrão) */
    .card-joia { border: 1px solid transparent; transition: all 0.4s ease; background: var(--cor-fundo); height: 100%; display: flex; flex-direction: column; }
    .card-joia:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(0,0,0,0.06); border-color: var(--cor-borda); }
    .foto-container { width: 100%; height: 320px; background-color: #ffffff; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px; flex-shrink: 0; }
    .foto-produto { max-width: 100%; max-height: 100%; object-fit: contain; transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .card-joia:hover .foto-produto { transform: scale(1.05); }
    
    .product-sku { color: var(--cor-champanhe); font-size: 0.75rem; letter-spacing: 2px; font-weight: 600; display: block; margin-bottom: 5px; }
    .product-title { font-family: 'Playfair Display', serif; font-size: 1.1rem; font-weight: 600; margin-top: 10px; }
    
    .btn-orcamento { background-color: var(--cor-champanhe); color: #fff; border-radius: 0; text-transform: uppercase; font-size: 0.80rem; font-weight: 600; letter-spacing: 2px; padding: 14px 24px; transition: all 0.3s ease; border: 1px solid var(--cor-champanhe); margin-top: auto; }
    .btn-orcamento:hover { background-color: var(--cor-destaque); color: #fff; border-color: var(--cor-destaque); }

    /* Estilização da Paginação (Deixando chique) */
    .pagination { margin-top: 40px; justify-content: center; }
    .page-link { color: var(--cor-texto); border: none; padding: 10px 15px; margin: 0 5px; font-weight: 500; }
    .page-link:hover { background-color: var(--cor-secundaria); color: var(--cor-champanhe); }
    .page-item.active .page-link { background-color: var(--cor-champanhe); color: #fff; border-color: var(--cor-champanhe); }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<header class="page-header">
    <div class="container">
        <h1 class="page-title">Nossa Coleção Completa</h1>
        <div class="linha-decorativa"></div>
    </div>
</header>

<div class="container py-5">
    <div class="row g-4">
        
        <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-5">
            <div class="card card-joia">
                <div class="foto-container">
                    <?php if($produto->images->first()): ?>
                        <img src="<?php echo e(asset('storage/' . $produto->images->first()->image_path)); ?>" 
                             class="foto-produto" 
                             alt="<?php echo e($produto->name); ?>">
                    <?php else: ?>
                        <span class="text-muted small">Foto em breve</span>
                    <?php endif; ?>
                </div>

                <div class="card-body text-center d-flex flex-column">
                    <span class="product-sku"><?php echo e($produto->sku); ?></span>
                    <h5 class="product-title"><?php echo e($produto->name); ?></h5>
                    <p class="text-muted small mb-4"><?php echo e($produto->plating_details); ?></p>
                    
                    <form action="<?php echo e(route('orcamento.add')); ?>" method="POST" class="mt-auto">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="produto_id" value="<?php echo e($produto->sku); ?>">
                        <input type="hidden" name="produto_nome" value="<?php echo e($produto->name); ?>">
                        <button type="submit" class="btn btn-orcamento w-100">Adicionar à Lista</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <div class="d-flex justify-content-center mt-5">
        <?php echo e($produtos->links('pagination::bootstrap-5')); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\erick\Downloads\PROJETO 1\loja-prata\resources\views/produtos/catalogo.blade.php ENDPATH**/ ?>