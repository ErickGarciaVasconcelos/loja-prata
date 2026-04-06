<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">
    <title>Meu Orçamento - Joias em Prata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        /* Variáveis e Base */
        body { 
            background-color: #f8f9fa; 
            color: #333; 
            font-family: 'Montserrat', sans-serif; 
        }
        
        /* Navbar */
        .navbar { 
            background-color: #ffffff; 
            box-shadow: 0 2px 15px rgba(0,0,0,0.04); 
            border: none; 
        }
        .brand-logo { 
            font-weight: 600; 
            letter-spacing: 2px; 
            text-transform: uppercase; 
            color: #2c3e50; 
            font-size: 1.3rem; 
            text-decoration: none; 
        }
        .link-voltar {
            color: #6c757d;
            text-transform: uppercase; 
            letter-spacing: 1px;
            font-size: 0.75rem;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s;
        }
        .link-voltar:hover { color: #2c3e50; }

        /* Títulos */
        .page-title { 
            font-weight: 300; 
            color: #2c3e50; 
            letter-spacing: 1px; 
        }

        /* Tabela e Cards */
        .content-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        .table { margin-bottom: 0; }
        .table th { 
            border-bottom-width: 1px; 
            color: #95a5a6; 
            font-weight: 500; 
            text-transform: uppercase; 
            font-size: 0.8rem; 
            letter-spacing: 1px; 
        }
        .table td { 
            vertical-align: middle; 
            padding: 1rem 0.5rem; 
            color: #444;
        }
        .btn-remover {
            font-size: 0.75rem; 
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: opacity 0.3s;
        }
        .btn-remover:hover { opacity: 0.7; }

        /* Botões Principais */
        .btn-custom { 
            padding: 14px 28px; 
            font-weight: 500; 
            text-transform: uppercase; 
            font-size: 0.85rem; 
            letter-spacing: 1px; 
            border-radius: 8px; 
            transition: all 0.3s ease; 
            text-decoration: none; 
            text-align: center; 
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-voltar { 
            background-color: #fff; 
            color: #2c3e50; 
            border: 1px solid #dce1e6; 
        }
        .btn-voltar:hover { 
            background-color: #f1f3f5; 
            border-color: #c5cbd1; 
            color: #1a252f; 
        }
        .btn-enviar { 
            background-color: #25D366; 
            color: #fff; 
            border: 1px solid #25D366; 
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.25); 
        }
        .btn-enviar:hover { 
            background-color: #128C7E; 
            border-color: #128C7E; 
            color: #fff; 
            box-shadow: 0 6px 20px rgba(18, 140, 126, 0.35); 
            transform: translateY(-2px); 
        }

        /* Ajustes Mobile */
        @media (max-width: 768px) {
            .brand-logo { font-size: 1.1rem; }
            .content-card { padding: 1rem; border-radius: 8px; }
        }
    </style>
</head>
<body>

    <nav class="navbar py-3 sticky-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="brand-logo" href="{{ url('/') }}">Reis da Prataria</a>
            <a href="{{ url('/') }}" class="link-voltar">← Catálogo</a>
        </div>
    </nav>

    <div class="container py-4 py-md-5">
        <h2 class="page-title mb-4 text-center text-md-start">Seu Orçamento</h2>

        @if(session('sucesso'))
            <div class="alert alert-success shadow-sm border-0" style="border-radius: 8px;">
                {{ session('sucesso') }}
            </div>
        @endif

        @if(count($orcamento) > 0)
            <div class="content-card">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Produto</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orcamento as $index => $item)
                                <tr>
                                    <td class="text-muted" style="font-size: 0.9rem;">#{{ $item['id'] }}</td>
                                    <td style="font-weight: 500;">{{ $item['nome'] }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('orcamento.remove', $index) }}" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-link text-danger text-decoration-none btn-remover p-0">
                                                Remover
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-md-between gap-3 mt-2">
                <a href="{{ url('/') }}" class="btn btn-custom btn-voltar">
                    Adicionar mais peças
                </a>
                
                <a href="{{ route('orcamento.whatsapp') }}" class="btn btn-custom btn-enviar" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-whatsapp me-2" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                    </svg>
                    Enviar pelo WhatsApp
                </a>
            </div>
        @else
            <div class="content-card text-center py-5">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#dce1e6" class="bi bi-cart-x" viewBox="0 0 16 16">
                        <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                </div>
                <h5 style="font-weight: 500; color: #2c3e50;">Sua lista está vazia</h5>
                <p class="text-muted mb-4">Adicione belas joias em prata ao seu orçamento.</p>
                <a href="{{ url('/') }}" class="btn btn-custom btn-voltar">Ver Catálogo</a>
            </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>