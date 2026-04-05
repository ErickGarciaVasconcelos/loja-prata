<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reis da Prataria | Artigos de Prata para Gastronomia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/dist/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,800;1,400&display=swap');

        :root {
            --cor-fundo: #FFFFFF;
            --cor-texto: #1C1E21;
            --cor-prata: #A8A9AD;
            --cor-grafite: #2C3338;
            --cor-gelo: #F4F6F8;
        }

        body { font-family: 'Montserrat', sans-serif; color: var(--cor-texto); scroll-behavior: smooth; }
        h1, h2, h3, .font-luxo { font-family: 'Playfair Display', serif; }
        
        .btn-luxo { background: var(--cor-grafite); color: #fff; border-radius: 0; padding: 15px 35px; letter-spacing: 2px; text-transform: uppercase; transition: 0.3s; text-decoration: none; display: inline-block; border: none; }
        .btn-luxo:hover { background: var(--cor-prata); color: #fff; }

        /* 1. NAVBAR */
        .navbar { background: white; border-bottom: 1px solid #eee; sticky-top: 0; z-index: 1000; }
        
        /* 2. HERO (FOCO EM RESTAURANTE/MESA POSTA) */
        .hero { height: 85vh; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1544145945-f904253d0c7b?q=80&w=2000&auto=format&fit=crop'); background-size: cover; background-position: center; display: flex; align-items: center; color: white; text-align: center; }

        /* 3. CATEGORIAS DE ARTIGOS */
        .cat-card { height: 350px; background-size: cover; background-position: center; display: flex; align-items: flex-end; padding: 25px; color: white; text-decoration: none; transition: 0.4s; position: relative; overflow: hidden; border: 1px solid #eee; }
        .cat-card::after { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); }
        .cat-content { z-index: 2; }

        /* 4. QUALIDADE TÉCNICA */
        .features { padding: 80px 0; background: var(--cor-gelo); }
        
        /* 5. BANNER EXPOSIÇÃO */
        .banner-split { display: flex; flex-wrap: wrap; align-items: center; }
        .banner-img { flex: 1; min-width: 300px; height: 550px; background-size: cover; background-position: center; }

        /* 7. DURABILIDADE PROFISSIONAL */
        .specs { background: var(--cor-grafite); color: white; padding: 80px 0; }

        /* 10. FOOTER */
        footer { background: #111; color: #888; padding: 50px 0; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg py-3 sticky-top">
        <div class="container d-flex justify-content-between">
            <a href="#" class="h4 m-0 font-luxo text-dark text-decoration-none" style="letter-spacing: 2px;">REIS DA PRATARIA</a>
            <a href="{{ route('produtos.vitrine') }}" class="btn btn-sm btn-outline-dark rounded-0 px-4 fw-bold">CATÁLOGO TÉCNICO</a>
        </div>
    </nav>

    <header class="hero" style="padding: 100px 0;"> <div class="container flex-container" style="display: flex; align-items: center; justify-content: space-between; gap: 50px; flex-wrap: wrap;"> <div class="text-content" style="flex: 1; min-width: 300px;"> <h1 class="display-3 mb-3">A Excelência de Servir.</h1>
            <p class="lead mb-5 text-uppercase" style="letter-spacing: 3px;">Artigos de Prata de Alta Performance para Restaurantes e Eventos</p>
            <a href="{{ route('produtos.vitrine') }}" class="btn-luxo">Ver Coleção Completa</a>
            </div>
            <div class="image-content" style="flex: 1; text-align: center; min-width: 300px;"> <img src="Gemini_Generated_Image_avzsmoavzsmoavzs.png" alt="Conjunto de talheres de prata de alta qualidade" class="img-hero" style="max-width: 100%; height: auto; max-height: 500px;"> </div>
        </div>
    </header>

    <section class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-5">Especialidades</h2>
            <p class="text-muted">Soluções em prata para cada detalhe do seu serviço.</p>
            <img src="https://images.unsplash.com/photo-1590650516494-0c8e4a4dd6a5?q=80&w=800&auto=format&fit=crop" alt="Talheres de Prata" class="img-hero" style="max-width: 100%; height: auto; margin-top: 20px;">
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <a href="#" class="cat-card" style="background-image: url('https://images.unsplash.com/photo-1574362848149-11496d93a7c7?q=80&w=600&auto=format&fit=crop');">
                    <div class="cat-content"><h3>Rechauds & Banho Maria</h3></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="cat-card" style="background-image: url('https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=600&auto=format&fit=crop');">
                    <div class="cat-content"><h3>Bandejas & Travessas</h3></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="cat-card" style="background-image: url('https://images.unsplash.com/photo-1590650516494-0c8e4a4dd6a5?q=80&w=600&auto=format&fit=crop');">
                    <div class="cat-content"><h3>Talheres & Servir</h3></div>
                </a>
            </div>
        </div>
    </section>

    <section class="features text-center">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-4">
                    <i class="fa-solid fa-shield-halved fa-2x mb-3 text-secondary"></i>
                    <h4>Banho Reforçado</h4>
                    <p class="text-muted">Prata de alta espessura desenvolvida para uso intenso em buffets e restaurantes.</p>
                </div>
                <div class="col-md-4">
                    <i class="fa-solid fa-temperature-three-quarters fa-2x mb-3 text-secondary"></i>
                    <h4>Resistência Térmica</h4>
                    <p class="text-muted">Peças que mantêm a temperatura e a beleza mesmo sob calor constante.</p>
                </div>
                <div class="col-md-4">
                    <i class="fa-solid fa-check-double fa-2x mb-3 text-secondary"></i>
                    <h4>Padrão Internacional</h4>
                    <p class="text-muted">Acabamento impecável que atende às normas de hotelaria de luxo.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="banner-split">
        <div class="banner-img" style="background-image: url('https://images.unsplash.com/photo-1544145945-f904253d0c7b?q=80&w=1000&auto=format&fit=crop');"></div>
        <div class="bg-white p-5 d-flex flex-column justify-content-center align-items-start" style="flex: 1;">
            <h2 class="display-4 mb-4">Elevando o Padrão do seu Buffet</h2>
            <p class="lead text-muted mb-4">Entendemos que o visual do serviço é tão importante quanto o sabor. Nossos artigos em prata garantem o brilho necessário para eventos inesquecíveis.</p>
            <a href="{{ route('produtos.vitrine') }}" class="btn-luxo">Solicitar Orçamento</a>
        </div>
    </section>

    <section class="py-5 text-center container">
        <h2 class="mb-5">Hospitalidade e Opinião</h2>
        <div class="row">
            <div class="col-md-6">
                <p class="lead italic">"As peças da Reis da Prataria elevaram o nível visual do nosso buffet. Durabilidade excelente."</p>
                <strong>- Chef Roberto A., Grand Hotel</strong>
            </div>
            <div class="col-md-6">
                <p class="lead italic">"Prataria robusta e fácil de manter. O brilho se mantém mesmo após meses de uso diário."</p>
                <strong>- Buffet Elegance</strong>
            </div>
        </div>
    </section>

    <section class="specs text-center">
        <div class="container">
            <h2 class="display-6 mb-5 text-uppercase" style="letter-spacing: 3px;">Padrão Técnico Reis</h2>
            <div class="row">
                <div class="col-md-4 border-end"><h4>Base em Aço</h4><p>Alta durabilidade</p></div>
                <div class="col-md-4 border-end"><h4>Banho Puro</h4><p>Prata 90 a 100g</p></div>
                <div class="col-md-4"><h4>Polimento</h4><p>Espelhado de Alto Brilho</p></div>
            </div>
        </div>
    </section>

    <section class="py-5 text-center bg-light">
        <div class="container">
            <h2 class="mb-4">Precisa de um Catálogo Customizado?</h2>
            <p class="text-muted mb-4">Fale com nossos especialistas em hotelaria e gastronomia pelo WhatsApp.</p>
            <a href="{{ route('orcamento.index') }}" class="btn-luxo">Falar com Consultor</a>
        </div>
    </section>

    <section class="py-5 text-center">
        <div class="container">
            <h3 class="font-luxo"><i class="fa-solid fa-award me-3"></i>Garantia de Qualidade Reis da Prataria</h3>
            <p class="text-muted mt-3">Todas as nossas peças profissionais possuem certificação de pureza do banho de prata.</p>
        </div>
    </section>

    <footer>
        <div class="container text-center">
            <h4 class="text-white font-luxo mb-4">REIS DA PRATARIA</h4>
            <p class="small">Especialistas em Prataria Profissional e Gastronômica.</p>
            <div class="mt-4 border-top pt-4">
                &copy; {{ date('Y') }} Todos os direitos reservados.
            </div>
        </div>
    </footer>

</body>
</html>