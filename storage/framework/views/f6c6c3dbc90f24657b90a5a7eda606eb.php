<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Reis da Prataria'); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/dist/css/all.min.css">
    
    <style>
        /* Importando as fontes de luxo do Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap');

        /* Paleta "Gelo & Toque de Latão" */
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

        /* --- Estilos Globais do Site --- */
        .navbar { background-color: var(--cor-fundo); border-bottom: 1px solid var(--cor-champanhe); padding: 15px 0; }
        .brand-logo { font-family: 'Playfair Display', serif; font-weight: 600; letter-spacing: 4px; text-transform: uppercase; color: var(--cor-texto); font-size: 1.6rem; text-decoration: none;}
        
        .btn-primario { background-color: var(--cor-champanhe); color: #fff; border-radius: 0; text-transform: uppercase; font-size: 0.85rem; font-weight: 600; letter-spacing: 2px; padding: 16px 32px; transition: all 0.3s ease; border: 1px solid var(--cor-champanhe); text-decoration: none; display: inline-block; }
        .btn-primario:hover { background-color: var(--cor-destaque); border-color: var(--cor-destaque); color: #fff; }

        footer { background-color: var(--cor-secundaria); border-top: 3px solid var(--cor-champanhe); padding: 80px 0 30px 0; margin-top: 100px; }
        .footer-title { font-family: 'Playfair Display', serif; font-size: 1.1rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 25px; font-weight: 600; color: var(--cor-texto); }
        .footer-link { display: block; color: var(--cor-texto-mutado); text-decoration: none; font-size: 0.9rem; margin-bottom: 12px; transition: color 0.3s ease; }
        .footer-link:hover { color: var(--cor-champanhe); }
        .social-icons a { color: var(--cor-texto); font-size: 1.2rem; margin-right: 20px; transition: transform 0.3s ease, color 0.3s ease; }
        .social-icons a:hover { transform: translateY(-3px); color: var(--cor-champanhe); }
        .footer-bottom { margin-top: 60px; padding-top: 30px; border-top: 1px solid var(--cor-borda); font-size: 0.75rem; color: var(--cor-texto-mutado); text-align: center; letter-spacing: 1.5px; text-transform: uppercase; }

        /* Área onde o CSS de cada página específica será injetado */
        <?php echo $__env->yieldContent('styles'); ?>
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

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

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
                    <p class="footer-link mb-1"><i class="fas fa-phone me-2"></i> (11) 92002-4952</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\erick\Downloads\PROJETO 1\loja-prata\resources\views/layouts/site.blade.php ENDPATH**/ ?>