<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Nova Joia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Nova Peça no Catálogo</h4>
                        
                        @if(session('sucesso'))
                            <div class="alert alert-success">{{ session('sucesso') }}</div>
                        @endif

                        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Código (SKU)</label>
                                <input type="text" name="sku" class="form-control" placeholder="Ex: COL-005" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nome da Peça</label>
                                <input type="text" name="name" class="form-control" placeholder="Ex: Pulseira Riviera" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Detalhes do Banho</label>
                                <input type="text" name="plating_details" class="form-control" placeholder="Ex: Prata 925">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto da Joia</label>
                                <input type="file" name="foto" class="form-control" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-dark w-100 mt-3">Cadastrar Joia</button>
                            <a href="{{ url('/') }}" class="btn btn-link w-100 text-muted mt-2">Voltar ao Catálogo</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>