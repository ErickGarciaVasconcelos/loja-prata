

<?php $__env->startSection('title', 'Cuidados com a Prata - Reis da Prataria'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    /* Estilos específicos da página de Cuidados */
    .page-header {
        background-color: var(--cor-secundaria);
        padding: 100px 0 80px 0;
        text-align: center;
    }
    
    .page-title {
        font-family: 'Playfair Display', serif;
        font-weight: 400;
        font-size: 3rem;
        color: var(--cor-texto);
        margin-bottom: 20px;
    }
    
    .page-subtitle {
        font-size: 1.1rem;
        color: var(--cor-texto-mutado);
        font-weight: 300;
        letter-spacing: 1px;
    }

    .linha-decorativa {
        width: 60px;
        height: 2px;
        background-color: var(--cor-champanhe);
        margin: 0 auto 30px auto;
    }

    .care-card {
        background: var(--cor-fundo);
        border: 1px solid var(--cor-borda);
        padding: 40px;
        height: 100%;
        transition: all 0.4s ease;
        text-align: center;
    }

    .care-card:hover {
        border-color: var(--cor-champanhe);
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.04);
    }

    .care-icon {
        font-size: 2.5rem;
        color: var(--cor-champanhe);
        margin-bottom: 25px;
        transition: transform 0.4s ease;
    }

    .care-card:hover .care-icon {
        transform: scale(1.1); /* Ícone cresce levemente no hover */
    }

    .care-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        margin-bottom: 15px;
        color: var(--cor-texto);
        font-weight: 600;
    }

    .care-text {
        color: var(--cor-texto-mutado);
        line-height: 1.8;
        font-size: 0.95rem;
    }

    .highlight-box {
        background-color: var(--cor-secundaria);
        border-left: 4px solid var(--cor-champanhe);
        padding: 40px;
        margin-top: 60px;
    }

    .highlight-text {
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        color: var(--cor-texto);
        line-height: 1.8;
        font-style: italic;
        margin: 0;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<header class="page-header">
    <div class="container">
        <h1 class="page-title">Cuidados com a Prata</h1>
        <div class="linha-decorativa"></div>
        <p class="page-subtitle">O brilho que atravessa gerações exige pequenos rituais de carinho.</p>
    </div>
</header>

<section class="container py-5 mt-4">
    
    <div class="row justify-content-center mb-5">
        <div class="col-md-10">
            <div class="highlight-box text-center">
                <p class="highlight-text">
                    "O escurecimento da prata (oxidação) é um processo natural e comprova a pureza do metal. Ele ocorre pelo contato com o suor, gases presentes no ar ou cosméticos. Com os cuidados corretos, sua joia retornará ao brilho original."
                </p>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-2">
        
        <div class="col-md-6">
            <div class="care-card">
                <i class="fas fa-spray-can care-icon"></i>
                <h3 class="care-title">Uso de Cosméticos</h3>
                <p class="care-text">Evite o contato direto com perfumes, cremes, laquês e tinturas de cabelo. A regra de ouro é: a joia deve ser a última coisa que você coloca ao se vestir e a primeira que você tira ao se despir.</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="care-card">
                <i class="fas fa-swimming-pool care-icon"></i>
                <h3 class="care-title">Água e Cloro</h3>
                <p class="care-text">Retire suas peças antes de entrar no banho, no mar ou na piscina. O cloro, a areia e a salinidade são altamente corrosivos e aceleram severamente o processo de oxidação da prata.</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="care-card">
                <i class="fas fa-gem care-icon"></i>
                <h3 class="care-title">Armazenamento</h3>
                <p class="care-text">Guarde suas joias limpas e totalmente secas. Utilize saquinhos plásticos individuais bem fechados ou porta-joias forrados com veludo para evitar o atrito entre as peças e o contato com o ar.</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="care-card">
                <i class="fas fa-magic care-icon"></i>
                <h3 class="care-title">Limpeza e Polimento</h3>
                <p class="care-text">Para o dia a dia, utilize apenas uma flanela mágica apropriada para prata. Para uma limpeza mais profunda, lave com água morna e sabão neutro, secando muito bem com um pano macio e secador de cabelo no modo frio.</p>
            </div>
        </div>

    </div>

    <div class="text-center mt-5 pt-5">
        <p class="text-muted mb-4">Pronto para encontrar a peça perfeita e cuidar dela para sempre?</p>
        <a href="<?php echo e(url('/')); ?>" class="btn-primario">Explorar a Coleção</a>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\erick\Downloads\PROJETO 1\loja-prata\resources\views/paginas/cuidados.blade.php ENDPATH**/ ?>