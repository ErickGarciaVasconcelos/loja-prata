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
                        <h4 class="mb-4">Editar: {{ $produto->name }}</h4>
                        
                        <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <div class="mb-3">
                                <label class="form-label">Código (SKU)</label>
                                <input type="text" name="sku" class="form-control" value="{{ $produto->sku }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nome da Peça</label>
                                <input type="text" name="name" class="form-control" value="{{ $produto->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Detalhes do Banho</label>
                                <input type="text" name="plating_details" class="form-control" value="{{ $produto->plating_details }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Foto Atual</label>
                                @if($produto->images->first())
                                    <img src="{{ asset('storage/' . $produto->images->first()->image_path) }}" width="100" class="mb-2 rounded border">
                                @endif
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                <small class="text-muted">Deixe em branco para manter a foto atual.</small>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 mt-3">Salvar Alterações</button>
                            <a href="{{ route('produtos.index') }}" class="btn btn-link w-100 text-muted mt-2">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>

    <x-nav-link :href="route('produtos.index')" :active="request()->routeIs('produtos.*')">
        {{ __('Gerenciar Joias') }}
    </x-nav-link>

    <div class="inline-flex items-center px-1 pt-1">
</body>
</html>