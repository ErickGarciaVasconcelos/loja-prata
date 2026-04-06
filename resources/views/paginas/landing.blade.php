<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reis da Prataria | Joias em Prata 925</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/dist/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,800;1,400&display=swap');

        :root {
            --cor-fundo: #FFFFFF;
            --cor-texto: #1C1E21;
            --cor-champanhe: #C5B39A;
            --cor-gelo: #F8F9FA;
        }

        body { font-family: 'Montserrat', sans-serif; color: var(--cor-texto); scroll-behavior: smooth; }
        h1, h2, h3, .font-luxo { font-family: 'Playfair Display', serif; }
        .btn-luxo { background: var(--cor-texto); color: #fff; border-radius: 0; padding: 15px 35px; letter-spacing: 2px; text-transform: uppercase; transition: 0.3s; text-decoration: none; display: inline-block; border: none; }
        .btn-luxo:hover { background: var(--cor-champanhe); color: #fff; }

        /* SEÇÃO 1: NAVBAR */
        .navbar { background: white; border-bottom: 1px solid #eee; sticky-top: 0; z-index: 1000; }
        
        /* SEÇÃO 2: HERO (IMPACTO) */
        .hero {
            height: 90vh;
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)),
                        url('{{ asset('img/hero-prataria.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            color: white;
            text-align: center;
        }

        /* SEÇÃO 3: CATEGORIAS */
        .cat-card { height: 400px; background-size: cover; background-position: center; display: flex; align-items: flex-end; padding: 30px; color: white; text-decoration: none; transition: 0.4s; position: relative; overflow: hidden; }
        .cat-card:hover { transform: scale(1.02); color: white; }
        .cat-card::after { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); }
        .cat-content { z-index: 2; }

        /* SEÇÃO 4: POR QUE PRATA 925? */
        .features { padding: 100px 0; background: var(--cor-gelo); }
        
        /* SEÇÃO 5: DESTAQUES (BANNERS) */
        .banner-split { display: flex; flex-wrap: wrap; }
        .banner-img { flex: 1; min-width: 300px; height: 500px; background-size: cover; background-position: center; }

        /* SEÇÃO 6: TESTEMUNHOS */
        .quotes { padding: 80px 0; font-style: italic; }

        /* SEÇÃO 7: PROCESSO / CURADORIA */
        .process { background: var(--cor-texto); color: white; padding: 100px 0; }

        /* SEÇÃO 8: NEWSLETTER */
        .newsletter { padding: 80px 0; border-top: 1px solid #eee; }

        /* SEÇÃO 10: FOOTER */
        footer { background: #111; color: #888; padding: 60px 0; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg py-3 sticky-top">
        <div class="container d-flex justify-content-between">
            <a href="#" class="h4 m-0 font-luxo text-dark text-decoration-none" style="letter-spacing: 3px;">REIS DA PRATARIA</a>
            <div>
                <a href="{{ route('produtos.vitrine') }}" class="btn btn-sm btn-outline-dark rounded-0 px-4">ENTRAR NA LOJA</a>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <h1 class="display-2 mb-3">A sua essência <br> moldada em prata.</h1>
            <p class="lead mb-5 text-uppercase" style="letter-spacing: 4px;">Joias exclusivas de Prata 925</p>
            <a href="{{ route('produtos.vitrine') }}" class="btn-luxo">Conhecer Coleção</a>
        </div>
    </header>

    <section class="container py-5 mt-5">
        <div class="text-center mb-5">
            <h2 class="display-5">Nossas Coleções</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <a href="#" class="cat-card" style="background-image: url('https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?q=80&w=600&auto=format&fit=crop');">
                    <div class="cat-content"><h3>Colares</h3></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="cat-card" style="background-image: url('https://images.unsplash.com/photo-1611591437281-460bfbe1220a?q=80&w=600&auto=format&fit=crop');">
                    <div class="cat-content"><h3>Anéis</h3></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="cat-card" style="background-image: url('https://images.unsplash.com/photo-1635767793021-952078b197c0?q=80&w=600&auto=format&fit=crop');">
                    <div class="cat-content"><h3>Pulseiras</h3></div>
                </a>
            </div>
        </div>
    </section>

    <section class="features text-center">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-4">
                    <i class="fa-solid fa-gem fa-2x mb-3"></i>
                    <h4>Prata 925 Legítima</h4>
                    <p class="text-muted">Garantia vitalícia sobre a autenticidade do material.</p>
                </div>
                <div class="col-md-4">
                    <i class="fa-solid fa-truck-fast fa-2x mb-3"></i>
                    <h4>Envio Seguro</h4>
                    <p class="text-muted">Suas joias protegidas e seguradas até a sua porta.</p>
                </div>
                <div class="col-md-4">
                    <i class="fa-solid fa-leaf fa-2x mb-3"></i>
                    <h4>Hipoalergênico</h4>
                    <p class="text-muted">Peças livres de níquel, ideais para peles sensíveis.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="banner-split">
        <div class="banner-img" style="background-image: url('https://images.unsplash.com/photo-1602173574767-37ac01994b2a?q=80&w=1000&auto=format&fit=crop');"></div>
        <div class="bg-white p-5 d-flex flex-column justify-content-center align-items-start" style="flex: 1;">
            <h2 class="display-4 mb-4">Curadoria de Luxo</h2>
            <p class="lead text-muted mb-4">Selecionamos cada peça manualmente para garantir que você receba não apenas uma joia, mas um símbolo de elegância.</p>
            <a href="{{ route('produtos.vitrine') }}" class="btn-luxo">Ver Catálogo</a>
        </div>
    </section>

    <section class="quotes text-center container">
        <h2 class="mb-5">O que dizem nossas clientes</h2>
        <div class="row">
            <div class="col-md-4">
                <p>"A qualidade da prata é absurda. Brilha muito mais que as outras que já comprei!"</p>
                <strong>- Mariana S.</strong>
            </div>
            <div class="col-md-4">
                <p>"O atendimento pelo WhatsApp foi impecável. Minha pulseira chegou em 2 dias."</p>
                <strong>- Fernanda L.</strong>
            </div>
            <div class="col-md-4">
                <p>"Embalagem linda, dá pra ver o carinho em cada detalhe da Reis da Prataria."</p>
                <strong>- Beatriz R.</strong>
            </div>
        </div>
    </section>

    <section class="process text-center">
        <div class="container">
            <h2 class="display-5 mb-5">Do Design ao Seu Coração</h2>
            <div class="row">
                <div class="col-md-3"><h3>01</h3><p>Seleção</p></div>
                <div class="col-md-3"><h3>02</h3><p>Polimento</p></div>
                <div class="col-md-3"><h3>03</h3><p>Inspeção</p></div>
                <div class="col-md-3"><h3>04</h3><p>Entrega</p></div>
            </div>
        </div>
    </section>

    <section class="newsletter text-center">
        <div class="container">
            <h2 class="mb-4 font-luxo">Faça parte do Club Reis</h2>
            <p class="text-muted mb-4">Receba lançamentos exclusivos e ofertas de pré-venda.</p>
            <form class="row justify-content-center g-2">
                <div class="col-md-4"><input type="email" class="form-control rounded-0" placeholder="Seu melhor e-mail"></div>
                <div class="col-md-auto"><button type="submit" class="btn-luxo" style="padding: 10px 30px;">Assinar</button></div>
            </form>
        </div>
    </section>

    <section class="py-5 bg-light text-center">
        <p class="text-uppercase mb-2" style="letter-spacing: 2px;">Siga-nos no Instagram</p>
        <h3 class="font-luxo">@reisdaprataria</h3>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-white font-luxo mb-4">REIS DA PRATARIA</h3>
                    <p>Elegância em Prata 925.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; 2026 Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>