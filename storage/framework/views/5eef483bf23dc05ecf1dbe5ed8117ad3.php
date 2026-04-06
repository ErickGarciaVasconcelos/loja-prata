<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Joias em Prata</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Importando as fontes de luxo do Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap');

        /* Paleta "Gelo & Toque de Latão" - Luxo, Clean e Equilibrado */
        :root {
            --cor-fundo: #FFFFFF;         
            --cor-secundaria: #F4F6F8;    
            --cor-texto: #1C1E21;         
            --cor-destaque: #2C3338;      
            --cor-borda: #E5E8EB;         
            --cor-texto-mutado: #6B7280;  
            --cor-champanhe: #C5B39A;     
        }

        body { 
            background-color: var(--cor-fundo); 
            color: var(--cor-texto); 
            font-family: 'Montserrat', sans-serif; 
            -webkit-font-smoothing: antialiased; 
            -moz-osx-font-smoothing: grayscale;
        }

        .navbar { 
            background-color: var(--cor-fundo); 
            border-bottom: 1px solid var(--cor-champanhe); /* Linha fina elegante */
            padding: 15px 0; 
        }

        .brand-logo { 
            font-family: 'Playfair Display', serif; 
            font-weight: 600; 
            letter-spacing: 4px; 
            text-transform: uppercase; 
            color: var(--cor-texto); 
            font-size: 1.6rem; 
            text-decoration: none;
        }
        
        .hero-section { 
            background-color: var(--cor-secundaria); 
            padding: 100px 0; 
            text-align: center; 
        }
        
        .card-joia { 
            border: 1px solid transparent; 
            transition: all 0.4s ease; 
            background: var(--cor-fundo); 
            height: 100%; 
            display: flex; 
            flex-direction: column; 
        }
        
        .card-joia:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 15px 35px rgba(0,0,0,0.06); 
            border-color: var(--cor-borda); 
        }
        
        .foto-placeholder { 
            height: 280px; 
            background-color: var(--cor-secundaria); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            overflow: hidden; 
        }

        .product-sku {
            color: var(--cor-champanhe); /* SKU visível e sofisticado */
            font-size: 0.75rem;
            letter-spacing: 2px;
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }
        
        .product-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 10px;
        }

        .btn-orcamento { 
            background-color: var(--cor-champanhe); /* Botão em latão/champanhe */
            color: #fff; /* Texto branco no botão */
            border-radius: 0; 
            text-transform: uppercase; 
            font-size: 0.80rem; 
            font-weight: 600;
            letter-spacing: 2px; 
            padding: 14px 24px; 
            transition: all 0.3s ease;
            border: 1px solid var(--cor-champanhe);
            margin-top: auto; 
        }

        .btn-orcamento:hover { 
            background-color: var(--cor-destaque); /* Fica chumbo ao passar o mouse */
            color: #fff; 
            border-color: var(--cor-destaque); 
        }

        /* Estilo do novo botão de "Ver Coleção" */
        .btn-primario {
            background-color: var(--cor-fundo);
            color: var(--cor-texto);
            border-radius: 0;
            text-transform: uppercase;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 2px;
            padding: 16px 32px;
            transition: all 0.3s ease;
            border: 1px solid var(--cor-borda);
            text-decoration: none;
            display: inline-block;
        }

        .btn-primario:hover {
            background-color: var(--cor-champanhe);
            color: #fff;
            border-color: var(--cor-champanhe);
        }

        .foto-container {
            width: 100%;
            height: 320px; 
            background-color: #ffffff; 
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 20px; 
            flex-shrink: 0; 
        }

        .foto-produto {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain; 
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94); 
        }

        .card-joia:hover .foto-produto {
            transform: scale(1.05); 
        }

        footer {
            background-color: var(--cor-secundaria); 
            border-top: 3px solid var(--cor-champanhe); /* Fechamento elegante */
            padding: 80px 0 30px 0;
            margin-top: 100px;
        }

        .footer-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 25px;
            font-weight: 600;
            color: var(--cor-texto);
        }

        .footer-link {
            display: block;
            color: var(--cor-texto-mutado); 
            text-decoration: none;
            font-size: 0.9rem;
            margin-bottom: 12px;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--cor-champanhe); 
        }

        .social-icons a {
            color: var(--cor-texto);
            font-size: 1.2rem;
            margin-right: 20px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .social-icons a:hover {
            transform: translateY(-3px);
            color: var(--cor-champanhe); 
        }

        .footer-bottom {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid var(--cor-borda);
            font-size: 0.75rem;
            color: var(--cor-texto-mutado);
            text-align: center;
            letter-spacing: 1.5px; 
            text-transform: uppercase;
        }
    </style>
</head>
<body> 
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="brand-logo" href="<?php echo e(url('/')); ?>">Reis da Prataria</a>
            
            <a href="<?php echo e(route('orcamento.index')); ?>" class="btn btn-outline-dark" style="border-radius: 0; font-size: 0.85rem; text-transform: uppercase;">
                Ver Orçamento (<?php echo e(count(session('orcamento', []))); ?>)
            </a>
        </div>
    </nav>

    <?php if(session('sucesso')): ?>
        <div class="alert alert-success text-center m-0" style="border-radius: 0;">
            <?php echo e(session('sucesso')); ?>

        </div>
    <?php endif; ?>

    <div class="hero-section">
        <div class="container">
            <h1 class="display-4" style="font-weight: 300;">Elegância em cada detalhe.</h1>
            <p class="lead text-muted mt-3">Explore nosso catálogo exclusivo e solicite seu orçamento.</p>
        </div>
    </div>

    <div class="container py-5">
        <h3 class="mb-4 text-center" style="font-weight: 300; letter-spacing: 2px;">DESTAQUES</h3>
        
        <div class="row g-4 mt-2">
            
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
        
        </div> <div class="text-center mt-5 pt-4">
            <p class="text-muted mb-4" style="font-family: 'Playfair Display', serif; font-style: italic; font-size: 1.1rem;">
                Deseja explorar mais peças exclusivas?
            </p>
            <a href="<?php echo e(route('produtos.catalogo')); ?>" class="btn-primario">
                Ver Coleção Completa
            </a>
        </div>

    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/dist/css/all.min.css">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title">Reis da Prataria</h5>
                    <p class="text-muted small" style="line-height: 1.8;">
                        Especialistas em joias de prata 925 com design exclusivo e acabamento impecável. Nossa missão é eternizar momentos através do brilho das nossas peças.
                    </p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-md-2 mb-4">
                    <h5 class="footer-title">Menu</h5>
                    <a href="<?php echo e(url('/')); ?>" class="footer-link">Início</a>
                    <a href="<?php echo e(route('orcamento.index')); ?>" class="footer-link">Meus Orçamentos</a>
                </div>

                <div class="col-md-3 mb-4">
                    <h5 class="footer-title">Suporte</h5>
                    <a href="<?php echo e(route('paginas.como-funciona')); ?>" class="footer-link">Como funciona</a>
                    <a href="<?php echo e(route('paginas.cuidados')); ?>" class="footer-link">Cuidados com a Prata</a>
                </div>

                <div class="col-md-3 mb-4">
                    <h5 class="footer-title">Atendimento</h5>
                    <p class="footer-link mb-1"><i class="fas fa-envelope me-2"></i> contato@suamarca.com.br</p>
                    <p class="footer-link mb-1"><i class="fas fa-phone me-2"></i> (11) 93002-5104</p>
                    <p class="footer-link mt-3 small">
                        Segunda a Sexta: 09h às 18h<br>
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; <?php echo e(date('Y')); ?> REIS DA PRATARIA - TODOS OS DIREITOS RESERVADOS.
            </div>
        </div>
    </footer>
</body>
</html><?php /**PATH C:\Users\erick\Downloads\PROJETO 1\loja-prata\resources\views/paginas/welcome.blade.php ENDPATH**/ ?>