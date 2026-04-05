

<?php $__env->startSection('title', 'Como Funciona - Reis da Prataria'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    /* Estilos específicos apenas desta página */
    .page-header { background-color: var(--cor-secundaria); padding: 100px 0 80px 0; text-align: center; }
    .page-title { font-family: 'Playfair Display', serif; font-weight: 400; font-size: 3rem; color: var(--cor-texto); margin-bottom: 20px; }
    .page-subtitle { font-size: 1.1rem; color: var(--cor-texto-mutado); font-weight: 300; letter-spacing: 1px; }

    .step-card { background: var(--cor-fundo); padding: 50px 40px; height: 100%; border: 1px solid var(--cor-borda); transition: all 0.4s ease; position: relative; text-align: center; z-index: 1; }
    .step-card:hover { border-color: var(--cor-champanhe); transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0,0,0,0.04); }

    .step-number { font-family: 'Playfair Display', serif; font-size: 5rem; color: var(--cor-champanhe); opacity: 0.2; line-height: 1; margin-bottom: -30px; font-weight: 600; transition: opacity 0.4s ease; }
    .step-card:hover .step-number { opacity: 0.4; }

    .step-icon { font-size: 2rem; color: var(--cor-texto); margin-bottom: 25px; display: inline-block; background-color: var(--cor-fundo); padding: 0 10px; }
    .step-title { font-family: 'Playfair Display', serif; font-weight: 600; font-size: 1.3rem; margin-bottom: 15px; letter-spacing: 0.5px; }
    .step-text { color: var(--cor-texto-mutado); font-size: 0.95rem; line-height: 1.7; }
    
    .linha-decorativa { width: 60px; height: 2px; background-color: var(--cor-champanhe); margin: 0 auto 30px auto; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<header class="page-header">
    <div class="container">
        <h1 class="page-title">Como Funciona</h1>
        <div class="linha-decorativa"></div>
        <p class="page-subtitle">Uma experiência de compra consultiva, feita sob medida para o seu brilho.</p>
    </div>
</header>

<section class="container py-5 mt-4">
    <div class="row g-4">
        
        <div class="col-md-6 col-lg-3">
            <div class="step-card">
                <div class="step-number">01</div>
                <div class="step-icon"><i class="fas fa-search"></i></div>
                <h3 class="step-title">Explore o Catálogo</h3>
                <p class="step-text">Navegue por nossas coleções exclusivas de Prata 925. Selecionamos cada peça pensando na excelência do design e no acabamento impecável.</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="step-card">
                <div class="step-number">02</div>
                <div class="step-icon"><i class="fas fa-list-ul"></i></div>
                <h3 class="step-title">Monte sua Lista</h3>
                <p class="step-text">Ao invés de uma compra impessoal, clique em "Adicionar à Lista" para montar uma seleção com todas as peças que despertaram o seu interesse.</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="step-card">
                <div class="step-number">03</div>
                <div class="step-icon"><i class="fas fa-paper-plane"></i></div>
                <h3 class="step-title">Envie seu Pedido</h3>
                <p class="step-text">Acesse a página de orçamentos, revise as peças escolhidas e preencha um breve formulário. Nós receberemos a sua seleção em instantes.</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="step-card">
                <div class="step-number">04</div>
                <div class="step-icon"><i class="fas fa-gem"></i></div>
                <h3 class="step-title">Atendimento VIP</h3>
                <p class="step-text">Um de nossos consultores entrará em contato para apresentar os valores finais, condições de frete e fechar o seu pedido de forma personalizada.</p>
            </div>
        </div>

    </div>

    <div class="text-center mt-5 pt-4">
        <p class="text-muted mb-4">Pronto para encontrar a peça perfeita?</p>
        <a href="<?php echo e(url('/')); ?>" class="btn-primario">Ver Coleção Completa</a>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\erick\Downloads\PROJETO 1\loja-prata\resources\views/paginas/como-funciona.blade.php ENDPATH**/ ?>